<table>
<tr>
<td id="index-menu">
    <h1>Group</h1>
    <form action="setGroup.php" method="POST">
        <div>
            <select name="input-group">
                <option value="T2">T2</option>
                <option value="PCT">PCT</option>
            </select>
        </div>
        <div>
            <button type="submit" name="changeGroup">Change</button>
        </div>
    </form>

    <h1>Upload Image</h1>
    <form action="postimg.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea 
                id="text" 
                cols="40" 
                rows="4" 
                name="image_text" 
                placeholder="Say something about this image...">
            </textarea>
        </div>
        <div>
            <button type="submit" name="upload">POST</button>
        </div>
    </form>

    <h1>Create group</h1>
    <form action="creategroup.php" method="POST">
        <table>
            <tr>
                <td>Group name: </td>
                <td><input type="text" name="groupname" required></td>
            </tr>
            <td>
                <td><input type="submit" value="Submit" name='cg-submit'></td>
            </tr>
        </table>
    </form>
</td>
<td id="pictures">
    <h1><?php echo $_SESSION['group']; ?></h1>
    <div>
        <?php
        $db = mysqli_connect("localhost", "root", "", "photos");
        $group = $_SESSION['group'];
        $SELECT = "SELECT * FROM phototable WHERE groupName = '$group'";
        $result = mysqli_query($db, $SELECT);

        while ($row = mysqli_fetch_array($result)) {
            echo "<div id='picture-div'>";
                echo "<img id='image' src='phototable/".$row['image']."' >";
                echo "<p>".$row['uid'].": ".$row['text']."</p>";
            echo "</div>";
        }
        ?>
    </div>
</td>
</tr>
</table>