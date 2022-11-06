<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM detections";
    $result    = $conn->query($sql);
?>
    <h2>Detections</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./detections.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/detectionAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="sbxid" placeholder="sbxid"/>
                    <input type="text" name="badip"  placeholder="badip"/>
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="sbxid" placeholder="sbxid" value= <?php echo $_POST['sbxid'] ?> />
                    <input type="text" name="badip"  placeholder="badip" value= <?php echo $_POST['badip'] ?> />
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>sbxid</th>
                <th>badip</th>
                <th>added</th>
                <th>lasthit</th>
                <th>hitcount</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$data){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $data['sbxid']?></td>
                <td><?php echo $data['badip']?></td>
                <td><?php echo $data['added'] ?></td>
                <td><?php echo $data['lasthit'] ?></td>
                <td><?php echo $data['hitcount'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./detections.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="id" value= <?php echo $data['id']?>>
                            <input type="hidden" name="sbxid" value= <?php echo $data['sbxid']?> >
                            <input type="hidden" name="badip" value= <?php echo $data['badip']?> >
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/detectionAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $data['id']?>>
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