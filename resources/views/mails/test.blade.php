<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #004d40;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #004d40;
            font-size: 20px;
        }

        .content p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .reference-box {
            background-color: #e0f7fa;
            border-left: 4px solid #004d40;
            padding: 10px 15px;
            margin: 20px 0;
            font-size: 16px;
            color: #004d40;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #004d40;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .cta-button:hover {
            background-color: #00695c;
        }

        .footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #004d40;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Snooker Tournament Registration</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hi, {{ $mailData['name'] }}!</h2>
            <p>Thank you for registering for the <strong>[Tournament Name]</strong>. We're excited to have you join us
                for this thrilling event.</p>

            <p>Here are your registration details:</p>

            <div class="reference-box">
                <p><strong>Registration Reference:</strong> {{ $mailData['email'] }}</p>
                <p><strong>Tournament Date:</strong> @formatDate($mailData['paid_at'])</p>
                <p><strong>Location:</strong> [Tournament Location]</p>
            </div>

            <p>Please keep this reference number safe, as you'll need it for future communication and during check-in at
                the venue.</p>

            <a href="[Website URL]" class="cta-button">Visit Tournament Page</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>If you have any questions, feel free to contact us at <a
                    href="mailto:support@snookertournament.com">support@snookertournament.com</a>.</p>
            <p>&copy; [Year] Snooker Tournament | All Rights Reserved</p>
        </div>
    </div>
</body>

</html>