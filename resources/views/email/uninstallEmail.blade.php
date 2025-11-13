<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apologize Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>


        body, * { font-family: "Poppins", sans-serif; margin: 0; font-weight: 400;}
        .ext_heading_font { font-size: 40px; font-weight: 600; color: #353535; line-height: 52px;}
        .ext_padding { padding: 35px; }
        .ext_footer_column { padding-top: 35px;}


        @media screen and (max-width: 599px) {
            .ext_heading_font {font-size: 28px;line-height: 40px;}
            .ext_padding { padding: 25px; }
            .ext_footer_row {display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;}
            .ext_footer_column { padding-top: 0;}
        }
    </style>
</head>
<body>
<table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="margin: 0 auto; max-width: 600px; background-color: #ffffff;">
    <tr>
        <td class="ext_padding" style="padding-bottom: 0; text-align: center; background-color: #DCEFFF;">
            <img src="{{ url('assets/images/extendons-logo.png') }}" alt="extendons-logo">
        </td>
    </tr>
    <tr>
        <td class="ext_padding" style="text-align: center; background-color: #DCEFFF;">
            <h1 class="ext_heading_font">We Apologize</h1>
        </td>
    </tr>
    <tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 25px;">
            <h2 style=" font-size: 20px; line-height: 32px; color: #353535; margin: 0 0 15px 0; font-weight: 500;">Hi {{ $user['name'] }},</h2>
            <p style="font-size: 16px; line-height: 28px; margin: 0; color: #505050;">Can you share why you uninstall <span style="font-weight: 600;">{{ getAppName() }}</span>, from {{ @$user['domain'] }}, after {{ @$user['duration'] }}?
                <br><br>
                We're genuinely interested in understanding the reason behind it. Your feedback is crucial for us to enhance our service and address any concerns you may have encountered.
            </p>
        </td>
    </tr>
  <tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 20px;">
            <p style="font-size: 16px; line-height: 28px; margin: 0; color: #505050;">Could you spare a moment to share your experience with us?</p>
            <h2 style=" font-size: 18px; line-height: 30px; color: #353535; margin: 0 0 15px 0; font-weight: 500;">Please choose the most relevant option below or type a brief response:
            </h2>
            <ul style="font-size: 15px; line-height: 32px; margin: 0; color: #595959;list-style-type:none;padding-left: 15px;">
                <li><img src="{{ url('assets/images/tick.png') }}" alt="email">
                    I just wanted to take a look / I am still evaluating.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    Facing compatibility issues.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    Configured app but no result on store front.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    The app didn't meet my expectations.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    I encountered technical issues.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    Not enough features for my needs.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    Look for new feature “please share with us”.</li>
                <li><img src="{{ url('assets/images/tick.png') }}" alt="tick">
                    Other (please specify).</li>
            </ul>
        </td>
    </tr>
<tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 20px;">
            <p style="font-size: 16px; line-height: 30px; margin: 0; color: #505050;">
                Your insights will help us identify areas for improvement, and we want to assure you that we are committed to making your experience better. If there's a specific issue that led to the uninstallation, our support team is here to help.
                <br><br>
                Feel free to reach out to us at <a href="mailto:ess@extendons.com" style="color: #353535;"><span style="font-weight: 600;">ess@extendons.com</span></a>, and we'll do our best to address your concerns.
            </p>
        </td>
    </tr>
    <tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 20px;">
            <p style="font-size: 16px; line-height: 30px; margin: 0; color: #a80303; font-style: italic;">
                In the meantime, please note that with the uninstallation of the app, any associated features will no longer be active on your store. If you have any questions or need assistance, don't hesitate to get in touch.
            </p>
        </td>
    </tr>
<tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 20px;">
            <p style="font-size: 16px; line-height: 30px; margin: 0; color: #505050;">Thank you for taking the time to share your feedback. We appreciate your input and look forward to the opportunity to assist you further.
            </p>
        </td>
    </tr>
    <tr>
        <td class="ext_padding" style="padding-bottom: 0;padding-top: 20px;">
            <p style="font-weight: 500; font-size: 16px; line-height: 30px; margin: 0; color: #000000;">Best regards,
            </p>
        </td>
    </tr>
    <tr>
        <td class="ext_padding" style="padding-bottom: 25px; padding-top: 0;">
            <p style="font-size: 16px; line-height: 30px; margin: 0; color: #000000;">Zeeshan Khalid - CEO Extendons</p>
        </td>
    </tr>
 <td class="ext_padding" style="background-color: #242424; color: #ffffff;">
            <table width="100%">
                <tbody>
                <tr class="ext_footer_row">
                    <td class="ext_footer_column"> <a href="https://apps.shopify.com/partners/extendons" style="color: #8C8C8C; font-size: 14px; line-height: 28px;">EXTENDONS SHOPIFY</a> </td>
                    <td>
                        <table style="margin-left: auto;">
                            <tbody>
                            <tr>
                                <td colspan="12" style="font-weight: 600; font-size: 17px; line-height: 30px; padding-bottom: 10px;">Chat with us</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding-right: 10px;">
                                    <a href="mailto:ess@extendons.com" style="border: 1px solid #8c8c8c; border-radius: 50%; width: 35px; line-height: 0; height: 35px; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ url('assets/images/email1.png') }}" alt="email">
                                    </a>
                                </td>

                                <td colspan="3" style="padding-right: 10px;">
                                    <a href="https://api.whatsapp.com/send/?phone=%2B923054285555&text" style="border: 1px solid #8c8c8c; border-radius: 50%; width: 35px; line-height: 0; height: 35px; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ url('assets/images/whatsapp1.png') }}" alt="whatsapp">
                                    </a>
                                </td>
                                
                                <td colspan="3">
                                    <a href="https://join.skype.com/invite/sRsSs9Vj6n0N" style="border: 1px solid #8c8c8c; border-radius: 50%; width: 35px; line-height: 0; height: 35px; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ url('assets/images/skype1.png') }}" alt="skype">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
