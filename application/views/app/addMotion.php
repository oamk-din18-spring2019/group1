<script>
    if ( <?php echo json_encode($added) ?> == true){
        alert('added');
    }
</script>

<form action="<?php echo site_url('app/addMotion'); ?>" method=POST>
    <label for="content">Content</label>
    <input type="text" placeholder='Content' name=content required><br>
    <label for="category">Category</label>
    <select name="category" required>
        <option value="culture">Culture</option>
        <option value="science">Science</option>
        <option value="technology">Technology</option>
        <option value="fashion">Fashion</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="politics">Politics</option>
        <option value="art">Art</option>
        <option value="culinary">Culinary</option>
        <option value="education">Education</option>
        <option value="history">History</option>
    </select>
    <input type="submit">
</form>