<?php

namespace App\Services;

use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateGenerator
{
    public static function streamCertificate(Enrollment $enrollment)
    {
        $user = $enrollment->user;
        $program = $enrollment->program;

        // Ensure program is fully completed before allowing certificate generation
        if ($enrollment->status !== 'Completed') {
            abort(403, 'Certificate is only available for fully completed programs.');
        }

        $html = "
            <html>
            <head>
                <style>
                    body {
                        font-family: 'Georgia', serif;
                        text-align: center;
                        margin: 0;
                        padding: 20px;
                        color: #1f2937;
                    }
                    .certificate-container {
                        border: 15px solid #d97706; /* Zainab Center Burnt Gold */
                        padding: 50px;
                        height: calc(100% - 100px);
                    }
                    .header {
                        font-size: 32px;
                        font-weight: bold;
                        text-transform: uppercase;
                        color: #111827; /* Deep Navy text substitute */
                        margin-bottom: 40px;
                    }
                    .subtitle {
                        font-size: 18px;
                        margin-bottom: 40px;
                        color: #4b5563;
                    }
                    .student-name {
                        font-size: 48px;
                        font-weight: normal;
                        font-family: 'Times New Roman', serif;
                        color: #000;
                        margin-bottom: 40px;
                        border-bottom: 2px solid #e5e7eb;
                        display: inline-block;
                        padding-bottom: 10px;
                        width: 60%;
                    }
                    .program-name {
                        font-size: 24px;
                        font-weight: bold;
                        margin-bottom: 60px;
                    }
                    .date-signature-container {
                        width: 100%;
                        margin-top: 80px;
                    }
                    .date {
                        float: left;
                        width: 30%;
                        border-top: 1px solid #4b5563;
                        padding-top: 10px;
                    }
                    .signature {
                        float: right;
                        width: 30%;
                        border-top: 1px solid #4b5563;
                        padding-top: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='certificate-container'>
                    <div class='header'>
                        Zainab Center
                    </div>
                    <div class='subtitle'>
                        THIS CERTIFIES THAT
                    </div>
                    <div class='student-name'>
                        {$user->first_name} {$user->last_name}
                    </div>
                    <div class='subtitle'>
                        HAS SUCCESSFULLY COMPLETED THE ACADEMIC REQUIREMENTS FOR
                    </div>
                    <div class='program-name'>
                        {$program->name}
                    </div>
                    
                    <div class='date-signature-container'>
                        <div class='date'>
                            Date of Issuance<br>
                            <strong>" . date('F jS, Y') . "</strong>
                        </div>
                        <div class='signature'>
                            Signature<br>
                            <strong>Academic Director</strong>
                        </div>
                    </div>
                </div>
            </body>
            </html>
        ";

        // Load the HTML into the PDF wrapper
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');

        return $pdf->stream(\Illuminate\Support\Str::slug($user->first_name . '-' . $user->last_name . '-' . $program->name) . '-certificate.pdf');
    }
}
