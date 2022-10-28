<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <label for="city">City</label>
        <input type="text" name="city" id="city">
        <label for="blood">Blood Group</label>
        <input type="text" name="blood" id="blood">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            $city = $_POST['city'];
            $blood = $_POST['blood'];
            $first = substr($name, 0, 1);
            if($first == 'A' || $first == 'B' || $first == 'O' || $first == 'a' || $first == 'b' || $first == 'o'){
                echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Blood Group</th>
                </tr>
                <tr>
                    <td>$name</td>
                    <td>$age</td>
                    <td>$city</td>
                    <td>$blood</td>
                </tr>
                </table>";
            }else{
                for($i = 0; $i < strlen($name); $i++){
                    echo $name[$i]."<br>";
                }
            }
        }
    ?>
</body>
</html>