<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/db_connect2.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM crud_login.user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

// select blog entries data
$sqlSelect2 = "SELECT * FROM hobby_php4.entries";
$result2 = mysqli_query($connect, $sqlSelect2);
//this variable will hold the body for the table ENTRY
$tbody2 = '';
if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
        $tbody2 .= "<tr>
        <td><img class='img-thumbnail' src='pictures/" . $row2['picture'] . "'</td>
        <td>" . $row2['title'] . "</td>
        <td>" . $row2['date'] . "</td>
        <td>" . $row2['entry'] . "</td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .userImage {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-2">
                <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
                <p class="">Hi <?php echo $row['first_name']; ?>!</p>
                <a href="logout.php?logout">Sign Out</a><br>
                <a href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a><br>
            </div>

            <div class="col-8 mt-2">
                <p class='h2'>Welcome to Rasmi's Hobby Blog!</p>
                <table class='table table-striped'>
                    <thead class='table-success'>
                        <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody2 ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>