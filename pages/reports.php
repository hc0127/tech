<?php
    require_once('../header.php');
    
    $sql = "SELECT * FROM reports";
    $result    = $conn->query($sql);
?>
    <h2>Reports</h2>
    <?php if($_SESSION['role'] == "admin"){ ?>
        <form action="./reports.php" method="post">
            <?php if(!isset($_POST['action']) || ($_POST['action'] != "create" && $_POST['action'] != "edit")){ ?>
                <input type="hidden" name="action" value="create"/>
                <button type="submit" >Create</button>
            <?php } ?>
        </form>
        <form action="./actions/reportAction.php" method="post">
            <?php if(isset($_POST['action'])){ ?>
                <?php if($_POST['action'] == "create"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="text" name="sbxid" placeholder="sbxid"/>
                    <input type="text" name="remote" placeholder="remote"/>
                    <input type="text" name="badip" placeholder="badip"/>
                    <input type="text" name="type" placeholder="type"/>
                    <input type="text" name="comments"  placeholder="comments"/>
                <button type="submit" >Create</button>
                <?php }elseif($_POST['action'] == "edit"){ ?>
                    <input type="hidden" name="action" value= <?php echo $_POST['action'] ?> />
                    <input type="hidden" name="id" value= <?php echo $_POST['id'] ?> />
                    <input type="text" name="sbxid" placeholder="sbxid" value= <?php echo $_POST['sbxid'] ?> />
                    <input type="text" name="remote" placeholder="remote" value= <?php echo $_POST['remote'] ?> />
                    <input type="text" name="badip" placeholder="badip" value= <?php echo $_POST['badip'] ?> />
                    <input type="text" name="type"  placeholder="type" value= <?php echo $_POST['type'] ?> />
                    <input type="text" name="comments"  placeholder="comments" value= <?php echo $_POST['comments'] ?> />
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
                <th>remote</th>
                <th>type</th>
                <th>badip</th>
                <th>added</th>
                <th>isnew</th>
                <th>comments</th>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <th>Edit/Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $ind=>$report){
            ?>
            <tr>
                <td><?php echo $ind+1 ?></td>
                <td><?php echo $report['sbxid']?></td>
                <td><?php echo $report['remote'] ?></td>
                <td><?php echo $report['type'] ?></td>
                <td><?php echo $report['badip']?></td>
                <td><?php echo $report['added'] ?></td>
                <td><?php echo $report['isnew'] ?></td>
                <td><?php echo $report['comments'] ?></td>
                <?php if($_SESSION['role'] == "admin"){ ?>
                    <td>
                        <form class="inline" action="./reports.php" method="post">
                            <input type="hidden" name="action" value= "edit" >
                            <input type="hidden" name="id" value= <?php echo $report['id']?>>
                            <input type="hidden" name="sbxid" value= <?php echo $report['sbxid']?> >
                            <input type="hidden" name="remote" value= <?php echo $report['remote']?> >
                            <input type="hidden" name="type" value= <?php echo $report['type']?> >
                            <input type="hidden" name="badip" value= <?php echo $report['badip']?> >
                            <input type="hidden" name="isnew" value= <?php echo $report['isnew']?> >
                            <input type="hidden" name="comments" value= <?php echo $report['comments']?> >
                            <button type="submit">EDIT</button>
                        </form>
                        <form class="inline" action="./actions/reportAction.php" method="post">
                            <input type="hidden" name="action" value= "delete">
                            <input type="hidden" name="id" value= <?php echo $report['id']?>>
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