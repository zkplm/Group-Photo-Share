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