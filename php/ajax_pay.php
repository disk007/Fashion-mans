<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#select_id').change(function() {
    var id = $(this).val();

      $.ajax({
      type: "POST",
      url: "../php/process_pay.php",
      data: {id:id,function:'select_id'},
      success: function(data){
          $('#pay_money').html(data);
      }
    });
  });
</script>