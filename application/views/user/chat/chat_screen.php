<body>
<h1>Debating with <?php echo $username?></h1>
<div id=chatScreen ></div>
<script type=text/JavaScript>
    document.getElementById('chatScreen').innerHTML='<object type=text/html data=<?php echo base_url('chat_ajax')?> ></object>'
</script>