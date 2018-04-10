<!DOCTYPE html>
<html>
    <head>
        <title>MVC</title>

        <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

        <style>


            /* Styles */
            * {
                margin: 0;
                padding: 0;
            }

            body {
                font-family: "Arial";
                font-size: 14px;
            }

            .container {
                width: 500px;
                margin: 25px auto;
            }

            table,form {
                padding: 20px;
                background: #2f3f5f;
                color: #fff;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
            }
            form label,
            form input,
            table,form button,a {
                border: 0;
                margin-bottom: 3px;
                display: block;
                width: 100%;
            }
            form input {
                height: 25px;
                line-height: 25px;
                background: #fff;
                color: #000;
                padding: 0 6px;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            form button,a {
                height: 30px;
                line-height: 30px;
                background: green;
                color: #fff;
                margin-top: 10px;
                cursor: pointer;
                text-decoration: none;
            }
            form .error {
                color: #ff0000;
            }

        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body><div class="container">