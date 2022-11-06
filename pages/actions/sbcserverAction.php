<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO sbcserver(`sbcid`,`ip`,`connect`,`owner`,`enabled`,`updates`,`method`) VALUES('".$_POST['sbcid']."','".$_POST['ip']."','".$_POST['connect']."','1','yes','yes','".$_POST['method']."')";
            $result = $conn->query($sql);
            header('location:../sbcserver.php');
        }
        if($_POST['action'] == "edit"){
            $sql = "UPDATE  sbcserver SET `sbcid` = '".$_POST['sbcid']."',`ip` = '".$_POST['ip']."',`connect` = '".$_POST['connect']."',`method` = '".$_POST['method']."' WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../sbcserver.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM sbcserver WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../sbcserver.php');
        }
    }
?>