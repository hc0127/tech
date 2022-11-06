<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM updates";
    $result    = $conn->query($sql);
?>
    <h2>Updates</h2>
    <!-- <form action="./users.php" method="post"> -->
        <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
            <!-- <input type="hidden" name="action" value="create"/>
            <button type="submit" >Create</button> -->
        <?php } ?>
    <!-- </form> -->
    <!-- <form action="./actions/users.php" method="post"> -->
        <?php if(isset($_POST['action'])){ ?>
            <?php if($_POST['action'] == "create"){ ?>
                <!-- <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                <input type="text" name="username" placeholder="username"/>
                <input type="text" name="mail"  placeholder="mail"/>
                <button type="submit" >Create</button> -->
            <?php }elseif($_POST['action'] == "edit"){ ?>
                <!-- <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                <input type="text" name="username" placeholder="username" value= <?php echo $_POST['username'] ?> />
                <input type="text" name="mail"  placeholder="mail" value= <?php echo $_POST['mail'] ?> />
                <button type="submit" >Edit</button> -->
            <?php } ?>
        <?php } ?>
    <!-- </form> -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>sbcid</th>
                <th>ipv</th>
                <th>badip</th>
                <th>added</th>
                <th>isnew</th>
                <th>banned</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$update){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $update['sbcid'] ?></td>
                <td><?php echo $update['ipv'] ?></td>
                <td><?php echo $update['badip'] ?></td>
                <td><?php echo $update['added'] ?></td>
                <td><?php echo $update['isnew'] ?></td>
                <td><?php echo $update['banned'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./users.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="sbcid" value= <?php echo $update['sbcid']?> >
                            <input type="hidden" name="ipv" value= <?php echo $update['ipv']?> >
                            <input type="hidden" name="badip" value= <?php echo $update['badip']?> >
                            <input type="hidden" name="added" value= <?php echo $update['added']?> >
                            <input type="hidden" name="isnew" value= <?php echo $update['isnew']?> >
                            <input type="hidden" name="banned" value= <?php echo $update['banned']?> >
                            <input type="hidden" name="id" value= <?php echo $update['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/users.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $update['id']?>>
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