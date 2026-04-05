<div class="max-w-4xl mx-auto py-8">
    <div class="card p-0" x-data="quizTimer()">
        
        <!-- Header & Timer Section -->
        <div class="px-8 py-6 border-b" style="border-color: var(--color-border); background-color: var(--color-bg);">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h2 class="brand-font" style="font-size: 28px; color: var(--color-deep-navy);">{{ $assignment->title }}</h2>
                    <p style="font-size: 14px; color: var(--color-text-muted); margin-top: 4px;">{{ $assignment->description ?? 'Please answer all questions below.' }}</p>
                </div>
                
                @if(!$hasSubmitted && $assignment->time_limit_minutes > 0)
                    <div class="mt-4 md:mt-0 px-4 py-2 rounded flex items-center justify-center gap-2 font-bold" 
                         style="background-color: var(--color-bg-card); border: 2px solid var(--color-primary); color: var(--color-primary);">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                        <span x-text="formatTime(timeLeft)" style="font-family: 'Inter', monospace; font-size: 18px; letter-spacing: 0.5px;"></span>
                    </div>
                @endif
            </div>
            
            <div class="mt-6 flex flex-wrap gap-4 text-sm font-medium" style="color: var(--color-text-muted);">
                <div class="flex items-center gap-2"><i data-lucide="check-circle" class="w-4 h-4"></i> {{ $totalQuestions }} Questions</div>
                <div class="flex items-center gap-2"><i data-lucide="award" class="w-4 h-4"></i> {{ $totalPoints }} Total Points</div>
            </div>
        </div>

        <!-- Grade Display Banner -->
        @if($hasSubmitted)
            @if($gradeStatus === 'Pending')
                <div class="px-8 py-4 flex items-center justify-between font-bold" style="background-color: var(--color-accent-light); color: var(--color-accent); border-bottom: 1px solid var(--color-border);">
                    <div class="flex items-center gap-2"><i data-lucide="alert-circle" class="w-5 h-5"></i> Quiz Submitted</div>
                    <span class="px-3 py-1 bg-white rounded-full text-xs uppercase tracking-wider">Pending Instructor Review</span>
                </div>
            @else
                <div class="px-8 py-4 flex items-center justify-between font-bold" style="background-color: #E8F4F5; color: var(--color-primary-dark); border-bottom: 1px solid var(--color-border);">
                    <div class="flex items-center gap-2"><i data-lucide="check-circle" class="w-5 h-5"></i> Graded via System</div>
                    <span class="text-xl">{{ $score }}%</span>
                </div>
            @endif
        @endif

        <!-- Questions List -->
        <div class="p-8 space-y-10" style="background-color: var(--color-bg-card);">
            @foreach($quizData as $index => $question)
                @php
                    $qType = $question['question_type'] ?? 'mcq';
                    $hasCorrectStatusClass = '';
                    if ($hasSubmitted && $gradeStatus !== 'Pending' && $qType !== 'sa') {
                        // Just visual feedback indicator (green border hint) 
                        $hasCorrectStatusClass = 'border-l-4 border-green-500 bg-gray-50';
                    }
                @endphp
                <div class="space-y-4 rounded-lg p-5 border {{ $hasCorrectStatusClass }}" style="border-color: var(--color-border);">
                    <div class="flex justify-between items-start gap-4">
                        <h3 class="font-medium" style="color: var(--color-text); font-size: 18px; line-height: 1.5;">
                            <span class="font-bold mr-2 text-lg" style="color: var(--color-primary);">{{ $index + 1 }}.</span>
                            {{ $question['question_text'] ?? $question['question'] ?? 'Missing Question Text' }}
                        </h3>
                        <span class="text-sm font-semibold px-2 py-1 rounded" style="background-color: var(--color-bg); color: var(--color-text-muted);">
                            {{ $question['points'] ?? 1 }} pts
                        </span>
                    </div>
                    
                    <div class="mt-4 pl-7 space-y-3">
                        
                        <!-- MULTIPLE CHOICE -->
                        @if($qType === 'mcq' && isset($question['options']))
                            @foreach($question['options'] as $option)
                                @php
                                    $optText = $option['option_text'] ?? $option;
                                    $isCorrectOpt = $option['is_correct'] ?? false;
                                @endphp
                                <label class="flex items-center p-3 border rounded-lg cursor-pointer transition-colors" 
                                       style="border-color: var(--color-border); @if($hasSubmitted && $answers[$index] == $optText) border-color: var(--color-primary); background-color: var(--color-bg); @else hover:background-color: #F8F9FA; @endif">
                                    <input type="radio" 
                                           wire:model="answers.{{ $index }}" 
                                           value="{{ $optText }}" 
                                           class="w-4 h-4"
                                           style="accent-color: var(--color-primary);"
                                           {{ $hasSubmitted ? 'disabled' : '' }}>
                                    <span class="ml-3 text-sm font-medium" style="color: var(--color-text);">{{ $optText }}</span>
                                    
                                    @if($hasSubmitted && $gradeStatus !== 'Pending' && $isCorrectOpt)
                                        <i data-lucide="check" class="w-5 h-5 ml-auto text-green-600"></i>
                                    @endif
                                </label>
                            @endforeach

                        <!-- TRUE / FALSE -->
                        @elseif($qType === 'tf')
                            <div class="flex gap-4">
                                @foreach(['true' => 'True', 'false' => 'False'] as $val => $label)
                                    <label class="flex-1 flex items-center justify-center p-4 border rounded-lg cursor-pointer transition-colors"
                                           style="border-color: var(--color-border); @if($hasSubmitted && ($answers[$index] ?? '') == $val) border-color: var(--color-primary); background-color: var(--color-bg); @else hover:background-color: #F8F9FA; @endif">
                                        <input type="radio" 
                                               wire:model="answers.{{ $index }}" 
                                               value="{{ $val }}" 
                                               class="hidden"
                                               {{ $hasSubmitted ? 'disabled' : '' }}>
                                        <div class="font-bold tracking-wide flex items-center gap-2" style="color: var(--color-text);">
                                            @if(($answers[$index] ?? '') == $val)
                                                <i data-lucide="check-circle-2" class="w-5 h-5" style="color: var(--color-primary);"></i>
                                            @else
                                                <i data-lucide="circle" class="w-5 h-5" style="color: var(--color-border);"></i>
                                            @endif
                                            {{ $label }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                        <!-- SHORT ANSWER -->
                        @elseif($qType === 'sa')
                            <textarea wire:model="answers.{{ $index }}" 
                                      class="w-full min-h-[120px] p-4 text-sm border rounded-lg resize-y focus:outline-none focus:ring-2" 
                                      style="border-color: var(--color-border); color: var(--color-text); background-color: #FAFAFA; focus:ring-color: var(--color-primary);"
                                      placeholder="Type your answer here..."
                                      {{ $hasSubmitted ? 'readonly' : '' }}></textarea>
                            
                            @if($hasSubmitted)
                                <p class="text-xs mt-2 italic flex items-center gap-1" style="color: var(--color-text-muted);">
                                    <i data-lucide="info" class="w-3 h-3"></i> This question requires manual grading by your instructor.
                                </p>
                            @endif
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit Footer -->
        @if(!$hasSubmitted)
            <div class="p-8 border-t flex justify-end items-center" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <button wire:click="submitQuiz" id="submit-quiz-btn" class="btn btn-primary px-8 py-3 flex items-center gap-2" style="font-size: 16px;">
                    <i data-lucide="send" class="w-5 h-5"></i> Submit Final Answers
                </button>
            </div>
        @endif

    </div>

    <!-- Alpine Timer Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('quizTimer', () => ({
                timeLimit: {{ $assignment->time_limit_minutes ?? 0 }},
                hasSubmitted: @json($hasSubmitted),
                timeLeft: 0,
                interval: null,

                init() {
                    if (this.timeLimit > 0 && !this.hasSubmitted) {
                        this.timeLeft = this.timeLimit * 60;
                        this.startTimer();
                    }
                },
                
                startTimer() {
                    this.interval = setInterval(() => {
                        this.timeLeft--;
                        if (this.timeLeft <= 0) {
                            clearInterval(this.interval);
                            this.forceSubmit();
                        }
                    }, 1000);
                },

                formatTime(seconds) {
                    if (seconds <= 0) return "00:00:00";
                    const h = Math.floor(seconds / 3600);
                    const m = Math.floor((seconds % 3600) / 60);
                    const s = Math.floor(seconds % 60);
                    return [
                        h,
                        m > 9 ? m : (h ? '0' + m : m || '0'),
                        s > 9 ? s : '0' + s
                    ].filter(Boolean).join(':');
                },

                forceSubmit() {
                    alert("Time is up! Your quiz is being submitted automatically.");
                    let btn = document.getElementById('submit-quiz-btn');
                    if (btn) btn.click();
                }
            }))
        })
    </script>
</div>
