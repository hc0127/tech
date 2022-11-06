<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM sbcserver";
    $result    = $conn->query($sql);
?>
    <h2>SBCServer</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./sbcserver.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/sbcserverAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="sbcid" placeholder="sbcid"/>
                    <input type="text" name="ip"  placeholder="ip"/>
                    <input type="text" name="connect"  placeholder="connect"/>
                    <input type="text" name="method"  placeholder="method"/>
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="sbcid" placeholder="sbcid" value= <?php echo $_POST['sbcid'] ?> />
                    <input type="text" name="ip" placeholder="ip" value= <?php echo $_POST['ip'] ?> />
                    <input type="text" name="connect" placeholder="connect" value= <?php echo $_POST['connect'] ?> />
                    <input type="text" name="method"  placeholder="method" value= <?php echo $_POST['method'] ?> />
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>sbcid</th>
                <th>ip</th>
                <th>connect</th>
                <th>owner</th>
                <th>enabled</th>
                <th>updates</th>
                <th>method</th>
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
                <td><?php echo $data['sbcid']?></td>
                <td><?php echo $data['ip'] ?></td>
                <td><?php echo $data['connect'] ?></td>
                <td><?php echo $data['owner'] ?></td>
                <td><?php echo $data['enabled'] ?></td>
                <td><?php echo $data['updates'] ?></td>
                <td><?php echo $data['method'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./sbcserver.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="sbcid" value= <?php echo $data['sbcid']?> >
                            <input type="hidden" name="ip" value= <?php echo $data['ip']?> >
                            <input type="hidden" name="connect" value= <?php echo $data['connect']?>>
                            <input type="hidden" name="method" value= <?php echo $data['method']?>>
                            <input type="hidden" name="id" value= <?php echo $data['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/sbcserverAction.php" method="post">
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