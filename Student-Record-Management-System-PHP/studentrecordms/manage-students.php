<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
    exit();
} else {

    if (isset($_GET['del'])) {
        $sid = $_GET['del'];
        $query = mysqli_query($con, "delete from registration where id='$sid'");
        echo '<script>alert("Student record deleted")</script>';
        echo "<script>window.location.href='manage-students.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Students</title>
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
                                View Students
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>RegNo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>MobNO</th>
                                                <th>Course</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "select * from registration left join tbl_course on tbl_course.cid=registration.course");
                                            $sn = 1;
                                            while ($res = mysqli_fetch_array($query)) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['regno'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['fname'] . " " . $res['mname'] . " " . $res['lname'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['emailid'])); ?></td>
                                                    <td><?php echo htmlentities($res['mobno']); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['cshort'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['subject'])); ?></td>
                                                    <td width="100"><a href="edit-student.php?id=<?php echo htmlentities($res['id']); ?>" class="btn btn-primary btn-xs">Edit</a> &nbsp;&nbsp;
                                                        <a href="manage-students.php?del=<?php echo htmlentities($res['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Do you really want to delete?');">Delete</a>

                                                    </td>

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
