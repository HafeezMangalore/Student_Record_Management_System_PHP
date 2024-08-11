
<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
    exit();
}

// Query to get the number of listed courses
$query = mysqli_query($con, "SELECT cid FROM tbl_course");
$listedCourses = mysqli_num_rows($query);

// Query to get the number of subjects
$query1 = mysqli_query($con, "SELECT subid FROM subject");
$totalSubjects = mysqli_num_rows($query1);

// Query to get the number of total students
$query2 = mysqli_query($con, "SELECT id FROM registration");
$totalStudents = mysqli_num_rows($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include('leftbar.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?>
                        <a href="#top"></a>
                    </h4>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: blue;">Manage-Details of Students</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <!---Courses ----->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-file fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo htmlentities($listedCourses); ?></div>
                                                        <div>Listed Courses</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="manage-courses.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!--Subjects -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-files-o fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo htmlentities($totalSubjects); ?></div>
                                                        <div>Subjects</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="manage-subjects.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Courses Wise Subjects</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Students -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-fw fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo htmlentities($totalStudents); ?></div>
                                                        <div>Total Students</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="manage-students.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="dist/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Script for checking course availability -->
    <script>
        function courseAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cshort=' + $("#cshort").val(),
                type: "POST",
                success: function (data) {
                    $("#course-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }

        function coursefullAvail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cfull=' + $("#cfull").val(),
                type: "POST",
                success: function (data) {
                    $("#course-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
           