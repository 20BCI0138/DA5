<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FreshMart</title>
</head>
<body>
    <h1>FreshMart</h1>
    <form action="index.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="price">Price</label>
        <input type="number" name="price" id="price">
        <br>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option value="vegetable">Vegetable</option>
            <option value="fruit">Fruit</option>
        </select>
        <br>
        <label for="produced">Produced by</label>
        <select name="produced" id="produced">
            <option value="organic">Organic</option>
            <option value="inorganic">Inorganic</option>
        </select>
        <br>
        <input type="submit" name="add" value="Add">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="update" value="Update">
    </form>
    <br>
    <form action="index.php" method="post">
        <label for="search">Search</label>
        <input type="text" name="search" id="search">
        <br>
        <input type="submit" name="search" value="Search">
    </form>
    <br>
    <form action="index.php" method="post">
        <label for="sort">Sort by</label>
        <select name="sort" id="sort">
            <option value="name">Name</option>
            <option value="price">Price</option>
            <option value="type">Type</option>
            <option value="produced">Produced by</option>
        </select>
        <br>
        <input type="submit" name="sort" value="Sort">
    </form>
    <br>
    <form action="index.php" method="post">
        <label for="filter">Filter by</label>
        <select name="filter" id="filter">
            <option value="name">Name</option>
            <option value="price">Price</option>
            <option value="type">Type</option>
            <option value="produced">Produced by</option>
        </select>
        <br>
        <input type="submit" name="filter" value="Filter">
    </form>
    <br>
    <form action="index.php" method="post">
        <label for="filter">Filter by</label>
        <select name="filter" id="filter">
            <option value="name">Name</option>
            <option value="price">Price</option>
            <option value="type">Type</option>
            <option value="produced">Produced by</option>
        </select>
        <br>
        <label for="min">Min</label>
        <input type="number" name="min" id="min">
        <br>
        <label for="max">Max</label>
        <input type="number" name="max" id="max">
        <br>
        <input type="submit" name="filter" value="Filter">
    </form>
    <br>
    <?php
        $servername = "localhost";
        $username = "shaunak";
        $password = "mysqlPassword";
        $dbname = "IWP";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }
        $sql = "CREATE TABLE IF NOT EXISTS freshmart(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            price INT(6) NOT NULL,
            type VARCHAR(30) NOT NULL,
            produced VARCHAR(30) NOT NULL
        )";
        if(isset($_POST["add"])){
            $name = $_POST["name"];
            $price = $_POST["price"];
            $type = $_POST["type"];
            $produced = $_POST["produced"];
            $sql = "INSERT INTO freshmart VALUES ('$name', '$price', '$type', '$produced')";
            if($conn->query($sql) === TRUE){
                echo "New record created successfully";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
        if(isset($_POST["delete"])){
            $name = $_POST["name"];
            $sql = "DELETE FROM freshmart WHERE name='$name'";
            if($conn->query($sql) === TRUE){
                echo "Record deleted successfully";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
        if(isset($_POST["update"])){
            $name = $_POST["name"];
            $price = $_POST["price"];
            $type = $_POST["type"];
            $produced = $_POST["produced"];
            $sql = "UPDATE freshmart SET price='$price', type='$type', produced='$produced' WHERE name='$name'";
            if($conn->query($sql) === TRUE){
                echo "Record updated successfully";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
        if(isset($_POST["search"])){
            $search = $_POST["search"];
            $sql = "SELECT * FROM freshmart WHERE name LIKE '%$search%'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "Name: ".$row["name"]."<br>Price: ".$row["price"]."<br>Type: ".$row["type"]."<br>Produced by: ".$row["produced"]."<br><br>";
                }
            } else {
                echo "No results found";
            }
        }
    ?>
</body>
</html>