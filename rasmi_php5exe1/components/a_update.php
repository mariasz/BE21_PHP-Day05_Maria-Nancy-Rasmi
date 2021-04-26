<?php
session_start();
require_once 'db_connect2.php';
require_once 'file_upload2.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if it is a user this will redirect to home  page
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

if ($_POST) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $entry = $_POST['entry'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $picture = file_upload($_FILES['picture']); //file_upload() called  
    if ($picture->error === 0) {
        ($_POST["picture"] == "default.png") ?: unlink("../pictures/$_POST[picture]");
        $sql = "UPDATE entries SET title = '$title', date = '$date', entry = '$entry', picture = '$picture->fileName' WHERE id = {$id}";
    } else {
        $sql = "UPDATE entries SET title = '$title', date = '$date', entry = '$entry' WHERE id = {$id}";
    }
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Entry Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>