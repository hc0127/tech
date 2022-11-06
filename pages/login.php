<?php
    require_once('../header.php');
?>
<form action="./login.php" method="post">
    <h3>Login here</h3>
    <div class="form-item">
        <input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
        
        <input type="password" name="pass" required="required" placeholder="Password" required></input>

        <input type="submit" class="button" name="login" value="Login"></input>
    </div>
  </form>
<?php
    require_once('../footer.php');
?>
  <?php
  if (isset($_POST['login']))
    {
      foreach($userlist as $user){
        if($user['username'] == $_POST['user']){
          if($user['password'] == sha1($_POST['pass'])){
            $_SESSION['user_id']=$user['username'];
            $_SESSION['email_id']=$user['username'];
            $_SESSION['role']=$user['type'];
            $_SESSION['ipaddress']=$_SERVER['REMOTE_ADDR'];
            header('location:../index.php');
            break;
          }else{
            break;
          }
        }
      }
      echo 'Invalid Username and Password Combination';
    }
  ?>