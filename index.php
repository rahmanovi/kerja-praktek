<?php
    session_start();

    if(isset($_POST['login'])){
        include 'koneksi.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        // Validasi form login
        $errors = array();

        if(empty($user)){
            $errors[] = "Username tidak boleh kosong";
        }

        if(empty($pass)){
            $errors[] = "Password tidak boleh kosong";
        }

        if(empty($errors)){
            $cek = mysqli_query($conn, "SELECT * FROM login WHERE username = '$user' AND password = '$pass'");
            $data = mysqli_fetch_array($cek);
            $level = $data['level'];

            if(mysqli_num_rows($cek) > 0){
                $_SESSION['stat_login'] = true;

                if($level == 'admin'){
                    header('location: beranda.php');
                } elseif($level == 'santri baru'){
                    header('location: beranda-santri.php');
                }
            } else {
                $errors[] = "Gagal Login";
            }
        }


        if(!empty($errors)){
            echo '<div style="color: red;">';
            foreach ($errors as $error) {
                echo $error.'<br>';
            }
            echo '</div>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSB</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

    <!-- bagian main login -->
    <section class="main-login">
        
        <div class="box-login">
            <img src="gambar/logo.png" /><br>
            <h2>TPQ Nurul Quran</h2>
            <form action="" method="post">
                
                <div class="box">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="user" class="input-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" name="pass" class="input-control">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="login" value="Login" class="btn-login">
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>

    </section>

</body>
</html>
