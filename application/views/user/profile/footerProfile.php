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


    var partText = 40;
    
    $('card-text').css('max-height', partText);
    
    $('.show-hide').click(function() 
    {
      var idText = $(this).attr("name");
      // var textHeight = $('.newsContent').height();
      var textHeight = $('#paragraph' + idText).height();

      console.log("Id:" + idText);
      console.log("textHeight:" + textHeight);
      if( $('#' + idText).height() == partText ) 
      {
        $('#' + idText).animate({ "max-height": textHeight }, textHeight * 3);
        $(this).text('Show Less');
      } 
      else 
      {
        // $('#' + idText).css('max-height', partText);
        $('#' + idText).animate({ "max-height": partText }, textHeight * 3);
        $(this).text('Show More');
      }
    });
  </script>
</body>
</html>
