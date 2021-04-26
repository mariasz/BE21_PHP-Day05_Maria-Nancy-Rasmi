<?php
session_start();
require_once 'components/db_connect2.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if it is a user this will redirect to home  page
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM entries WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $title = $data['title'];
        $date = $data['date'];
        $entry = $data['entry'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Entry</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="components/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <td><input class="form-control" type="text" name="title" placeholder="Entry Title" value="<?php echo $title ?>" /></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input class="form-control" type="text" name="date" placeholder="Date" value="<?php echo $date ?>" /></td>
                </tr>
                <tr>
                    <th>Entry</th>
                    <td><input class="form-control" type="text" name="entry" placeholder="Entry" value="<?php echo $entry ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />

                </tr>
            </table>
            <td><button class="btn btn-success" type="submit">Save Changes</button>
                <a href="index.php"><button class="btn btn-warning" type="button">Back</button></a>
            </td>
        </form>
    </fieldset>
</body>

</html>