<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: Login_admin/index.php"); 
    }
    else{

$subjectid=intval($_GET['subjectid']);
$sql="DELETE FROM notices WHERE id=:subjectid";
$query = $dbh->prepare($sql);
$query->bindParam(':subjectid',$subjectid,PDO::PARAM_STR);
$query->execute();
header("Location: manage-notice.php");
}
?>