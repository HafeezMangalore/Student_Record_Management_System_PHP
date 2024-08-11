<?php 
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
    $uname=$_POST['username'];
    $Password=$_POST['password'];
    $query=mysqli_query($con,"select ID,loginid from tbl_login where  loginid='$uname' && password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        $_SESSION['aid']=$ret['ID'];
        $_SESSION['login']=$ret['loginid'];
        header('location:dashboard.php');
    }
    else{
        echo "Invalid Details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Record Management System |  Login </title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Roboto;
            background-repeat: no-repeat;
            background-size: cover;
            background: linear-gradient(120deg, #007bff, #d0314c);
            height: 100vh;
            overflow: hidden;
        }

        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h1{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }

        .txt_field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0px;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }

        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
            top: -5px;
            color: #2691d9;
        }

        .txt_field input:focus ~ span::before,
        .txt_field input:Valid ~ span::before{
            width: 100%;
        }

        .pass{
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .pass:hover{
            text-decoration: underline;
        }

        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            border-radius: 25px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
        }

        input[type="submit"]:hover{
            background: #2691d9;
            color: #e9f4fb;
            transition: .5s;
        }

        .signup_link{
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .signup_link a{
            color: #2691d9;
            text-decoration: none;
        }

        .signup_link a:hover{
            text-decoration: underline;
        }

        .HomeAbout{
            width: 100vw;
            height: 25vh;
        }

        @media only screen and (max-width: 768px) {
            .center {
                width: 80%;
            }
        }

        @media only screen and (max-width: 480px) {
            .center {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<h1 style="text-align:center; color:white; padding-top:20px;">Student Record Management System</h1>
<div class="container">
    <div class="center">
        <h1>Login</h1>
        <form id="loginForm" action="login.php" method="POST">
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass"><a href="password-recovery.php">Forget Password?</a></div>
            <input name="submit" type="submit" value="Login">
            <div class="signup_link">
               
            </div>
        </form>
    </div>
</div>
</body>
</html>
