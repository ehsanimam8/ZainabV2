<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate of Completion</title>
    <style>
        body { margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f3f4f6; font-family: 'Georgia', serif; }
        .certificate-container { background: white; width: 800px; height: 600px; position: relative; padding: 40px; box-sizing: border-box; text-align: center; border: 12px double #0d3b66; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .logo { width: 80px; height: 80px; margin-bottom: 20px; background-color: #0d3b66; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold; font-family: sans-serif; }
        .title { color: #0d3b66; font-size: 42px; font-weight: bold; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { color: #4b5563; font-size: 18px; margin-bottom: 40px; font-style: italic; }
        .student-name { color: #1e293b; font-size: 48px; border-bottom: 2px solid #ed8936; display: inline-block; padding: 0 40px 10px; margin-bottom: 40px; font-family: 'Times New Roman', Times, serif; }
        .course-text { color: #4b5563; font-size: 18px; margin-bottom: 20px; }
        .course-name { color: #0d3b66; font-size: 32px; font-weight: bold; margin-bottom: 50px; }
        .footer-grid { display: flex; justify-content: space-between; margin-top: 60px; padding: 0 40px; }
        .signature-line { border-top: 1px solid #718096; width: 200px; padding-top: 10px; font-size: 14px; color: #4b5563; font-family: sans-serif; }
        .date { font-family: sans-serif; font-size: 16px; color: #4b5563; }
        @media print {
            body { background: white; }
            .certificate-container { box-shadow: none; border-width: 6px; }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="logo">ZC</div>
        <div class="title">Certificate of Completion</div>
        <div class="subtitle">This certificate is proudly awarded to</div>
        
        <div class="student-name">{{ $enrollment->user->first_name ?? '' }} {{ $enrollment->user->last_name ?? '' }}</div>
        
        <div class="course-text">for successfully completing the rigorous requirements of the program:</div>
        <div class="course-name">{{ $enrollment->program->name ?? 'Zainab Center Educational Program' }}</div>
        
        <div class="footer-grid">
            <div>
                <div class="date">{{ \Carbon\Carbon::now()->format('F jS, Y') }}</div>
                <div class="signature-line" style="border:none; padding-top: 0;">Date Awarded</div>
            </div>
            <div>
                <div class="signature-line">Program Director</div>
            </div>
        </div>
    </div>
    <script>
        // Auto-trigger print dialog for convenience
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>
