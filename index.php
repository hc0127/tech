<?php
    require_once('header.php');

    if(isset($_SESSION) && $_SESSION['user_id'] != "")
    {
?>
    <div class="form-wrapper"> 
        <center><h1>Welcome: <?php echo $_SESSION['user_id']; ?> </h></center>
        <div class="reminder">
    </div>
<?php
    }else{
        header('location:pages/login.php');
    }
?>
<?php
    require_once('footer.php');
?>
