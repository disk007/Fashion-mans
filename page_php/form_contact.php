<?php
include('../php/connect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include('head.php');
    ?>

    <style>
        .form-control {
            border: none;
            height: 50px;
            background: #f3f3f3;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        textarea.form-control {
            height: auto;
        }

        .btn.btn-primary {
            background: #000;
            color: #fff;
            padding: 15px 20px;
        }

        .btn {
            border: none;
            border-radius: 4px !important;
        }

        .btn.btn-primary {
            background: #000;
            color: #fff;
            padding: 15px 20px;
        }

        .btn:hover {
            color: #212529;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .form-control {
            border: none !important;
            
            background: #f3f3f3 !important;
        }
    </style>
    <title>Fashion-Men-Shop</title>
</head>

<body>
    <header>
        <?php
        include('navbar.php');
        ?>
        <!-- เนื้อหา -->
        <div class="container px-auto py-5">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h3 class="heading mb-1 fs-2 fw-bold">ติดต่อเราได้ทุกเรื่อง!</h3>
                            <q class="text-danger fs-3">ยกเว้น ยืมเงิน !!</q>

                            <p><img src="../img/contact/undraw-contact.svg" class="img-fluid" alt=""></p>
                        </div>
                        <div class="col-md-6">
                            <!-- form contact -->
                            <h4 style="color:#e74c3c">กรุณาแจ้งปัญหาของท่าน</h4>
                            <form action="../php/process_contact.php" class="mb-2" method="POST" id="contactForm" name="contactForm">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <input id="name" name="name" type="text" placeholder="กรุณากรอกชื่อ" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">

                                        <input type="email" class="form-control" name="email" id="email" placeholder="อีเมล"  required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="title" id="subject" placeholder="หัวข้อ" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="msg" id="msg" cols="30" rows="7" placeholder="รายละเอียด" required=""></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input id="click" type="submit" name="btn_contact" class="btn btn-primary rounded-3 py-2 px-4"">
                                        
                                    </div>
                                </div>
                            </form>
                            <!-- colse from contact -->
                            <?php if (isset($_SESSION['success'])) { ?>
                                     <div class=" alert alert-success">
                                        <?php
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                        ?>
                                    </div>
                                <?php } ?>

                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ส่วนล่าง -->

        <?php
        include('footer.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>