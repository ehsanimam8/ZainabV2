<?php

namespace App\Filament\Resources\Assignments\Pages;

use App\Filament\Resources\Assignments\AssignmentResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Components\Section;

class ViewAssignment extends ViewRecord
{
    protected static string $resource = AssignmentResource::class;

    protected string $view = 'filament.resources.assignments.pages.view-assignment';

    protected function getViewData(): array
    {
        $assignment = $this->record;
        
        $totalStudents = $assignment->course ? $assignment->course->enrollments()->count() : 0;
        $submissionsCount = $assignment->submissions()->count();
        $pendingReview = $assignment->submissions()->where('status', 'Pending')->count();
        
        $submissionRate = $totalStudents > 0 ? round(($submissionsCount / $totalStudents) * 100) : 0;
        
        $avgScore = '-';
        if ($submissionsCount > 0) {
            $avgPoints = $assignment->submissions()->whereNotNull('earned_points')->avg('earned_points');
            $avgScore = $assignment->total_points > 0 ? round(($avgPoints / $assignment->total_points) * 100) . '%' : round($avgPoints);
        }
        
        return [
            'totalStudents' => $totalStudents,
            'submissionsCount' => $submissionsCount,
            'pendingReview' => $pendingReview,
            'submissionRate' => $submissionRate,
            'avgScore' => $avgScore,
        ];
    }
}
