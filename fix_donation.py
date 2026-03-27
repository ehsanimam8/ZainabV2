import os

filepath = 'resources/views/livewire/donation-flow.blade.php'
with open(filepath, 'r') as f:
    lines = f.readlines()

new_lines = ['<div>\n']

for i, line in enumerate(lines):
    n = i + 1
    if 14 <= n <= 306:
        new_lines.append(line)
    elif 325 <= n <= 549:
        new_lines.append(line)
    elif 591 <= n <= 593:
        new_lines.append(line)

new_lines.append('</div>\n')

with open(filepath, 'w') as f:
    f.writelines(new_lines)
