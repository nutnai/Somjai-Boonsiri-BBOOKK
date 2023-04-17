<?php
    $borrowing_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";

    $sql = "select * from borrowing where borrowing_id = $borrowing_id";
    $connect = mysqli_connect($servername, $username, $password, $dbname);
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $borrowing_id = $row["borrowing_id"];
    $borrowing_rent_date = $row["borrowing_rent_date"];
    $borrowing_due_date = $row["borrowing_due_date"];
    $borrowing_return_date = $row["borrowing_return_date"];
    $borrowing_phone = $row["borrowing_phone"];
    $borrowing_email = $row["borrowing_email"];
?>