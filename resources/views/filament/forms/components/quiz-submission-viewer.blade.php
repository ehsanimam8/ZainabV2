<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $record = $getRecord();
        $assignment = $record ? current($record->assignment()->getResults()) : null;
        if (!$assignment && $record) {
            $assignment = $record->assignment;
        }

        $answers = is_string($getState()) ? json_decode($getState(), true) : $getState();
        $answers = is_array($answers) ? $answers : [];

        $isQuiz = $assignment && $assignment->type === 'Quiz';
        $quizData = [];
        if ($isQuiz) {
            $quizData = is_array($assignment->quiz_data) ? $assignment->quiz_data : json_decode($assignment->quiz_data, true) ?? [];
        }
    @endphp

    <div class="space-y-4 rounded-xl border border-gray-300 p-4 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/50 text-sm">
        @if(!$isQuiz)
            <div class="prose dark:prose-invert max-w-none">
                <p class="font-medium text-gray-500 mb-2">Submitted Text/File Response:</p>
                <div class="p-3 bg-white dark:bg-gray-900 border rounded shadow-sm whitespace-pre-wrap">{{ is_string($getState()) ? $getState() : json_encode($getState(), JSON_PRETTY_PRINT) }}</div>
            </div>
        @else
            <h4 class="font-bold text-gray-900 dark:text-white border-b pb-2 mb-4">Quiz Question Breakdown</h4>
            
            @if(empty($quizData))
                <div class="text-gray-500 italic">No quiz data found for this assignment.</div>
            @endif

            @foreach($quizData as $index => $q)
                @php
                    $userAns = $answers[$q['_original_index'] ?? $index] ?? $answers[$index] ?? 'No Answer Provided';
                    $type = $q['question_type'] ?? 'mcq';
                    $points = $q['points'] ?? 1;
                    
                    $isCorrect = false;
                    $correctLabel = '';

                    if ($type === 'mcq') {
                        $correctOptions = collect($q['options'] ?? [])->where('is_correct', true)->pluck('option_text')->toArray();
                        $correctLabel = implode(', ', $correctOptions);
                        $isCorrect = in_array($userAns, $correctOptions);
                    } elseif ($type === 'tf') {
                        $correctLabel = ($q['tf_correct_answer'] ?? '') === 'true' ? 'True' : 'False';
                        $isCorrect = (string)$userAns === (string)($q['tf_correct_answer'] ?? '');
                    }
                    
                    $statusColor = $type === 'sa' 
                        ? 'text-orange-600 bg-orange-50 border-orange-200 dark:bg-orange-900/30' 
                        : ($isCorrect ? 'text-green-600 bg-green-50 border-green-200 dark:bg-green-900/30' : 'text-red-600 bg-red-50 border-red-200 dark:bg-red-900/30');
                @endphp
                <div class="p-4 rounded-lg border bg-white dark:bg-gray-900 {{ $statusColor }}">
                    <div class="flex justify-between gap-4">
                        <div class="font-semibold text-gray-800 dark:text-gray-200">
                            {{ $index + 1 }}. {{ $q['question_text'] ?? 'Missing Question' }}
                        </div>
                        <div class="text-xs font-bold px-2 py-1 bg-white/50 rounded whitespace-nowrap">
                            {{ $points }} pts
                        </div>
                    </div>
                    
                    <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-3 bg-white/60 dark:bg-black/20 rounded shadow-sm">
                            <span class="text-xs font-bold uppercase text-gray-400 block mb-1">Student's Answer:</span>
                            <span class="font-medium {{ $type === 'sa' ? '' : ($isCorrect ? 'text-green-700' : 'text-red-700') }}">
                                {{ is_string($userAns) || is_numeric($userAns) ? $userAns : json_encode($userAns) }}
                            </span>
                        </div>
                        
                        @if($type === 'sa')
                            <div class="p-3 bg-orange-100/50 dark:bg-orange-900/20 rounded shadow-sm flex items-center">
                                <span class="text-xs font-bold uppercase text-orange-600 dark:text-orange-400">
                                    <x-heroicon-o-hand-raised class="w-4 h-4 inline mr-1" />
                                    Requires Manual Grading
                                </span>
                            </div>
                        @else
                            <div class="p-3 bg-white/60 dark:bg-black/20 rounded shadow-sm">
                                <span class="text-xs font-bold uppercase text-gray-400 block mb-1">Correct Answer:</span>
                                <span class="font-medium text-gray-700 dark:text-gray-300">
                                    {{ $correctLabel ?: 'Not Defined' }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-dynamic-component>
