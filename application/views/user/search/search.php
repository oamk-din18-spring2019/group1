<div class="container mt-4">
    <h3>Search page</h3>
    <hr>
    <form action="<?php echo site_url('/user/search')?>" action="GET">
        <div class="form-group">
            <label for="cari">Username</label>
            <input type="text" class="form-control" id="cari" name="cari" placeholder="username" autocomplete="off">
        </div>
        <input class="btn btn-primary" type="submit" value="Search">
    </form>
