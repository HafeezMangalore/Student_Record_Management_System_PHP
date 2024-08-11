<!DOCTYPE html>
<html>
<head>
    <title>Navbar Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .navbar-default {
            background-color: #f8f8f8;
            border-color: #e7e7e7;
        }
        .navbar-brand {
            color: purple;
        }
        .navbar-default .navbar-nav > li > a {
            color: #333;
        }
        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #333;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            background-color: #e7e7e7;
        }
        .sidebar-nav {
            padding: 15px 0;
        }
        .sidebar-nav > .nav > li > a {
            color: #333;
        }
        .sidebar-nav > .nav > li > a:hover,
        .sidebar-nav > .nav > li > a:focus {
            background-color: #f5f5f5;
            color: #333;
        }
        .sidebar-nav > .nav > li > .nav-second-level > li > a {
            padding-left: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Student Management System</a>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file fa-fw"></i> Course<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add-course.php">Add Course</a>
                            </li>
                            <li>
                                <a href="manage-courses.php">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Subject<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add-subject.php">Add Subject</a>
                            </li>
                            <li>
                                <a href="manage-subjects.php">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="register.php"><i class="fa fa-user fa-fw"></i> Register</a>
                    </li>
                    <li>
                        <a href="manage-students.php"><i class="fa fa-users fa-fw"></i> View Students</a>
                    </li>
                    <li>
                        <a href="session.php"><i class="fa fa-calendar fa-fw"></i> Session</a>
                    </li>
                    <li>
                        <a href="change-password.php"><i class="fa fa-cog fa-fw"></i> Change Password</a>
                    </li>
                    <li>
                        <a href="admin-profile.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
