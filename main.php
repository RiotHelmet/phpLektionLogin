<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["loggedIn"])) {
        echo "Logged in successfully!\n";
        echo " Welcome " . $_SESSION["currentUser"];

    ?>
        <br>
        <br>
        <form action="main.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>

    <?php

        if (isset($_POST)) {
            if (!empty($_FILES["fileToUpload"]["name"])) {
                $target_dir = "uploadedFiles/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                $uploadImg = $_FILES["fileToUpload"]["name"];
                writeInLog($_SESSION["currentUser"] . ";" . $uploadImg);
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }
    } else {
        header("Location: index.php");
        exit;
    }
    function writeInLog($logMsg)
    {
        $logFile = "log";
        if (!file_exists($logFile)) {
            mkdir($logFile, 0777, true);
        }
        $logData = $logFile . '\log';
        file_put_contents($logData, $logMsg . "\n", FILE_APPEND);
    }
    ?>

</body>

</html>