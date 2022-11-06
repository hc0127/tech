<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO whitelist(`ip`) VALUES('".$_POST['ip']."')";
            $result = $conn->query($sql);
            header('location:../whitelist.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  whitelist SET `ip` = '".$_POST['ip']."' WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../whitelist.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM whitelist WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../whitelist.php');
        }
    }
?>