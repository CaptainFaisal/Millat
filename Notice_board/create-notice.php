<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: ../login/index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$title=$_POST['title'];
$files=$_FILES['file']; 
$fileTmpName = $files['tmp_name'];
$fileName = $files['name'];
$fileError = $files['error'];
$tmp = end(explode(".",$fileName));
$fileExtName = strtolower($tmp);
$allowed = array('png','jpg','jpeg','pdf','docx');
$allow = "";
$fileErr = "";
if(in_array($fileExtName,$allowed)){
    if($fileError === 0){
        $fileNameNew = uniqid("",true).".".$fileExtName;
        $destination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$destination);
    }else{
        $fileErr = "Something went wrong! please try again.";
    }
}else{
    $fileErr = "You can not upload this type of file.";
}


$sql="INSERT INTO  notices(Title,Files) VALUES(:title,:files)";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':files',$destination,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Notice Added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Notice</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Notice Creation</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Notice Board</li>
                                    <li class="active">Create Notice</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Create Notice</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <?php if($fileErr){ ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <?php echo htmlentities($fileErr); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" id="default"
                                                        placeholder="Add a Title" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Attach File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" class="form-control" id="default"
                                                        placeholder="Attach a File" required="required">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
        $(function($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });
        </script>
</body>

</html>
<?PHP } ?>