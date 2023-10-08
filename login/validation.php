<?php
    session_start();

    include '../config.php';

    $username = $_POST['username'];
    $password = ($_POST['password']);

    $data = mysqli_query($connect, "SELECT * FROM t_admin WHERE username='$username' AND password='$password'");

    $check = mysqli_num_rows($data);

    if ($check > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: ../primary.php");
    } else {
        echo "<script>
                alert('Wrong Username and Password!')
            </script>";
    }
?>