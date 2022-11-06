<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO staticblack(`longstart`,`longend`,`CIDR`,`type`,`info`) VALUES('".$_POST['longstart']."','".$_POST['longend']."','".$_POST['CIDR']."','".$_POST['type']."','".$_POST['info']."')";
            $result = $conn->query($sql);
            header('location:../staticblack.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  staticblack SET `longstart` = '".$_POST['longstart']."',`longend` = '".$_POST['longend']."',`CIDR` = '".$_POST['CIDR']."',`type` = '".$_POST['type']."',`info` = '".$_POST['info']."' WHERE id='".$_POST['id']."'";
            
            $result = $conn->query($sql);
            header('location:../staticblack.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM staticblack WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../staticblack.php');
        }
    }
?>