<?php
$host="sql.freedb.tech ";
$username="freedb_bbookk";
$password="mn#4V9j&27*B4h9 ";
$dbname="test";

$db=mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno())
    echo "can't connect".mysqli_connect_error();
else
    echo "connected!";

$query="select * from test";
$result=mysqli_query($db,$query);
foreach ($result as $row) {
    print_r($row);
}
?>