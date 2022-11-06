<?php
    session_start();
    session_destroy();
    // $_SESSION['user_id']="";
    // $_SESSION['email_id']="";
    // $_SESSION['role']="";
    header('location:../index.php');
  ?>