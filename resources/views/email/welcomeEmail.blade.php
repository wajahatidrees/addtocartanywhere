<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <style>


            body, * { font-family: "Poppins", sans-serif; margin: 0; font-weight: 400;}
            .ext_text_align { text-align: left;}
            .ext_padding { padding: 35px; }
            .ext_feature_row { display: grid; grid-template-columns: repeat(3, 180px); align-items: center; gap: 12px; }
            .ext_footer_column { padding-top: 35px;}


            @media screen and (max-width: 599px) {
                .ext_text_align { text-align: center;}
                .ext_padding { padding: 25px; }
                .ext_feature_row {grid-template-columns: repeat(auto-fill, minmax(220px, 1fr) );}
                .ext_footer_row {display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;}
                .ext_footer_column { padding-top: 0;}
            }
        </style>
</head>

<body>
<table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="margin: 0 auto; max-width: 600px; background-color: #ffffff;">
    <tr>
        <td class="ext_padding" style="text-align: center; background-color: #DCEFFF;">
            <img src="{{ url('assets/images/extendons-logo.png') }}" alt="extendons-logo">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #DCEFFF; text-align: center;">
            <img src="{{ url('assets/images/main-banner.png') }}" alt="main-banner" style="max-width: 100%; padding:0px 25px; box-sizing: border-box;">
        </td>
    </tr>

    <tr>
        <td class="ext_padding">
            <h2 class="ext_text_align" style="font-size: 25px; line-height: normal; color: #353535; margin: 0 0 15px 0;">Thank you for Choosing <span style="font-weight: 600;">"{{ getAppName() }}"</span></h2>
            <p class="ext_text_align" style="font-size: 16px; line-height: 28px; margin: 0; color: #505050;">
                Welcome to <span style="font-weight: 600;">{{ getAppName() }}</span>! We're thrilled to have you on board and thank you for choosing our app to enhance your e-commerce experience.
                <br><br>
                Getting started is easy, and we're here to support you every step of the way. If you encounter any challenges while setting up the app with your e-commerce store, our dedicated support team is just a click away.
                <br><br>
                Feel free to reach out to our support team at <a href="mailto:ess@extendons.com" style="color: #353535;"><span style="font-weight: 600;">ess@extendons.com</span></a> if you have any questions or need assistance. We're committed to ensuring your experience with <span style="font-weight: 600;">{{ getAppName() }}</span> is seamless and successful.
                <br><br>
                Once again, thank you for choosing <span style="font-weight: 600;">{{ getAppName() }}</span>. We look forward to being part of your e-commerce success!
                <br><br>
                Best regards,
                <br><br>
                Zeeshan Khalid - CEO Extendons
            </p>
        </td>
    </tr>

    <tr>
        <td class="ext_padding" style="background-color: #014A6D; text-align: center; color: #ffffff;">
            <table width="100%">
                <tbody>
                <tr>
                    <td colspan="3" style="font-weight: 600; font-size: 25px; line-height: normal; padding-bottom: 30px;">Premium Features</td>
                </tr>
                <tr class="ext_feature_row">
                    <td style="background-color: #fff; color: #000000; border-radius: 10px; padding: 10px; margin-bottom: 10px;">

                        <h4 style="font-weight: 600;">1</h4>
                        <p style="font-size: 15px; color: #505050; line-height: 25px;">Show Add to Cart Everywhere</p>
                    </td>
                    <td style="background-color: #fff; color: #000000; border-radius: 10px; padding: 10px; margin-bottom: 10px; ">

                        <h4 style="font-weight: 600;">2</h4>
                        <p style="font-size: 15px; color: #505050; line-height: 25px;">Display Variants Size and Colors</p>
                    </td>
                    <td style="background-color: #fff; color: #000000; border-radius: 10px; padding: 10px;">
                        <h4 style="font-weight: 600;">3</h4>
                        <p style="font-size: 15px; color: #505050; line-height: 25px;">Customize Button Text and Color</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td class="ext_padding" style="text-align: center;">
           <a href="https://api.whatsapp.com/send/?phone=%2B923054285555&text"><button style="font-weight: 600; background-color: #77A833; color: #ffffff; border: 0; padding: 10px 25px; border-radius: 30px; font-size: 16px; line-height: 28px;">Get Premium Support</button>
            </a>
        </td>
    </tr>

    <tr>
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
