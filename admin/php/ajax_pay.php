<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#Status').click(function() {
    var Status = $(this).val();
    var id_order = $('#id_order').val();
    console.log(id_order);

      $.ajax({
      type: "POST",
      url: "../php/process_pay.php",
      data: {Status:Status,id:id_order,function:'Status'},
      success: function(data){
          $('#Status').html(data);
          location.reload(true);
      }
    });
  });
</script>