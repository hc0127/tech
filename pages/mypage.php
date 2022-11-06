<?php
    require_once('../header.php');
?>
<form action="./mypage.php" method="post">
    <h3>Admin Info</h3>
    <div class="form-item">
        <input type="password" name="password" required="required" placeholder="Password" required></input>
        <input type="password" name="rpassword" required="required" placeholder="Confirm Password" required></input>
        <input type="submit" class="button" name="save" value="Save"></input>
    </div>
  </form>
<?php
    require_once('../footer.php');
?>

<?php
  if (isset($_POST['save']))
    {
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $rpassword = mysqli_real_escape_string($conn, $_POST['rpassword']);
      if($password = $rpassword){
          $sql = "UPDATE users SET password='".sha1($password)."' WHERE username='admin'";
          $conn->query($sql);
      }
    }
  ?>