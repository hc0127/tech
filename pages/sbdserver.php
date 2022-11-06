<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM sbdserver";
    $result    = $conn->query($sql);
?>
    <h2>SBDServer</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./sbdserver.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/sbdserverAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="sbdid" placeholder="sbdid"/>
                    <input type="text" name="ip" placeholder="ip"/>
                    <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="sbdid" placeholder="sbdid" value= <?php echo $_POST['sbdid'] ?> />
                    <input type="text" name="ip"  placeholder="ip" value= <?php echo $_POST['ip'] ?> />
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>sbdid</th>
                <th>ip</th>
                <th>owner</th>
                <th>active</th>
                <th>updates</th>
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
                <td><?php echo $data['sbdid']?></td>
                <td><?php echo $data['ip']?></td>
                <td><?php echo $data['owner'] ?></td>
                <td><?php echo $data['active'] ?></td>
                <td><?php echo $data['updates'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./sbdserver.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="sbdid" value= <?php echo $data['sbdid']?> >
                            <input type="hidden" name="ip" value= <?php echo $data['ip']?> >
                            <input type="hidden" name="owner" value= <?php echo $data['owner']?>>
                            <input type="hidden" name="active" value= <?php echo $data['active']?>>
                            <input type="hidden" name="updates" value= <?php echo $data['updates']?>>
                            <input type="hidden" name="id" value= <?php echo $data['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/sbdserverAction.php" method="post">
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