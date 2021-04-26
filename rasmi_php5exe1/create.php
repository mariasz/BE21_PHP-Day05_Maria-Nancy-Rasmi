<?php
session_start();

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if it is a user this will redirect to home  page
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Hobby Blog | Add Entry</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Entry</legend>
        <form action="components/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="title" placeholder="Entry Title" /></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input class='form-control' type="text" name="date" placeholder="Date" /></td>
                </tr>
                <tr>
                    <th>Entry</th>
                    <td><input class='form-control' type="text" name="entry" placeholder="Entry" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <td>
                        <button class='btn btn-success' type="submit">Add Entry</button>
                        <a href="index.php"><button class='btn btn-warning' type="button">Back</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>