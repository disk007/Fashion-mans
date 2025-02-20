<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
if (isset($_GET['id'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <style type="text/css">
            .select_size {
                width: 72px;
                border-radius: 5px;
                border: solid silver 1px;
                padding: 2px;
                cursor: pointer;
                text-align: center;
            }

            .select_amount {
                width: 72px;
                border-radius: 5px;
                border: solid silver 1px;
                padding: 2px;
                cursor: pointer;
                text-align: center;
            }
        </style>
        <?php
        include('head.php');
        ?>
        <link rel="stylesheet" type="text/css" href="../css/page_product.css">
        <link rel="stylesheet" href="../css/style_index.css">

        <title></title>
    </head>

    <body>
        <header>
            <?php
            include('../php/connect.php');
            include('../page_php/navbar.php');
            $id = $_GET['id'];

            $sql = "SELECT * FROM product WHERE id ='$id' ";
            $result = mysqli_query($link, $sql);
            $value = mysqli_Fetch_array($result);
            $id_order = $value['id_code'];
            ?>
        </header>
        <form action="../php/update_cart.php?act=<?php echo "add"; ?>" method="post">
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <?php echo "<div class=col-md-6><img class=card-img-top mb-5 mb-md-0 src=../admin/image/product/$value[Picture] width=600 height=690 /></div>"; ?>
                        <div class="col-md-6">
                            <h1 class="display-5 fw-bolder"><?php echo $value['Name']; ?></h1>
                            <div class="fs-5 mb-3">
                                <span>ราคา <?php echo number_format($value["Price"]); ?> บาท</span>
                            </div>
                            <p class="lead"><b>รายละเอียด :</b><br> <?php echo $value['Detail']; ?></p>
                            <div class="d-flex">
                                <select class="select_size" id="select_size" name="select_size">
                                    <option value="" selected disabled> Size </option>
                                    <?php if ($value['Amount_S'] > 0) { ?>
                                        <option value="S">S</option>
                                    <?php }
                                    if ($value['Amount_M'] > 0) { ?>
                                        <option value="M">M</option>
                                    <?php }
                                    if ($value['Amount_L'] > 0) { ?>
                                        <option value="L">L</option>
                                    <?php }
                                    if ($value['Amount_XL'] > 0) { ?>
                                        <option value="XL">XL</option>
                                    <?php } ?>
                                </select>&nbsp;&nbsp;

                                <select id="Amount" class="select_amount" name="select_amount">
                                    <option value="" selected disabled>จำนวน</option>
                                </select>&nbsp;&nbsp;
                                <input type="type" name="id" value="<?php echo $value["id"]; ?>" hidden>
                                <input type="type" name="Name" value="<?php echo $value["Name"]; ?>" hidden>
                                <input type="type" name="Price" value="<?php echo $value["Price"]; ?>" hidden>
                                <input type="type" id="Id_code" name="Id_code" value="<?php echo $value["id_code"]; ?>" hidden>
                                <input type="type" name="Picture" value="<?php echo $value["Picture"]; ?>" hidden>
                                <?php if(empty($_SESSION['Username'])){?>
                                        <a href="form_login.php" class="btn btn-primary">เพิ่มใส่ตะกร้า</a> 
                                <?php 
                                    }                              
                                      else{    
                                ?>
                                <button class="btn btn-primary">
                                    <i class="fas fa-shopping-cart"></i>
                                    เพิ่มใส่ตะกร้า
                                </button>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

        <?php
            $sql = "SELECT * FROM deimage WHERE id_product ='$id_order' ";
            $result = mysqli_query($link, $sql);
            while($data = mysqli_Fetch_array($result)){
            ?>
                <a href="#" class="pop">
                <img src=../admin/image/detail_image/<?php echo $data['Name'];  ?> width="60">
                </a>
            <?php
            }
            ?>

            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">              
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                  </div>
                </div>
              </div>
            </div>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">สินค้าแนะนำ</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_array($result)){
                    
                    ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <?php echo "<img class=card-img-top src=../admin/image/product/$row[Picture] width=450 height=300 />"; ?>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $row['Name']; ?></h5>
                                        <!-- Product price-->
                                        <?php echo $row['Price']; ?> บาท
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center d-grid gap-2"><a class="btn btn-primary mt-auto" href="page_product.php?id=<?php echo $row["id"]; ?>">ดูรายละเอียด</a></div>
                                </div>
                            </div>
                        </div>
                    <?php
                        if ($i==4) {
                            break;
                        }
                        $i++;
                     } ?>

                </div>
            </div>
            <center>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="ezCHspFt"></script>
            <div class="fb-comments" data-href="https://63301282003.utc.ac.th/" data-width="1000" data-numposts="5"></div>
            </center>
        </section>
        <?php
        include("footer.php");
        ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
        <!-- Optional JavaScript; choose one of the two! -->

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
        <script type="text/javascript">
            $(function() {
                $('.pop').on('click', function() {
                    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                    $('#imagemodal').modal('show');   
                });     
            });
        </script>
    </body>

    </html>
<?php
    include("../php/ajax_product.php");
} else {
    header("location:index.php");
}
?>