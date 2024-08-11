<?php
session_start();
include('includes/dbconnection.php');

if (empty($_SESSION['aid'])) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['submit'])) {
    $cshortname = $_POST['course-short'];
    $cfullname = $_POST['course-full'];
    $udate = date('Y-m-d');
    $cid = intval($_GET['cid']);

    $query = mysqli_query($con, "UPDATE tbl_course SET cshort='$cshortname', cfull='$cfullname', cdate='$udate' WHERE cid='$cid'");
    if ($query) {
        echo '<script>alert("Course updated successfully")</script>';
        echo "<script>window.location.href='manage-courses.php'</script>";
    } else {
        echo '<script>alert("Something went wrong. Please try again")</script>';
        echo '<script>window.location.href=add-course.php</script>';
    }
}

$cid = intval($_GET['cid']);
$query = mysqli_query($con, "SELECT * FROM tbl_course WHERE cid='$cid'");
$count = mysqli_num_rows($query);
$res = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Course</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form method="post">
        <div id="wrapper">
            <!-- Navigation -->
            <?php include('leftbar.php') ?>;
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit Course</div>
                            <div class="panel-body">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Course Short Name</label>
                                        <input class="form-control" name="course-short" value="<?php echo $res['cshort']; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Full Name</label>
                                        <input class="form-control" name="course-full" value="<?php echo $res['cfull']; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" name="udate">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update Course">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="dist/js/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="dist/js/metisMenu.min.js"></script>
        <script src="dist/js/sb-admin-2.js"></script>
    </form>
</body>

</html>
