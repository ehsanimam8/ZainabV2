<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\Pages\CreateCourse;
use App\Filament\Resources\Courses\Pages\EditCourse;
use App\Filament\Resources\Courses\Pages\ListCourses;
use App\Filament\Resources\Courses\Schemas\CourseForm;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-book-open';

    protected static string | \UnitEnum | null $navigationGroup = 'Academic';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MaterialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->check() && auth()->user()->hasRole('instructor')) {
            $query->whereHas('sections', function ($q) {
                $q->where('lead_teacher_id', auth()->id());
            });
        }

        return $query;
    }
}
