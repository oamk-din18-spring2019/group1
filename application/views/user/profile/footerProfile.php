  <script type="text/javascript" src="<?php echo base_url('bst/js/jquery-3.3.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/popper.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/mdb.js')?>"></script>
  <script type="text/javascript">
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.navbar-nav a[href="'+ url +'"]').parent().addClass('active');
    // Will also work for relative and absolute hrefs
    $('ul.navbar-nav a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');
  </script>
</body>
</html>
