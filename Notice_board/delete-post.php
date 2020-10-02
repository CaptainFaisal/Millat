<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: Login_admin/index.php"); 
    }
    else{

$pid=intval($_GET['postid']);
$sql="DELETE FROM post WHERE id=:pid";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->execute();
header("Location: manage-post.php");
}
?>