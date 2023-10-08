<?php
    include 'config.php';

    if(isset($_POST['add_data'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $insert_query = mysqli_query($connect, "INSERT INTO t_book (name, price) VALUES ('$name', '$price')") or die ('query failed');
        header("Location: table.php");
    }

    if(isset($_GET['delete_data'])) {
        $delete_id_book = $_GET['delete_data'];
        $delete_query = mysqli_query($connect, "DELETE FROM t_book WHERE id_book = '$delete_id_book'") or die ('query failed');
        header('Location: table.php');
    }

    if(isset($_POST['update_data'])) {
        $id_book = $_POST['id_book'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $update_query = mysqli_query($connect, "UPDATE t_book SET name='$name', price='$price' WHERE id_book = '$id_book'");
        header('Location: table.php');
    }
?>