<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM whitelist";
    $result    = $conn->query($sql);
?>
    <h2>WhiteList</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./whitelist.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/whiteAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="ip"  placeholder="ip">
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="ip" value= <?php echo $_POST['ip']?>  placeholder="ip">
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ip</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$white){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $white['ip']?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./whitelist.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="ip" value= <?php echo $white['ip']?> >
                            <input type="hidden" name="id" value= <?php echo $white['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/whiteAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $white['id']?>>
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