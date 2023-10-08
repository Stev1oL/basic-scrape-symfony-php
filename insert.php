<?php include "crud.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Insert Data</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Data</h2><br>
        <form action="" method="post">
            <div class="input-box">
                <label for=""><h4>Book Name</h4></label>
                <input class="form-control" type="text" name="name" placeholder="Input Nama Buku" required>
            </div><br>
            <div class="input-box">
                <label for=""><h4>Book Price</h4></label>
                <input class="form-control" type="text" name="price" placeholder="Input Harga Buku" required>
            </div><br>
            <input type="submit" class="btn btn-primary" value="Add" name="add_data">
            <a href="table.php" class="btn btn-dark" role="button">Back</a>
        </form>
    </div>
</body>
</html>