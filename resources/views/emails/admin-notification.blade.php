<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Form Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f8fafc;">
    <div style="max-width: 680px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px; text-align: center; color: white;">
            <h1 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700;">📬 New Form Submission</h1>
            <p style="margin: 0; font-size: 16px; opacity: 0.9;">{{ $formName }}</p>
        </div>
        
        <!-- Content -->
        <div style="padding: 40px;">
            
            <!-- Form Details -->
            <div style="background: #f8f9fa; border: 1px solid #e2e8f0; border-radius: 8px; padding: 24px; margin-bottom: 32px;">
                <h2 style="margin: 0 0 16px 0; font-size: 18px; color: #1a202c; font-weight: 700;">SUBMISSION DETAILS</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    @foreach($formData as $key => $value)
                    <tr>
                        <td style="padding: 16px; border-bottom: 1px solid #e2e8f0; font-weight: 600; color: #1a202c; width: 30%; vertical-align: top;">
                            {{ ucwords(str_replace(['_', '-'], ' ', $key)) }}
                        </td>
                        <td style="padding: 16px; border-bottom: 1px solid #e2e8f0; color: #4a5568;">
                            @if(is_array($value))
                                {{ implode(', ', $value) }}
                            @elseif(is_bool($value))
                                {{ $value ? 'Yes' : 'No' }}
                            @elseif(is_null($value))
                                <em style="color: #a0aec0;">Not provided</em>
                            @elseif(strlen($value) > 100)
                                {!! nl2br(e($value)) !!}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
            <!-- Metadata -->
            <div style="background: #f8f9fa; border: 1px solid #e2e8f0; border-radius: 8px; padding: 24px;">
                <h3 style="margin: 0 0 16px 0; font-size: 16px; color: #1a202c; font-weight: 700;">METADATA</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 12px 0; font-weight: 600; color: #4a5568; width: 30%;">Form:</td>
                        <td style="padding: 12px 0; color: #667eea; font-weight: 600;">{{ $formSlug }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 0; font-weight: 600; color: #4a5568;">Submitted:</td>
                        <td style="padding: 12px 0; color: #4a5568;">{{ $timestamp }}</td>
                    </tr>
                </table>
            </div>
            
            <!-- Quick Actions -->
            <div style="margin-top: 32px; text-align: center;">
                <a href="https://cms.logisticjourney.com/" style="display: inline-block; background: #667eea; color: white; text-decoration: none; padding: 14px 32px; border-radius: 6px; font-size: 15px; font-weight: 600;">
                    View in Dashboard
                </a>
            </div>
            
        </div>
        
        <!-- Footer -->
        <div style="background: #1a202c; color: #cbd5e0; padding: 32px; text-align: center; font-size: 14px;">
            <p style="margin: 0 0 8px 0; font-weight: 600; color: #f7fafc;">Logistic Journey</p>
            <p style="margin: 0; opacity: 0.8;">This is an automated notification from your website's contact form.</p>
            <p style="margin: 16px 0 0 0; font-size: 12px; opacity: 0.7;">
                The Workshop, Unit 7, 70 Seventh Avenue, Parktown North, Johannesburg
            </p>
        </div>
        
    </div>
</body>
</html>