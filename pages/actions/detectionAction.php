<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO detections(`sbxid`,`badip`,`added`,`hitcount`) VALUES('".$_POST['sbxid']."','".$_POST['badip']."','".date("Y/m/d h:m:s")."',0)";
            $result = $conn->query($sql);
            header('location:../detections.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  detections SET `sbxid` = '".$_POST['sbxid']."',`badip` = '".$_POST['badip']."'  WHERE id='".$_POST['id']."'";
            
            
            $result = $conn->query($sql);
            header('location:../detections.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM detections WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../detections.php');
        }
    }
?>