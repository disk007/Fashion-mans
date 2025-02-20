<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
                $Fullname=$_POST['name'];
                $Username=$_POST['username'];
                $Email=$_POST['email'];
                $Age=$_POST['age'];
                $Phone=$_POST['phone'];
                $password=$_POST['password'];
                $date=date("Y-m-d");

                $link = mysqli_connect("localhost", "root");
                mysqli_set_charset($link,'utf8');
                mysqli_query($link,"Use project;");   // เรียกใช้ฐานข้อมูล

                $sql = "SELECT * FROM members WHERE Username = '$Username' ";
                $result = mysqli_query($link,$sql);

                if (mysqli_num_rows($result)>0) {
                        echo "<script>
                        $(document).ready(function() {
                                Swal.fire({
                                        title: 'ชื่อซ้ำ !',
                                        text: 'กรุณาลองใหม่อีกครั้ง!',
                                        icon: 'error',
                                        timer: 5000,
                                        showConfirmButton: false
                                });
                        })
                </script>";
                header("refresh:2; url=../page_php/form_register.php");
                }
                else{
                        $pwd = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO members(Full_name,Username,Email,Age,Phone,Password,Created_at) VALUES('$Fullname','$Username','$Email','$Age','$Phone','$pwd','$date');";

                        $result = mysqli_query($link,$sql);
                        if($result){
                                echo "<script>
                                $(document).ready(function() {
                                        Swal.fire({
                                                title: 'ยินดีต้อนรับ!',
                                                text: 'สมัครสมาชิกสำเร็จ!',
                                                icon: 'success',
                                                timer: 5000,
                                                showConfirmButton: false
                                        });
                                })
                                </script>";
                          header("refresh:2; url=../page_php/index.php");
                        }
                        else{
                                echo "<script>
                                $(document).ready(function() {
                                        Swal.fire({
                                                title: 'ผิดพลาด!',
                                                text: 'กรุณาลองใหม่อีกครั้ง!',
                                                icon: 'error',
                                                timer: 5000,
                                                showConfirmButton: false
                                        });
                                })
                        </script>";
                        }
                        header("refresh:2; url=../page_php/form_register.php");
                        
                }
?>
