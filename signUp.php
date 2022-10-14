<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body,
        html {
            height: 100vh;
            width: 100vw;
            justify-content: center;
            align-items: center;
            display: flex;
        }


        .center {
            background-color: black;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        #login-Form {
            display: flex;
            flex-direction: column;
        }

        .center h1 {
            text-align: center;
            padding: 4% 0 4% 0;
            border-bottom: 1px solid white;
            color: white;
            font-weight: 100;
        }

        .center form {
            padding: 0 5%;
            box-sizing: border-box;
        }

        form .text_field {
            margin-bottom: 5%;
            margin-top: 5%;
        }

        .text_field input {
            width: 95%;
            padding: 10px 5px;
            font-size: 16px;
            border: none;
            background: #353536;
            outline: none;
            color: white;
            border-radius: 5px;
        }

        .text_field label {
            position: relative;
            color: #adadad;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }

        .text_field span::before {
            content: "";
            position: absolute;
            top: 19px;
            left: 0;
            width: 0%;
            height: 2px;
            background: white;
            transition: 0.3s;
        }

        .password {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .password:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 90%;
            height: 50px;
            border: 1px solid;
            background: rgb(10, 100, 150);
            border-radius: 5px;
            border-color: #353536;
            font-size: 18px;
            color: #e9f4fb;
            cursor: pointer;
            outline: none;
            transition: 0.3s ease-in-out;
            margin: auto;
            position: relative;
        }

        input[type="submit"]:hover {
            width: 93%;
            opacity: 0.9;
            margin: auto;
        }

        .signup_link {
            margin: 20px 0;
            text-align: center;
            font-size: 16px;
            color: white;
        }

        .signup_link a {
            color: #b6b6b9;
            text-decoration: none;
        }

        .signup_link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div id="Login_Window">
        <div class="center">
            <h1>Sign Up</h1>
            <form action="signUp.php" id="login-Form" method="post">
                <div class="text_field">
                    <label for="Email">Enter your Email</label>
                    <span></span>
                    <input type="email" required id="email_input" name="email" />
                </div>
                <div class="text_field">
                    <label for="Password">Enter Password</label>
                    <span></span>
                    <input type="password" required id="password_input" name="password" />
                </div>

                <input type="submit" value="Sign Up" />
                <div class="signup_link">Already a member? <a href="index.php">Login</a></div>
            </form>
        </div>
    </div>
    <?php
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email_input = $_POST["email"];
        $password_input = $_POST["password"];
        $email_input = strtolower($email_input);
    }
    if (!empty($email_input) && !empty($password_input)) {
        writeInLog($email_input . ";" . $password_input . ";");
        header("Location: index.php");
        exit;
    }



    function writeInLog($logMsg)
    {
        $logFile = "log";
        if (!file_exists($logFile)) {
            mkdir($logFile, 0777, true);
        }
        $logData = $logFile . '\users';
        file_put_contents($logData, $logMsg . "\n", FILE_APPEND);
    }

    ?>
</body>

</html>