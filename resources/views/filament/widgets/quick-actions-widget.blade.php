<x-filament-widgets::widget>
    <x-filament::section heading="Quick Actions" description="Fast track your daily administration tasks">
        <div class="qa-grid mt-4">
            <a href="/admin/enrollments/create" class="qa-card text-gray-900 hover:text-primary-600">
                <div class="qa-icon-wrapper">
                    <x-heroicon-o-academic-cap class="w-6 h-6" />
                </div>
                <h3 class="font-semibold text-base mb-1">Enroll Student</h3>
                <p class="text-sm text-gray-500">Add a student to a program or course section</p>
            </a>
            
            <a href="/admin/courses/create" class="qa-card text-gray-900 hover:text-primary-600">
                <div class="qa-icon-wrapper">
                    <x-heroicon-o-book-open class="w-6 h-6" />
                </div>
                <h3 class="font-semibold text-base mb-1">Create Course</h3>
                <p class="text-sm text-gray-500">Design a new course with modules and lessons</p>
            </a>

            <a href="/admin/invoices/create" class="qa-card text-gray-900 hover:text-primary-600">
                <div class="qa-icon-wrapper">
                    <x-heroicon-o-document-currency-dollar class="w-6 h-6" />
                </div>
                <h3 class="font-semibold text-base mb-1">Draft Invoice</h3>
                <p class="text-sm text-gray-500">Create a manual invoice for manual payments</p>
            </a>
            
            <a href="/admin/teachers/create" class="qa-card text-gray-900 hover:text-primary-600">
                <div class="qa-icon-wrapper">
                    <x-heroicon-o-users class="w-6 h-6" />
                </div>
                <h3 class="font-semibold text-base mb-1">Add Teacher</h3>
                <p class="text-sm text-gray-500">Invite a new instructor to the platform</p>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
