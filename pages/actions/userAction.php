<?php
    require_once('../../inc/connect.php');

    if(isset($_POST['action'])){
        if($_POST['action'] == "create"){
            $sql = "INSERT INTO users(`username`,`mail`,`password`,`added`,`enabled`,`lastaccess`,`type`) VALUES('".$_POST['username']."','".$_POST['mail']."','".sha1($_POST['password'])."','".date("Y/m/d h:m:s")."','yes','".date("Y/m/d h:m:s")."','user')";
            $result = $conn->query($sql);
            header('location:../users.php');
        }
        if($_POST['action'] == "edit"){
            if($_POST['password'] == ""){
                $sql = "UPDATE  users SET `username` = '".$_POST['username']."',`mail` = '".$_POST['mail']."',`lastaccess` = '".date("Y/m/d h:m:s")."' WHERE id='".$_POST['id']."'";
            }else{
                $sql = "UPDATE  users SET `username` = '".$_POST['username']."',`mail` = '".$_POST['mail']."',`password` = '".sha1($_POST['password'])."',`lastaccess` = '".date("Y/m/d h:m:s")."' WHERE id='".$_POST['id']."'";
            }
            $result = $conn->query($sql);
            header('location:../users.php');
        }
        if($_POST['action'] == "delete"){
            $sql = "DELETE FROM users WHERE id='".$_POST['id']."'";
            $result = $conn->query($sql);
            header('location:../users.php');
        }
    }
?>