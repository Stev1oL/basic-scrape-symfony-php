<?php
    if(isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM t_book WHERE CONCAT(`id_book`, `name`, `price`) LIKE '%".$valueToSearch."%'";
        $result = filterTable($query);
    } else {
        $query = "SELECT * FROM t_book";
        $result = filterTable($query);
    }

    function filterTable($query) {
        include "config.php";
        $filter_result = mysqli_query($connect, $query);
        return $filter_result;
    }
?>