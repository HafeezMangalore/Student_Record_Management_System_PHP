<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $aid = $_SESSION['aid'];
        $aname = $_POST['adminname'];
        $aemail = $_POST['aemailid'];

        $query = mysqli_query($con, "update tbl_login set FullName='$aname',AdminEmail='$aemail' where id='$aid'");
        if ($query) {
            echo '<script>alert("Admin Profile updated successfully")</script>';
            echo "<script>window.location.href='admin-profile.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form method="post">
        <div id="wrapper">
            <!-- Navigation -->
            <?php include('leftbar.php') ?>;
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <?php
                            $adminid = intval($_SESSION['aid']);
                            $query = mysqli_query($con, "SELECT * FROM tbl_login where id='$adminid'");
                            $sn = 1;
                            while ($res = mysqli_fetch_array($query)) {
                            ?>
                                <div class="panel-heading"><b>Edit Admin Profile</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" name="adminname" id="adminname" value="<?php echo $res['FullName']; ?>" required="required">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Email id</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" name="aemailid" id="aemailid" value="<?php echo $res['AdminEmail']; ?>" required="required">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Logind Id/ username</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" name="loginid" id="loginid" value="<?php echo $res['loginid']; ?>" disabled required="required">
                                                    <small style="color:red;">Logind Id/ username can't be edit</small>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6"><br><br><input type="submit" class="btn btn-primary" name="submit" value="Update Profile"></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
</body>

</html>
<?php } ?>
