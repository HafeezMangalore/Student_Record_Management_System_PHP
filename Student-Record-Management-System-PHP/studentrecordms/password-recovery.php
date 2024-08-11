<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
    $uname=$_POST['id'];
    $emailid=$_POST['emailid'];
    $Password=$_POST['password'];
    $query=mysqli_query($con,"select ID,loginid from tbl_login where  loginid='$uname' && AdminEmail='$emailid' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        $ret=mysqli_query($con,"update tbl_login set password='$Password' where loginid='$uname' && AdminEmail='$emailid' ");
        echo '<script>alert("Your password has been successfully changed.")</script>';
        echo "<script>window.location.href='login.php'</script>";
    }
    else{
        echo '<script>alert("Invalid details")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Record Management System | Password Recovery</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto;
            background: linear-gradient(120deg, #007bff, #d0314c);
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-group a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .form-group a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Password Recovery</h2>
        <form method="post">
            <div class="form-group">
                <label for="id">Login Id</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="emailid">Admin Email Id</label>
                <input type="email" id="emailid" name="emailid" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password" name="submit">
            </div>
            <div class="form-group">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>

</html>
