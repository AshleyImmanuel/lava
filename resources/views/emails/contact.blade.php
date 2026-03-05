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
        .label { font-size: 12px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 0.05em; margin-bottom: 4px; display: block; }
        .value { font-size: 16px; color: #0f172a; margin-bottom: 24px; font-weight: 500; }
        .message-box { background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-top: 8px; }
        .message-text { font-size: 16px; line-height: 1.6; color: #334155; white-space: pre-wrap; margin: 0; }
        .footer { background-color: #f8fafc; padding: 24px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 0; color: #94a3b8; font-size: 12px; }
        .tag { display: inline-block; padding: 4px 12px; border-radius: 9999px; font-size: 12px; font-weight: 600; background-color: #eff6ff; color: #3b82f6; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Message</h1>
        </div>
        <div class="content">
            <div style="text-align: center; margin-bottom: 32px;">
                <span class="tag">Inquiry Type: {{ ucfirst($data['subject']) }}</span>
            </div>

            <span class="label">Sender Name</span>
            <div class="value">{{ $data['name'] }}</div>

            <span class="label">Email Address</span>
            <div class="value">
                <a href="mailto:{{ $data['email'] }}" style="color: #ef4444; text-decoration: none;">{{ $data['email'] }}</a>
            </div>

            <span class="label">Message Content</span>
            <div class="message-box">
                <p class="message-text">{{ $data['message'] }}</p>
            </div>
            
            <div style="margin-top: 32px; text-align: center;">
                <a href="mailto:{{ $data['email'] }}" style="display: inline-block; background: #0f172a; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">Reply via Email</a>
            </div>
        </div>
        <div class="footer">
            <p>This email was sent from the LAVA ESPORTS contact form.</p>
        </div>
    </div>
</body>
</html>
