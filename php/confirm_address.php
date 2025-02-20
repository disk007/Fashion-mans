<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.btn_del').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('s'));
        Swal.fire({
            title: 'ลบที่อยู่?',
            text: "คุณต้องการลบทีอยู่นี้ใช่ไหม",
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