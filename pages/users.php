<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM users";
    $result    = $conn->query($sql);
?>
    <h2>Users</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./users.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/userAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="username" placeholder="username"/>
                    <input type="text" name="mail"  placeholder="mail"/>
                    <input type="text" name="password"  placeholder="password"/>
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="username" placeholder="username" value= <?php echo $_POST['username'] ?> />
                    <input type="text" name="mail"  placeholder="mail" value= <?php echo $_POST['mail'] ?> />
                    <input type="text" name="password"  placeholder="password" />
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>mail</th>
                <th>created</th>
                <th>last access</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$user){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $user['username']?></td>
                <td><?php echo $user['mail'] ?></td>
                <td><?php echo $user['added'] ?></td>
                <td><?php echo $user['lastaccess'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./users.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="username" value= <?php echo $user['username']?> >
                            <input type="hidden" name="mail" value= <?php echo $user['mail']?> >
                            <input type="hidden" name="id" value= <?php echo $user['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/userAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $user['id']?>>
                            <button type="submit">DELETE</button>
                        </form>
                    </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
    require_once('../footer.php');
?>