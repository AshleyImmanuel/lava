<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f4f5; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        .header { background: linear-gradient(135deg, #ef4444 0%, #f97316 100%); padding: 32px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; }
        .content { padding: 40px 32px; color: #334155; }
        .greeting { font-size: 20px; font-weight: 600; color: #0f172a; margin-bottom: 16px; }
        .text { font-size: 16px; line-height: 1.6; color: #334155; margin-bottom: 24px; }
        .highlight { color: #ef4444; font-weight: 600; }
        .footer { background-color: #f8fafc; padding: 24px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 0; color: #94a3b8; font-size: 12px; }
        .social-links { margin-top: 16px; }
        .social-link { color: #94a3b8; text-decoration: none; margin: 0 8px; font-size: 12px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>We Received Your Message</h1>
        </div>
        <div class="content">
            <div class="greeting">Hi {{ $data['name'] }},</div>
            <p class="text">
                Thanks for reaching out to <span class="highlight">LAVA ESPORTS</span>! We've received your message concerning "<strong>{{ ucfirst($data['subject']) }}</strong>".
            </p>
            <p class="text">
                One of our team members will review your inquiry and get back to you as soon as possible. We usually respond within 24-48 hours.
            </p>
            <div style="margin-top: 32px; padding: 20px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <p style="margin: 0; font-size: 14px; color: #64748b; font-weight: 600; margin-bottom: 8px;">Your Message Copy:</p>
                <p style="margin: 0; font-style: italic; color: #334155;">"{{ Str::limit($data['message'], 150) }}"</p>
            </div>
            <p class="text" style="margin-top: 32px;">
                In the meantime, feel free to join our community on Discord.
            </p>
            <div style="text-align: center; margin-top: 24px;">
                <a href="#" style="display: inline-block; background: #5865f2; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">Join Our Discord</a>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} LAVA ESPORTS. All rights reserved.</p>
            <div class="social-links">
                <a href="#" class="social-link">Twitter</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="#" class="social-link">Twitch</a>
            </div>
        </div>
    </div>
</body>
</html>
