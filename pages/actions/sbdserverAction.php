<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO sbdserver(`sbdid`,`ip`,`owner`,`active`,`updates`) VALUES('".$_POST['sbdid']."','".$_POST['ip']."','1','yes','yes')";
            $result = $conn->query($sql);
            header('location:../sbdserver.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  sbdserver SET `sbdid` = '".$_POST['sbdid']."',`ip` = '".$_POST['ip']."' WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            // var_dump($sql);exit;
            header('location:../sbdserver.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM sbdserver WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../sbdserver.php');
        }
    }
?>