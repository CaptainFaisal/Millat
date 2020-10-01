<?php
    $connect = mysqli_connect("localhost","root","","noticeboard");
    $maintenance = $_POST['name'];
    if($maintenance != ''){
    $katana = "UPDATE maintenance SET maintenance = '$maintenance';";
    $katana1 = mysqli_query($connect, $katana);
    }
    $read = "SELECT maintenance FROM maintenance;";
    $read1 = mysqli_query($connect, $read);
    $result = mysqli_fetch_array($read1);
?>
<?php echo $maintenance; ?>

