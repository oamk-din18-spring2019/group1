<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3>Search page</h3>
            <hr>
            <form action="<?php echo site_url('/user/search')?>" action="GET">
                <div class="form-group">
                    <label for="cari">Username</label>
                    <input type="text" class="form-control" id="cari" name="cari" placeholder="username" autocomplete="off">
                </div>
                <input class="btn btn-primary" type="submit" value="Search">
            </form>
