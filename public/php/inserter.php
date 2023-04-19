<?php
    $borrower_id = 6434484923; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $book_name = $_POST['book_name'];
    $book_chapter = $_POST['book_chapter'];
    $book_isbn = $_POST['book_isbn'];
    $book_npage = $_POST['book_npage'];
    $book_year = $_POST['book_year'];
    $book_price = $_POST['book_price'];
    $book_edition = $_POST['book_edition'];
    $book_language = $_POST['book_language'];
    $book_summary = $_POST['book_summary'];
    $author_fname = $_POST['author_fname'];
    $author_lname = $_POST['author_lname'];
    $interpreter_fname = $_POST['interpreter_fname'];
    $interpreter_lname = $_POST['interpreter_lname'];

    $sql = "INSERT INTO book (book_id, book_name, book_chapter, publisher_id, book_isbn, book_number_of_pages, book_year, book_price, book_edition, book_language, book_summary, book_status) 
    VALUES (10, $book_name, $book_chapter, 20, $book_isbn, $book_npage, $book_date, $book_price, $book_edition, $book_language, $book_summary, 'valid')";
    // mysqli_query($connect, $sql);   


    // $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($connect, $sql)) {
        echo "User inserted successfully";
    } else {
        echo "Error inserting user: " . mysqli_error($connect);
    }
    
    // Close connection
    mysqli_close($connect);
?>