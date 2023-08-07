{{-- EMAIL FOR VERIFYING FIRST TIME USER --}}
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="SOS Marketing Email Forms" />
    <meta name="keywords" content="SOS Marketing" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    {{-- REMOVES fav.ico ERROR --}}
    <link rel="icon" href="data:;base64,iVBORw0KGgo=" />
    <title></title>
    {{-- CODE INSIDE if mso ONLY APPLIES TO OUTLOOK ON WINDOWS ONLY --}}
    <!--[if mso]>
        <noscript>
        <xml>
        <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        </noscript>
    <![endif]-->
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

        /* #center-container {
        border: solid 1px #000;
      } */

        #code {
            margin-bottom: 5px;
        }

        #code,
        #code-header {
            font-size: 20px;
            text-align: center;
        }

        #disclaimer {
            font-size: 16px;
            padding: 5px 10px;
        }

        #header-logo {
            font-size: 28px;
        }

        #main-card {
            width: 400px;
        }

        @media (max-width: 400px) {
            #center-container {
                width: 100% !important;
            }

            #code {
                margin-bottom: 15px !important;
            }

            /* #code,
            #code-header {
                font-size: 22px !important;
            } */

            #disclaimer {
                /* font-size: 18px !important; */
                padding: 10px 15px !important;
            }

            /* added */
            #footer {
                border-bottom-left-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
                font-size: 14px !important;
                margin: 0 0 0 0 !important;
            }

            #header-logo {
                border-radius: 0 !important;
                font-size: 24px !important;
                margin: 0 auto 20px auto !important;
                padding: 20px 15px !important;
            }

            #main-card {
                width: 90%;
            }

            /* added */
            #social-media-container {
                border-top-left-radius: 0 !important;
                border-top-right-radius: 0 !important;
            }

            #social-media-container img {
                height: 45px !important;
                width: 45px !important;
            }
        }
    </style>
</head>

<body style="
      margin: 0;
      overflow-x: hidden;
      padding: 0;
    ">
    {{-- ENTIRE CONTAINER --}}
    <table role="presentation"
        style="
        background: #fff;
        border-collapse: collapse;
        border-spacing: 0;
        border: 0;
        width: 100%;
      ">
        <tr>
            <td align="center" style="padding: 0">
                {{-- CENTER CONTAINER --}}
                <table role="presentation" id="center-container"
                    style="
              border-collapse: collapse;
              border-spacing: 0;
              font-family: 'Roboto', sans-serif;
              height: 100%;
              padding: 0;
              width: 600px;
            ">
                    <tr>
                        <td align="center" style="padding: 0">
                            {{-- LOGO CONTAINER --}}
                            <a href="#" id="header-logo"
                                style="
                    background-color: #000;
                    border-radius: 5px;
                    color: #fff;
                    display: block;
                    margin: 20px auto 20px auto;
                    padding: 10px 15px;
                    text-decoration: none;
                  ">
                                <span>
                                    A<span style="color: #808080">cme</span><span
                                        style="background-color: #e6331f; padding: 2px">.com</span>
                                </span>
                            </a>
                            <h1 style="color: #000; font-size: 30px; margin: 0; padding: 0">
                                - User Registered -
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0">
                            {{-- MAIN CARD --}}
                            <table role="presentation" id="main-card"
                                style="
                    background-color: #fff;
                    border-collapse: collapse;
                    border-radius: 5px;
                    border-spacing: 0;
                    border: 0;
                    margin: 10px auto 20px auto;
                    max-height: auto;
                    min-height: 325px;
                    padding: 0;
                  ">
                                <tr>
                                    <td>
                                        <h2
                                            style="
                          color: #e6331f;
                          font-size: 26px;
                          margin: 0;
                          padding: 0;
                          text-align: center;
                        ">
                                            Welcome To Acme
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0">
                                        {{-- VERIFICATION CODE --}}
                                        <p id="code-header" style="color: #000; margin-bottom: 5px; padding: 5px">
                                            New User :
                                        </p>
                                        <p id="code"
                                            style="
                          background-color: #a9a9a9;
                          border-radius: 5px;
                          color: #000;
                          padding: 10px 5px;
                        ">
                                            {{ $user['first_name'] }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- USAGE INSTRUCTIONS --}}
                                        <p id="disclaimer"
                                            style="
                          background-color: #dcdcdc;
                          border-radius: 5px;
                          color: #000;
                          font-style: italic;
                          margin-bottom: 10px;
                          text-align: center;
                        ">
                                            Just a simple greeting to a new user.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        {{-- FOOTER --}}
                        <td align="center" style="padding: 0">
                            {{-- SOCIAL MEDIA BLOCK --}}
                            <div id="social-media-container"
                                style="
                    background-color: #000;
                    border-top-left-radius: 5px;
                    border-top-right-radius: 5px;
                    padding: 10px 10px 0 10px;
                  ">
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/mail.png') }}" alt="Email" width="40" height="40"
                                        style="height: 40px; width: 40px" />
                                </a>
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/facebook.png') }}" alt="Facebook" width="40"
                                        height="40" style="height: 40px; width: 40px" />
                                </a>
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/twitter.png') }}" alt="Twitter" width="40"
                                        height="40" style="height: 40px; width: 40px" />
                                </a>
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/instagram.png') }}" alt="Instagram" width="40"
                                        height="40" style="height: 40px; width: 40px" />
                                </a>
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/youtube.png') }}" alt="YouTube" width="40"
                                        height="40" style="height: 40px; width: 40px" />
                                </a>
                                <a href="#" style="margin: 0 10px; text-decoration: none">
                                    <img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn" width="40"
                                        height="40" style="height: 40px; width: 40px" />
                                </a>
                            </div>
                            {{-- DISCLAIMER --}}
                            <p id="footer"
                                style="
                    text-align: center;
                    color: #fff;
                    padding: 20px;
                    background-color: #000;
                    margin: 0 0 10px 0;
                    font-size: 16px;
                    border-bottom-left-radius: 5px;
                    border-bottom-right-radius: 5px;
                  ">
                                &copy; Copyright May 2021,
                                <a href="#" style="color: #e6331f">ACME</a>. All rights
                                reserved. Acme is a subsidiary of
                                <a href="#" style="color: #e6331f">acme.net</a> listed on
                                OTC Markets as
                                <a href="#" style="color: #e6331f">ACME</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
