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
    $type = $_POST['type'];
    if ($type == "add"){
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
        $sql_interpreter = "INSERT INTO interpreter (interpreter_id, interpreter_firstname, interpreter_lastname) 
        VALUES ('$interpreter_id','$interpreter_fname', '$interpreter_lname')";

        if (!(mysqli_query($connect, $sql_interpreter))) {
            $cerror++;
            echo "Error inserting interpreter : " . mysqli_error($connect);
        } 
        
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
    }
    elseif($type == "profile"){
        $borrower_id = $_POST['borrower_id'];
        $borrower_fname = $_POST['borrower_fname'];
        $borrower_lname = $_POST['borrower_lname'];
        $borrower_address = $_POST['borrower_address'];
        $borrower_birthday = $_POST['borrower_birthday'];
        $borrower_register_date = $_POST['borrower_register_date'];
        $borrower_phone = $_POST['borrower_phone'];
        $borrower_email = $_POST['borrower_email'];
        
        $sql_borrower = "UPDATE borrower SET borrower_firstname = '$borrower_fname',borrower_lastname = '$borrower_lname',borrower_address = '$borrower_address',borrower_birthday='$borrower_birthday',
        borrower_register_date = '$borrower_register_date',borrower_phone='$borrower_phone',borrower_email='$borrower_email' WHERE borrower_id = $borrower_id ";

        if (!(mysqli_query($connect, $sql_borrower))) {
            $cerror++;
            echo "Error updating borrower : " . mysqli_error($connect);
        } 
        if($cerror==0){
            echo "update successful";
        }
    }
    elseif($type == "publisher"){
        $publisher_id = $_POST['publisher_id'];
        $publisher_name = $_POST['publisher_name'];
        $publisher_address = $_POST['publisher_address'];
        $publisher_phone = $_POST['publisher_phone'];
        $publisher_email = $_POST['publisher_email'];
        
        $sql_borrower = "UPDATE publisher SET publisher_name = '$publisher_name',publisher_address = '$publisher_address',publisher_phone = '$publisher_phone',publisher_email='$publisher_email' WHERE publisher_id = $publisher_id ";

        if (!(mysqli_query($connect, $sql_borrower))) {
            $cerror++;
            echo "Error updating publisher : " . mysqli_error($connect);
        } 
        if($cerror==0){
            echo "update successful";
        }
    }
    else if ($type == "editbook"){
        $book_id = $_POST['book_id'];
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


        $sql_book = "UPDATE book SET book_name = '$book_name', book_chapter = '$book_chapter', book_isbn = '$book_isbn', book_number_of_pages =  '$book_npage', book_year = '$book_year', book_price = '$book_price',
         book_edition = '$book_edition', book_language = '$book_language', book_summary = '$book_summary' WHERE book_id = $book_id ";

        if (!(mysqli_query($connect, $sql_book))) {
            $cerror++;
            echo "Error updating book : " . mysqli_error($connect);
        }

        // Insert into author table
        $sql_author = "UPDATE author SET author_id = '$author_id', author_firstname = '$author_fname', author_lastname = '$author_lname' WHERE ";

        if (!(mysqli_query($connect, $sql_author))) {
            $cerror++;
            echo "Error updating author : " . mysqli_error($connect);
        }
        $interpreter_id = md5($interpreter_fname . time());
        // Insert into interpreter table
        $sql_interpreter = "INSERT INTO interpreter (interpreter_id, interpreter_firstname, interpreter_lastname) 
        VALUES ('$interpreter_id','$interpreter_fname', '$interpreter_lname')";

        if (!(mysqli_query($connect, $sql_interpreter))) {
            $cerror++;
            echo "Error updating interpreter : " . mysqli_error($connect);
        } 
        
        $sql_book_translated = "INSERT INTO book_translated (book_id, interpreter_id) 
        VALUES ('$book_id','$interpreter_id')";

        if (!(mysqli_query($connect, $sql_book_translated))) {
            $cerror++;
            echo "Error updating translated : " . mysqli_error($connect);
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
    }

    

    mysqli_close($connect);
