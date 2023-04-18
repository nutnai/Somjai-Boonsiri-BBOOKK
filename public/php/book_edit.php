<?php
    $book_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $sql_book = "select * from book where book_id = $book_id";
    $result_book = mysqli_query($connect, $sql_book);
    $row_book = mysqli_fetch_assoc($result_book);

    $book_id = $row_book["book_id"];
    $book_name = $row_book["book_name"];
    $book_chapter = $row_book["book_chapter"];
    $publisher_id = $row_book["publisher_id"];
    $book_isbn = $row_book["book_isbn"];
    $book_number_of_pages = $row_book["book_number_of_pages"];
    $book_edition = $row_book["book_edition"];
    $book_language = $row_book["book_language"];
    $book_status = $row_book["book_status"];
?>