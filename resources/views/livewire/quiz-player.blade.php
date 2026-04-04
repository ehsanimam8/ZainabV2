<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $assignment->title }}</h2>
            <p class="text-sm text-gray-500 mt-1">Please answer all questions below.</p>
        </div>

        <div class="p-6 space-y-8">
            @if($hasSubmitted)
                <div class="bg-blue-50 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-lg p-4 font-medium flex items-center justify-between">
                    <span>Quiz Complete!</span>
                    <span class="text-xl font-bold">{{ $score }}%</span>
                </div>
            @endif

            @foreach($quizData as $index => $question)
                <div class="space-y-4">
                    <h3 class="font-medium text-gray-900 dark:text-white">
                        <span class="text-gray-500 dark:text-gray-400 mr-2">{{ $index + 1 }}.</span>
                        {{ $question['question'] }}
                    </h3>
                    
                    <div class="space-y-2 pl-6">
                        @foreach($question['options'] as $option)
                            <label class="flex items-center p-3 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700/50 {{ $hasSubmitted && $question['correct_answer'] == $option ? 'border-green-500 bg-green-50 dark:bg-green-900/20' : '' }}">
                                <input type="radio" 
                                       wire:model="answers.{{ $index }}" 
                                       value="{{ $option }}" 
                                       class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800"
                                       {{ $hasSubmitted ? 'disabled' : '' }}>
                                <span class="ml-3 text-sm text-gray-700 dark:text-gray-300">{{ $option }}</span>
                                @if($hasSubmitted && $question['correct_answer'] == $option)
                                    <svg class="w-5 h-5 ml-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                @endif
                            </label>
                        @endforeach
                    </div>
                </div>
                @if(!$loop->last)
                    <hr class="border-gray-200 dark:border-gray-700">
                @endif
            @endforeach
        </div>

        @if(!$hasSubmitted)
            <div class="p-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-end">
                <button wire:click="submitQuiz" class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-colors shadow-sm">
                    Submit Final Answers
                </button>
            </div>
        @endif
    </div>
</div>
