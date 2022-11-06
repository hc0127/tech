<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM staticblack";
    $result    = $conn->query($sql);
?>
    <h2>BlackList</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./staticblack.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/blackAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="longstart" placeholder="longstart"/>
                    <input type="text" name="longend"  placeholder="longend"/>
                    <input type="text" name="CIDR"  placeholder="CIDR"/>
                    <input type="text" name="type"  placeholder="type"/>
                    <input type="text" name="info"  placeholder="info"/>
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="longstart"  placeholder="longstart" value =<?php echo $_POST['longstart'] ?> />
                    <input type="text" name="longend"   placeholder="longend" value =<?php echo $_POST['longend'] ?> />
                    <input type="text" name="CIDR"   placeholder="CIDR" value =<?php echo $_POST['CIDR'] ?> />
                    <input type="text" name="type"   placeholder="type" value =<?php echo $_POST['type'] ?> />
                    <input type="text" name="info"   placeholder="info" value =<?php echo $_POST['info'] ?> />
                    <button type="submit" >Edit</button>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>longstart</th>
                <th>longend</th>
                <th>CIDR</th>
                <th>type</th>
                <th>info</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$black){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $black['longstart']?></td>
                <td><?php echo $black['longend'] ?></td>
                <td><?php echo $black['CIDR'] ?></td>
                <td><?php echo $black['type'] ?></td>
                <td><?php echo $black['info'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./staticblack.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="longstart" value= <?php echo $black['longstart']?> >
                            <input type="hidden" name="longend" value= <?php echo $black['longend']?> >
                            <input type="hidden" name="CIDR" value= <?php echo $black['CIDR']?> >
                            <input type="hidden" name="type" value= <?php echo $black['type']?> >
                            <input type="hidden" name="info" value= <?php echo $black['info']?> >
                            <input type="hidden" name="id" value= <?php echo $black['id']?>>
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/blackAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $black['id']?>>
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