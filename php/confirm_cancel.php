<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.cancel-btn').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('s'));
        Swal.fire({
            title: 'ยกเลิกสินค้า?',
            text: "คุณต้องการยกเลิกสินค้านี้ใช่ไหม",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
              location.href = self.attr('href');
            }
        })

    })

</script>