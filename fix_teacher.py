import os

filepath = 'resources/views/livewire/teacher-dashboard.blade.php'
with open(filepath, 'r') as f:
    lines = f.readlines()

# teacher-dashboard is lines 1 to 1392.
# Lines 1 to 25 are the HEAD and BODY open.
# Lines 1374 to 1392 are SCRIPT and BODY close.

layout = lines[0:25] + ['    {{ $slot }}\n', '    @livewireScripts\n'] + lines[1373:1392]

# Insert @livewireStyles into head
layout.insert(24, '    @livewireStyles\n')

# Save layout
layout_path = 'resources/views/components/layouts/teacher.blade.php'
with open(layout_path, 'w') as f:
    f.writelines(layout)

# Save component view
# Note: lines[25:1373] (index 25 to 1372 inclusive) is the body content.
component_content = ['<div>\n'] + lines[25:1373] + ['</div>\n']
with open(filepath, 'w') as f:
    f.writelines(component_content)

print("Done")
