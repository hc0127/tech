<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO reports(`sbxid`,`remote`,`type`,`badip`,`added`,`isnew`,`comments`) VALUES('".$_POST['sbxid']."','".$_POST['remote']."','".$_POST['type']."','".$_POST['badip']."','".date("Y/m/d h:m:s")."','yes','".$_POST['comments']."')";
            $result = $conn->query($sql);
            header('location:../reports.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  reports SET `sbxid` = '".$_POST['sbxid']."',`remote` = '".$_POST['remote']."',`type` = '".$_POST['type']."',`badip` = '".$_POST['badip']."',`comments` = '".$_POST['comments']."'  WHERE id='".$_POST['id']."'";
            
            $result = $conn->query($sql);
            header('location:../reports.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM reports WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../reports.php');
        }
    }
?>