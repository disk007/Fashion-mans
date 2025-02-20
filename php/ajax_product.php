<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#select_size').change(function() {
    var Size = $(this).val();
    var id_code = $('#Id_code').val();

      $.ajax({
      type: "POST",
      url: "../php/process_product.php",
      data: {id:Size,code:id_code,function:'select_size'},
      success: function(data){
          $('#Amount').html(data);
      }
    });
  });
</script>