<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuizPlayer extends Component
{
    public $assignment;
    public $quizData = [];
    public $answers = [];
    public $hasSubmitted = false;
    public $score = 0;
    public $totalPoints = 0;
    public $gradeStatus = 'Graded';
    public $hasShortAnswer = false;

    public function mount(Assignment $assignment)
    {
        $this->assignment = $assignment;
        $rawData = is_array($assignment->quiz_data) ? $assignment->quiz_data : json_decode($assignment->quiz_data, true) ?? [];
        
        $submission = Submission::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->first();

        // If assignment is shuffled, scramble the array holding original index for record keeping
        if ($assignment->is_shuffled && !$submission) {
            $keys = array_keys($rawData);
            shuffle($keys);
            foreach ($keys as $key) {
                $rawData[$key]['_original_index'] = $key;
                $this->quizData[] = $rawData[$key];
            }
        } else {
            foreach ($rawData as $i => $q) {
                $rawData[$i]['_original_index'] = $i;
                $this->quizData[] = $rawData[$i];
            }
        }

        $this->totalPoints = $this->assignment->total_points ?? collect($this->quizData)->sum('points');

        if ($submission) {
            $this->hasSubmitted = true;
            $this->answers = json_decode($submission->content, true) ?? [];
            $this->score = $submission->score;
            $this->gradeStatus = $submission->grade_status;
        }

        foreach ($this->quizData as $element) {
            if (isset($element['question_type']) && $element['question_type'] === 'sa') {
                $this->hasShortAnswer = true;
            }
        }
    }

    public function submitQuiz()
    {
        if ($this->hasSubmitted) return;

        $earnedPoints = 0;
        $needsManualReview = false;

        foreach ($this->quizData as $index => $q) {
            $userAns = $this->answers[$index] ?? null;
            $questionPoints = (float)($q['points'] ?? 1);
            $type = $q['question_type'] ?? 'mcq';

            if ($type === 'mcq') {
                $correctOptions = collect($q['options'] ?? [])->where('is_correct', true)->pluck('option_text')->toArray();
                if (in_array($userAns, $correctOptions)) {
                    $earnedPoints += $questionPoints;
                }
            } elseif ($type === 'tf') {
                if ((string)$userAns === (string)($q['tf_correct_answer'] ?? '')) {
                    $earnedPoints += $questionPoints;
                }
            } elseif ($type === 'sa') {
                $needsManualReview = true;
            }
        }
        
        // Final score out of 100
        $finalScore = $this->totalPoints > 0 ? round(($earnedPoints / $this->totalPoints) * 100) : 0;
        $finalStatus = $needsManualReview ? 'Pending' : 'Graded';

        $submission = Submission::create([
            'id' => Str::uuid(),
            'assignment_id' => $this->assignment->id,
            'user_id' => Auth::id(),
            'content' => json_encode($this->answers),
            'score' => $finalScore,
            'grade_status' => $finalStatus,
            'attempt_number' => 1,
            'submitted_at' => now(),
        ]);

        $this->score = $finalScore;
        $this->gradeStatus = $finalStatus;
        $this->hasSubmitted = true;
        
        if ($finalStatus === 'Graded') {
            \Filament\Notifications\Notification::make()
                ->title('Quiz Submitted and Graded')
                ->success()
                ->send();
        } else {
            \Filament\Notifications\Notification::make()
                ->title('Quiz Submitted (Pending Review)')
                ->info()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.quiz-player');
    }
}
