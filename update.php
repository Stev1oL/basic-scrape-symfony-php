<?php include "crud.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Update Data</title>
</head>
<body>
    <div class="container">
        <center>
            <h2>Edit Data</h2><br>
        </center>
        <?php
            if(isset($_GET['update'])) {
                $edit_id = $_GET['update'];
                $query = mysqli_query($connect, "SELECT * FROM t_book WHERE id_book = $edit_id");
                if(mysqli_num_rows($query) > 0) {
                    while($data = mysqli_fetch_assoc($query)) {
        ?>
        <form action="" method="post">
            <div class="input-box">
                <label for=""><h4>ID Book</h4></label>
                <input class="form-control" type="text" name="id_book" value="<?php echo $data['id_book']; ?>" readonly>
            </div><br>
            <div class="input-box">
                <label for=""><h4>Book Name</h4></label>
                <input class="form-control" type="text" name="name" value="<?php echo $data['name']; ?>" required>
            </div><br>
            <div class="input-box">
                <label for=""><h4>Book Price</h4></label>
                <input class="form-control" type="text" name="price" value="<?php echo $data['price']; ?>" required>
            </div><br>
            <input type="submit" class="btn btn-primary" value="Update" name="update_data">
            <a href="table.php" class="btn btn-dark" role="button">Back</a>
        </form>
        <?php
                    }
                }
            }
        ?>
    </div>
</body>
</html>