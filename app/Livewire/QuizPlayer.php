<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class QuizPlayer extends Component
{
    public $assignment;
    public $quizData = [];
    public $answers = [];
    public $hasSubmitted = false;
    public $score = 0;
    public $totalQuestions = 0;

    public function mount(Assignment $assignment)
    {
        $this->assignment = $assignment;
        $this->quizData = is_array($assignment->quiz_data) ? $assignment->quiz_data : json_decode($assignment->quiz_data, true) ?? [];
        $this->totalQuestions = count($this->quizData);

        // Check for existing submissions
        $submission = Submission::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($submission) {
            $this->hasSubmitted = true;
            $this->answers = json_decode($submission->content, true) ?? [];
            $this->score = $submission->score;
        }
    }

    public function submitQuiz()
    {
        if ($this->hasSubmitted) return;

        $correctCount = 0;
        foreach ($this->quizData as $index => $q) {
            $userAns = $this->answers[$index] ?? null;
            if ($userAns == $q['correct_answer']) {
                $correctCount++;
            }
        }
        
        $percentage = $this->totalQuestions > 0 ? round(($correctCount / $this->totalQuestions) * 100) : 0;

        Submission::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'assignment_id' => $this->assignment->id,
            'user_id' => Auth::id(),
            'content' => json_encode($this->answers),
            'score' => $percentage,
            'grade_status' => 'Graded',
        ]);

        $this->score = $percentage;
        $this->hasSubmitted = true;
    }

    public function render()
    {
        return view('livewire.quiz-player');
    }
}
