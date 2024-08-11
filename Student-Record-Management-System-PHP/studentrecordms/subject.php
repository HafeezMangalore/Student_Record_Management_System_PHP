<?php
include('includes/dbconnection.php');

if (!empty($_POST["id"])) {
    $id = intval($_POST['id']);
    $stmt = mysqli_query($con, "SELECT * FROM states WHERE country_id = '$id'");
    while ($row = mysqli_fetch_array($stmt)) {
        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['name']) . '</option>';
    }
}

if (!empty($_POST["did"])) {
    $id = intval($_POST['did']);
    $stmt = mysqli_query($con, "SELECT * FROM cities WHERE state_id = '$id'");
    echo '<option value="">Select City</option>';
    while ($row = mysqli_fetch_array($stmt)) {
        echo '<option value="' . htmlentities($row['name']) . '">' . htmlentities($row['name']) . '</option>';
    }
}

if (!empty($_POST["cid"])) {
    $id = intval($_POST['cid']);
    $stmt = mysqli_query($con, "SELECT * FROM subject WHERE cshort = '$id'");
    $count = mysqli_num_rows($stmt);
    if ($count > 0) {
        while ($row = mysqli_fetch_array($stmt)) {
            echo ($row['sub1'] . "+" . $row['sub2'] . "+ " . $row['sub3']);
        }
    } else {
        echo "Subjects not listed yet";
    }
}
?>
