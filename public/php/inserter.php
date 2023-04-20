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
    $cerror = 0;
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

    $book_id = md5($book_name . time());

    $sql_book = "INSERT INTO book (book_id, book_name, book_chapter, publisher_id, book_isbn, book_number_of_pages, book_year, book_price, book_edition, book_language, book_summary, book_status) 
    VALUES ('$book_id','$book_name', '$book_chapter', 20, '$book_isbn', '$book_npage', '$book_year', '$book_price', '$book_edition', '$book_language', '$book_summary', 'valid')";

    $cerror = 0;

    if (!(mysqli_query($connect, $sql_book))) {
        $cerror++;
        echo "Error inserting book : " . mysqli_error($connect);
    }
    $author_id = md5($author_fname . time());

    // Insert into author table
    $sql_author = "INSERT INTO author (author_id, author_firstname, author_lastname) 
    VALUES ('$author_id','$author_fname', '$author_lname')";

    if (!(mysqli_query($connect, $sql_author))) {
        $cerror++;
        echo "Error inserting author : " . mysqli_error($connect);
    }
    $interpreter_id = md5($interpreter_fname . time());
    // Insert into interpreter table
    
    $sql_book_translated = "INSERT INTO book_translated (book_id, interpreter_id) 
    VALUES ('$book_id','$interpreter_id')";

    if (!(mysqli_query($connect, $sql_book_translated))) {
        $cerror++;
        echo "Error inserting translated : " . mysqli_error($connect);
    } 
    $sql_book_written = "INSERT INTO book_written (book_id, author_id) 
    VALUES ('$book_id','$author_id')";

    if (!(mysqli_query($connect, $sql_book_written))) {
        $cerror++;
        echo "Error inserting translated : " . mysqli_error($connect);
    } 

    if($cerror==0){
        echo "Insert successful";
    }

    mysqli_close($connect);
?>