<!DOCTYPE html>
<html lang="en">
<?php
$publisher_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

$sql = "select * from publisher where publisher_id = $publisher_id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$text = $row["publisher_name"];
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?php echo $text; ?></p>
</body>

</html>