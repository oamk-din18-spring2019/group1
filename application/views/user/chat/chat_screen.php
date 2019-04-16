
<h1>Debating with <?php echo $username?></h1>

<H1><?php echo $_SESSION['username']; ?></H1>
<h1><?php echo $idChat ?></h1>

<div id=chatScreen width=100%></div>

<script type=text/JavaScript>
    document.getElementById('chatScreen').innerHTML='<object type=text/html data=<?php echo base_url('chat_ajax').'?idChat='.$idChat.'&username='.$_SESSION['username'] ?> ></object>'
    window.onload = () =>{
        if ('<?php echo $idChat ?>'=='c') {
            window.location.reload();
        }
    }
</script>