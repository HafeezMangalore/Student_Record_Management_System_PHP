<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
} else{ 
  if(isset($_POST['submit'])){    
    $status=1;
    $session=$_POST['session'];

    $sql="update session set status='$status' where session='$session';";
    $sql.="update session set status='0' where session!='$session';";
    $query = mysqli_multi_query($con, $sql);
    if($query){
      echo '<script>alert("session updated successfully")</script>';
      echo "<script>window.location.href='session.php'</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>session</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include('leftbar.php');?>
        <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Academic Year
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>Session<span id="" style="font-size:11px;color:red">*</span></label>
                                </div>
                                <div class="col-lg-4">
                                    <?php $query=mysqli_query($con,"SELECT * FROM `session` where status=1");
                                    while($res=mysqli_fetch_array($query)){?> 
                                        <b>Current Session:</b>  <?php echo $res['session']?>
                                    <?php } ?><br /><br />
                                    <form method="post">
                                    <?php $query=mysqli_query($con,"SELECT * FROM `session`");
                                    while($res=mysqli_fetch_array($query)){?>   
                                        <input type="radio" name="session" id="session" value="<?php echo $res['session']?>"  required="required">
                                        &nbsp;&nbsp;<?php echo $res['session']?> <br>
                                    <?php } ?>
                                </div>         
                                <br />
                                <div class="col-lg-3">&nbsp;</div>
                                <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Update Session">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
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
