import os
import re

html_dir = "../HTML UI"
views_dir = "resources/views"
files_to_convert = {
    "index.html": "admin.blade.php",
    "public.html": "welcome.blade.php",
    "portal.html": "portal.blade.php",
    "public_enroll.html": "enroll.blade.php",
    "teacher.html": "teacher.blade.php",
    "public_donate.html": "donate.blade.php",
    "public_events.html": "events.blade.php",
    "public_programs.html": "programs.blade.php"
}

for html_file, blade_file in files_to_convert.items():
    src_path = os.path.join(html_dir, html_file)
    dst_path = os.path.join(views_dir, blade_file)
    
    print(f"Checking {src_path} -> {os.path.exists(src_path)}")
    if os.path.exists(src_path):
        with open(src_path, "r", encoding="utf-8") as f:
            content = f.read()
            
        # Basic asset path replacements
        content = re.sub(r'href="css/(.*?\.css)"', r'href="{{ asset("css/\1") }}"', content)
        content = re.sub(r'src="js/(.*?\.js)"', r'src="{{ asset("js/\1") }}"', content)
        content = re.sub(r'src="assets/(.*?)"', r'src="{{ asset("assets/\1") }}"', content)
        
        # Link replacements to hook everything together
        content = content.replace('href="index.html"', 'href="{{ url(\'/admin\') }}"')
        content = content.replace('href="public.html"', 'href="{{ url(\'/\') }}"')
        content = content.replace('href="portal.html"', 'href="{{ url(\'/portal\') }}"')
        content = content.replace('href="public_enroll.html"', 'href="{{ url(\'/enroll\') }}"')
        content = content.replace('href="teacher.html"', 'href="{{ url(\'/teacher\') }}"')
        content = content.replace('href="public_donate.html"', 'href="{{ url(\'/donate\') }}"')
        content = content.replace('href="public_events.html"', 'href="{{ url(\'/events\') }}"')
        content = content.replace('href="public_programs.html"', 'href="{{ url(\'/programs\') }}"')
        
        with open(dst_path, "w", encoding="utf-8") as f:
            f.write(content)
            
print("Conversion complete!")
