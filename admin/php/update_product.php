<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if(isset($_POST['edit'])){
    $id = $_POST['id'];
    include ("connect.php");
    $Name = $_POST['Name'];
    $id_code = $_POST['id_code'];
    $Amount_S = $_POST['Amount_S'];
    $Amount_M = $_POST['Amount_M'];
    $Amount_L = $_POST['Amount_L'];
    $Amount_XL = $_POST['Amount_XL'];
    $Price = $_POST['Price'];
    $Type = $_POST['Type'];
    $Detail = $_POST['Detail'];
    date_default_timezone_set("Asia/Bangkok");
    $date=date("Y-m-d H:i:s");
    $new = "";
    foreach ($_FILES['upload']['tmp_name'] as $key => $value) {
            $file_name = $_FILES['upload']['name'];
            $new = $file_name[$key];
    }

    if($new !=""){
        $sql="DELETE FROM deimage WHERE id_product ='$id_code'";
        $result=mysqli_query($link,$sql);

        foreach ($_FILES['upload']['tmp_name'] as $key => $value) {
            $file_names = $_FILES['upload']['name'];
            $new_name = $file_names[$key];
            if(move_uploaded_file($_FILES['upload']['tmp_name'][$key],"../image/detail_image/".$new_name)){
                $sql = "INSERT INTO deimage(Name,id_product,Created_at) 
                VALUES('$new_name','$id_code','$date');";
                $result = mysqli_query($link,$sql);
            }
        }
    }

    if($_FILES["Picture"]["name"]){
        $dir = "../image/product/";
        $fileImage = $dir . $_FILES["Picture"]["name"];
        $Picture = $_FILES["Picture"]["name"];
        if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $fileImage)) {
            null;
        }
        else{
            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์ของคุณ";
        }
        $sql="UPDATE product SET Name='$Name',Price='$Price',Type='$Type',Detail='$Detail',Picture='$Picture',Amount_S='$Amount_S',Amount_M='$Amount_M',Amount_L='$Amount_L',Amount_XL='$Amount_XL',Created_at='$date' WHERE id=$id;";
        $result=mysqli_query($link,$sql);
        if($result){
                echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'สำเร็จ!',
                                    text: 'อัตเดตสินค้าสำเร็จ',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            })
                        </script>";
                    header("refresh:2; url=../page_php/product.php");
        }
        else{
                echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'ล้มเหลว',
                                    text: 'ไม่สำเร็จ',
                                    icon: ''error'',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            })
                        </script>";
                    header("refresh:2; url=../page_php/product.php"); 
        }
    }
    else{
        $sql="UPDATE product SET Name='$Name',Price='$Price',Type='$Type',Detail='$Detail',Amount_S='$Amount_S',Amount_M='$Amount_M',Amount_L='$Amount_L',Amount_XL='$Amount_XL',Created_at='$date' WHERE id=$id;";
        $result=mysqli_query($link,$sql);
        if($result){
            echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'สำเร็จ!',
                                    text: 'อัตเดตสินค้าสำเร็จ',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            })
                        </script>";
                header("refresh:2; url=../page_php/product.php");
        }
        else{
                echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'ล้มเหลว',
                                    text: 'ไม่สำเร็จ',
                                    icon: ''error'',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            })
                        </script>";
                    header("refresh:2; url=../page_php/product.php"); 
        }
    }
}
else{
    header("location:../page_php/product.php");
}
?>