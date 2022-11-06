<?php
    include('inc/connect.php'); 
    session_start();
    $base_url = strpos($_SERVER['REQUEST_URI'],'pages') ? "../" : "";
    if(array_key_exists('ipaddress',$_SESSION)){
        if($_SESSION['ipaddress'] != $_SERVER['REMOTE_ADDR']){
            session_destroy();
            header('location:../pages/login.php');
        }
    }else{
        if(!strpos($_SERVER['REQUEST_URI'],'login')){
            header('location:../pages/login.php');
        }
    }
?>

<html>
    <head>
        <title>Tech Manage</title>
        <style>
            h1,h2,h3{
                text-align:center;
            }
            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333333;
            }

            li {
            float: left;
            }
            li.log{
            float:right;
            }

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px;
            text-decoration: none;
            }

            li a:hover {
            background-color: #111111;
            }
            button{
                display:block;
                margin:auto;
                margin-bottom:2px;
                text-align:center;
                width:80px;
                height:30px;
            }
            table {
            border-collapse: collapse;
            width: 100%;
            text-align:center;
            }

            th, td {
            text-align: left;
            padding: 8px;
            text-align:center;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
            background-color: #04AA6D;
            color: white;
            }
            form{
                text-align:center;
            }
            form input{
                margin:5px;
            }
            form.inline{
                display:inline-block;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align:center;">Technical Managemnet System</h1>
        <ul>
            <?php
            if(array_key_exists('ipaddress',$_SESSION) && $_SESSION['user_id'] != ""){
            ?>
            <li><a href= <?php echo $base_url."pages/users.php" ?> >users</a></li>
            <li><a href=<?php echo $base_url."pages/whitelist.php" ?> >whitelist</a></li>
            <li><a href=<?php echo $base_url."pages/staticblack.php" ?> >staticblack</a></li>
            <li><a href=<?php echo $base_url."pages/sbcserver.php" ?> >sbcserver</a></li>
            <li><a href=<?php echo $base_url."pages/sbdserver.php" ?> >sbdserver</a></li>
            
            <li><a href=<?php echo $base_url."pages/detections.php" ?> >detections</a></li>
            <li><a href=<?php echo $base_url."pages/reports.php" ?> >report</a></li>
            <li><a href=<?php echo $base_url."pages/pphistory.php" ?> >pphistory</a></li>
            <li><a href=<?php echo $base_url."pages/sbxwarnings.php" ?> >sbxwarnings</a></li>
            <li><a href=<?php echo $base_url."pages/updates.php" ?> >updates</a></li>
            <?php if($_SESSION['role'] == "admin"){ ?>
                <li><a href=<?php echo $base_url."pages/mypage.php" ?> >My Info</a></li>
            <?php } ?>
            <li class="log"><a href= <?php echo $base_url."pages/logout.php" ?>>logout</a></li>
            <?php
            }else{
            ?>
            <li class="log"><a href= <?php echo $base_url."pages/login.php" ?>>login</a></li>
            <?php
            }
            ?>
        </ul>