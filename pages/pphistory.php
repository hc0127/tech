<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM pphistory";
    $result    = $conn->query($sql);
?>
    <h2>PPhistory</h2>
    <!-- <form action="./users.php" method="post"> -->
        <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
            <!-- <input type="hidden" name="action" value="create"/>
            <button type="submit" >Create</button> -->
        <?php } ?>
    <!-- </form> -->
    <!-- <form action="./actions/pphistoryAction.php" method="post"> -->
        <?php if(isset($_POST['action'])){ ?>
            <?php if($_POST['action'] == "create"){ ?>
                <!-- <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                <input type="text" name="pphistory" placeholder="pphistory"/>
                <input type="text" name="updated"  placeholder="updated"/>
                <input type="text" name="method"  placeholder="method"/>
                <button type="submit" >Create</button> -->
            <?php }elseif($_POST['action'] == "edit"){ ?>
                <!-- <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                <input type="text" name="pphistory" placeholder="pphistory" value= <?php echo $_POST['pphistory'] ?> />
                <input type="text" name="updated"  placeholder="updated" value= <?php echo $_POST['updated'] ?> />
                <input type="text" name="method"  placeholder="method" value= <?php echo $_POST['method'] ?> />
                <button type="submit" >Edit</button> -->
            <?php } ?>
        <?php } ?>
    <!-- </form> -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>sbcid</th>
                <th>updated</th>
                <th>method</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$history){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $history['sbcid'] ?></td>
                <td><?php echo $history['updated'] ?></td>
                <td><?php echo $history['method'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./users.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="sbcid" value= <?php echo $history['sbcid']?> >
                            <input type="hidden" name="updated" value= <?php echo $history['updated']?> >
                            <input type="hidden" name="method" value= <?php echo $history['method']?> >
                            <input type="hidden" name="id" value= <?php echo $history['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/pphistoryAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $history['id']?>>
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