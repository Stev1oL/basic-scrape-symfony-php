<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "responsi_pemweb_db";

    $connect = mysqli_connect($server, $username, $password, $db_name);

    if(!$connect) {
        die(
            "<script>
                alert('Connection to Database Failed!')
            </script>"
        );
    }
?>