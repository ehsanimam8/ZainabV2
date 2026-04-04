<div class="h-screen bg-gray-50 flex flex-col pt-16">
    <div class="flex-1 flex overflow-hidden">
        
        {{-- Sidebar Curriculum --}}
        <div class="w-80 bg-white border-r border-[#E9E4D4] overflow-y-auto flex-shrink-0">
            <div class="p-6">
                <h2 class="font-playfair text-xl font-bold text-[#1A2F4A] mb-2">{{ $section->course->name ?? 'Course' }}</h2>
                <p class="text-sm text-gray-500 mb-6">Curriculum</p>
                
                @if($section->course && $section->course->modules)
                    @foreach($section->course->modules as $module)
                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-[#1A2F4A] uppercase tracking-wider mb-3">{{ $module->name }}</h4>
                        <div class="flex flex-col space-y-2">
                            @foreach($module->lessons as $lesson)
                            <button 
                                wire:click="loadLesson('{{ $lesson->id }}')" 
                                class="text-left w-full px-3 py-2 rounded-lg text-sm flex items-center justify-between {{ $currentLesson && $currentLesson->id === $lesson->id ? 'bg-[#1B6B72] text-white' : 'text-gray-700 hover:bg-[#F8F5E8]' }}">
                                <span class="flex items-center gap-2">
                                    <i data-lucide="play-circle" class="w-4 h-4 {{ $currentLesson && $currentLesson->id === $lesson->id ? 'text-white' : 'text-[#1B6B72]' }}"></i>
                                    <span class="truncate">{{ $lesson->title }}</span>
                                </span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Main Player & Content --}}
        <div class="flex-1 overflow-y-auto bg-[#F8F5E8]">
            @if($currentLesson)
                <div class="max-w-5xl mx-auto p-8">
                    <div class="bg-white rounded-xl shadow-sm border border-[#E9E4D4] overflow-hidden mb-8">
                        {{-- Determine Video URL & Platform --}}
                        @php
                            $videoUrl = $currentLesson->video_url ?? null;
                            $embedUrl = null;
                            
                            // Check if JSON content blocks contain a video url
                            if (!$videoUrl && is_array($currentLesson->content)) {
                                foreach ($currentLesson->content as $block) {
                                    if (isset($block['type']) && $block['type'] === 'video' && isset($block['data']['url'])) {
                                        $videoUrl = $block['data']['url'];
                                        break;
                                    }
                                }
                            }

                            if ($videoUrl) {
                                if (str_contains($videoUrl, 'youtube.com/watch')) {
                                    parse_str(parse_url($videoUrl, PHP_URL_QUERY), $vars);
                                    if (isset($vars['v'])) $embedUrl = 'https://www.youtube.com/embed/' . $vars['v'];
                                } elseif (str_contains($videoUrl, 'youtu.be/')) {
                                    $parts = explode('youtu.be/', $videoUrl);
                                    if (isset($parts[1])) $embedUrl = 'https://www.youtube.com/embed/' . explode('?', $parts[1])[0];
                                } elseif (str_contains($videoUrl, 'vimeo.com/')) {
                                    $parts = explode('vimeo.com/', $videoUrl);
                                    if (isset($parts[1])) $embedUrl = 'https://player.vimeo.com/video/' . explode('?', $parts[1])[0];
                                } else {
                                    $embedUrl = $videoUrl; // Fallback
                                }
                            }
                        @endphp
                        
                        @if($embedUrl)
                            <div class="aspect-w-16 aspect-h-9 w-full bg-black">
                                <iframe src="{{ $embedUrl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full min-h-[450px]"></iframe>
                            </div>
                        @else
                            <div class="p-12 text-center bg-[#1A2F4A] text-white">
                                <i data-lucide="book-open" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                                <p class="text-lg">This lesson contains primarily written material or quizzes.</p>
                            </div>
                        @endif
                        
                        <div class="p-8">
                            <h1 class="font-playfair text-3xl font-bold text-[#1A2F4A] mb-4">{{ $currentLesson->title }}</h1>
                            <div class="prose max-w-none text-gray-600">
                                @if(is_array($currentLesson->content))
                                    @foreach($currentLesson->content as $block)
                                        @if(isset($block['type']) && $block['type'] === 'rich_text')
                                            {!! $block['data']['content'] ?? '' !!}
                                        @endif
                                    @endforeach
                                @else
                                    <p>{{ $currentLesson->description ?? 'No written notes for this lesson.' }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="h-full flex items-center justify-center text-gray-400">
                    <p>Select a lesson from the curriculum</p>
                </div>
            @endif
        </div>
        
    </div>
</div>
