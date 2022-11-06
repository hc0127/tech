<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM sbxwarnings";
    $result    = $conn->query($sql);
?>
    <h2>SBXWarnings</h2>
    <!-- <form action="./users.php" method="post"> -->
        <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
            <!-- <input type="hidden" name="action" value="create"/>
            <button type="submit" >Create</button> -->
        <?php } ?>
    <!-- </form>
    <form action="./actions/users.php" method="post"> -->
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
                <th>receiver</th>
                <th>reportid</th>
                <th>added</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$warning){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $warning['reciver'] ?></td>
                <td><?php echo $warning['reportid'] ?></td>
                <td><?php echo $warning['added'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./users.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="reciver" value= <?php echo $warning['reciver']?> >
                            <input type="hidden" name="reportid" value= <?php echo $warning['reportid']?> >
                            <input type="hidden" name="added" value= <?php echo $warning['added']?> >
                            <input type="hidden" name="id" value= <?php echo $warning['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/users.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $warning['id']?>>
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