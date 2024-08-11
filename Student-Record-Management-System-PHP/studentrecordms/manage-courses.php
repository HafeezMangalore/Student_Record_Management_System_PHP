<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
    exit();
} else {

    if (isset($_GET['del'])) {
        $courseid = $_GET['del'];
        $query = mysqli_query($con, "delete from tbl_course where cid='$courseid'");
        echo '<script>alert("Course deleted")</script>';
        echo '<script>window.location.href=manage-courses.php</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Courses</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="dist/css/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include('leftbar.php'); ?>

        <nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Manage Courses
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Short Name</th>
                                                <th>Full Name</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "select * from tbl_course");
                                            $sn = 1;
                                            while ($res = mysqli_fetch_array($query)) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['cshort'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['cfull'])); ?></td>
                                                    <td><?php echo htmlentities($res['cdate']); ?></td>
                                                    <td>&nbsp;&nbsp;<a href="edit-course.php?cid=<?php echo htmlentities($res['cid']); ?>" class="btn btn-primary">Edit</a> &nbsp;
                                                        <a href="manage-courses.php?del=<?php echo htmlentities($res['cid']); ?>" class="btn btn-danger" onclick="return confirm('Do you really want to delete?');">Delete</a></td>
                                                </tr>
                                            <?php $sn++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/metisMenu.min.js"></script>
    <script src="dist/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
