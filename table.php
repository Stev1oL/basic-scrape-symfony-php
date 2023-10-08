<?php
    include "config.php";

    $dsn = "mysql:host=$server;dbname=$db_name";
    $pdo = new PDO($dsn, $username, $password);

    $path = 'books.csv';
    $handle = fopen($path, 'r');
    $header = fgetcsv($handle);

    while (($row = fgetcsv($handle)) !== false) {
        $sql = "INSERT INTO t_book (name, price) VALUES (?, ?)";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $row[0]);
        $result->bindValue(2, $row[1]);
        $result->execute();
    }

    fclose($handle);
?>

<?php include "crud.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>

    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <center>
            <h2>Table Data Scrape</h2><br>
        </center>
        <a href="insert.php" class="btn btn-info" role="button">Insert Data</a>
        <a href="primary.php" class="btn btn-primary" role="button">Back</a><br><br>

        <div>
        <?php  ?>
            <form action="" method="post">
                <input type="text" name="valueToSearch" placeholder="Search...">
                <input type="submit" class="btn btn-secondary" name="search" value="Search">
                <a href="table.php" class="btn btn-dark" role="button">Cancel</a>
            </form>
        </div><br>

    <?php
        $limit = 150;

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $initial_page = ($page_number > 1) ? ($page_number * $limit) - $limit : 0;	

        $previous = $page_number - 1;
        $next = $page_number + 1;

        $getQuery = "SELECT * FROM t_book"; 
        $result = mysqli_query($connect, $getQuery);  
        $total_rows = mysqli_num_rows($result);
        $total_pages = ceil ($total_rows / $limit);

        $getQuery = "SELECT * FROM t_book LIMIT " . $initial_page . ',' . $limit;
        $number = 1;
        $result = mysqli_query($connect, $getQuery);
        $row = mysqli_fetch_array($result);

        include "search.php";
        if(mysqli_num_rows($result) > 0) {
    ?>
        <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
        
            foreach ($result as $row) {
    ?>
            <tr>
                <td><?php echo $number++; ?></td>
                <td><?php echo $row['id_book']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="update.php?update=<?php echo $row['id_book']; ?>" class="btn btn-primary" role="button">Update</a>
                    <a href="table.php?delete_data=<?php echo $row['id_book']; ?>" class="btn btn-danger" role="button" onclick="return confirm('are you sure you want to delete this?');">Delete</a>
                </td>
            </tr>
    <?php
            }
        } else {
            echo "<center><h2>no data added</h2></center>";
        }
    ?>
        </tbody>
        </table>

        <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($page_number > 1){ echo "href='?page=$previous'"; } ?>>Previous</a>
				</li>
			<?php 
				for($x = 1; $x <= $total_pages; $x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
			?>				
				<li class="page-item">
					<a  class="page-link" <?php if($page_number < $total_pages) { echo "href='?page=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>

    </div>
</body>
</html>