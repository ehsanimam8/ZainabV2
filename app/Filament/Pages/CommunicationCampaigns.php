<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Models\Program;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\DynamicNotificationMail;

class CommunicationCampaigns extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-megaphone';
    protected static string | \UnitEnum | null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'Campaigns';
    protected static ?string $title = 'Manual Email Campaigns';

    protected string $view = 'filament.pages.communication-campaigns';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Campaign Details')
                    ->description('Send a custom email blast to a targeted segment of users.')
                    ->schema([
                        Select::make('audience')
                            ->options([
                                'all_students' => 'All Enrolled Students',
                                'all_parents' => 'All Parent Households',
                                'specific_program' => 'Students in a Specific Program',
                            ])
                            ->required()
                            ->reactive()
                            ->label('Target Audience'),
                        Select::make('program_id')
                            ->options(Program::pluck('name', 'id'))
                            ->label('Select Program')
                            ->searchable()
                            ->required(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('audience') === 'specific_program')
                            ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('audience') === 'specific_program'),
                        TextInput::make('subject')
                            ->required()
                            ->label('Email Subject')
                            ->columnSpanFull(),
                        RichEditor::make('body')
                            ->required()
                            ->label('Email Body Content')
                            ->columnSpanFull(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function sendCampaign(): void
    {
        $data = $this->form->getState();
        $audience = $data['audience'];
        $subject = $data['subject'];
        $body = $data['body'];

        $emails = collect();

        if ($audience === 'all_students') {
            $emails = User::role('student')->pluck('email');
        } elseif ($audience === 'all_parents') {
            $emails = User::role('parent')->pluck('email');
        } elseif ($audience === 'specific_program') {
            $emails = \App\Models\Enrollment::where('program_id', $data['program_id'])
                        ->where('status', 'active')
                        ->with('user')
                        ->get()
                        ->pluck('user.email')
                        ->filter();
        }

        if ($emails->isEmpty()) {
            Notification::make()
                ->warning()
                ->title('No recipients found')
                ->body('The selected audience has no valid email addresses.')
                ->send();
            return;
        }

        // In a real production app, we would chunk these and dispatch to a queue.
        foreach ($emails->unique() as $email) {
            Mail::to($email)->send(new DynamicNotificationMail($subject, $body));
        }

        Notification::make()
            ->success()
            ->title('Campaign Dispatched!')
            ->body('Successfully sent ' . $emails->unique()->count() . ' emails.')
            ->send();

        $this->form->fill();
    }
}
