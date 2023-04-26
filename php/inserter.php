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
if ($type == "add") {
    $book_name = $_POST['book_name'];
    $publisher_name = $_POST['publisher_name'];
    $book_chapter = $_POST['book_chapter'];
    $book_isbn = $_POST['book_isbn'];
    $book_npage = $_POST['book_npage'];
    $book_year = $_POST['book_year'];
    $book_price = $_POST['book_price'];
    $book_edition = $_POST['book_edition'];
    $book_language = $_POST['book_language'];
    $book_summary = $_POST['book_summary'];
    $author_name = $_POST['author_name'];
    $interpreter_name = $_POST['interpreter_name'];

    $book_id = md5($book_name . time());
    $sql_tmp = "select * from publisher where publisher_name = '$publisher_name'";
    $re = mysqli_query($connect, $sql_tmp);
    $publisher = mysqli_fetch_assoc($re);
    $publisher_id = $publisher["publisher_id"];

    $sql_book = "INSERT INTO book (book_id, book_name, book_chapter, publisher_id, book_isbn, book_number_of_pages, book_year, book_price, book_edition, book_language, book_summary, book_status) 
        VALUES ('$book_id','$book_name', '$book_chapter', '$publisher_id', '$book_isbn', '$book_npage', '$book_year', '$book_price', '$book_edition', '$book_language', '$book_summary', 'valid')";

    if (!(mysqli_query($connect, $sql_book))) {
        $cerror++;
        echo "Error inserting book : " . mysqli_error($connect);
        exit;
    }
    foreach ($author_name as $value) {
        if (empty($value)) continue;
        $tmp = explode(" ", $value);
        $author_fname = $tmp[0];
        $author_lname = $tmp[1];
        $sql_tmp = "select * from author where author_firstname = '$author_fname' and author_lastname = '$author_lname'";
        $re = mysqli_query($connect, $sql_tmp);
        print_r($re) . "<br>";
        $author = mysqli_fetch_assoc($re);
        print_r($author) . "<br>";
        $author_id = $author["author_id"];
        echo $author_id . "<br>";
        $sql_author = "INSERT INTO book_written (book_id, author_id) VALUES ('$book_id', '$author_id')";

        if (!(mysqli_query($connect, $sql_author))) {
            $cerror++;
            echo "Error inserting author : " . mysqli_error($connect);
            exit;
        }
    }
    foreach ($interpreter_name as $value) {
        if (empty($value)) continue;
        $value = trim($value);
        $tmp = explode(" ", $value);
        $interpreter_fname = $tmp[0];
        $interpreter_lname = $tmp[1];
        $sql_tmp = "select * from interpreter where interpreter_firstname = '$interpreter_fname' and interpreter_lastname = '$interpreter_lname'";
        $re = mysqli_query($connect, $sql_tmp);
        $interpreter = mysqli_fetch_assoc($re);
        $interpreter_id = $interpreter["interpreter_id"];
        $sql_interpreter = "INSERT INTO book_translated (book_id, interpreter_id) 
        VALUES ('$book_id', '$interpreter_id')";

        if (!(mysqli_query($connect, $sql_interpreter))) {
            $cerror++;
            echo "Error inserting interpreter : " . mysqli_error($connect);
            exit;
        }
    }
    if ($cerror == 0) {
        echo "Insert successful";
    }
} elseif ($type == "profile") {
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
    if ($cerror == 0) {
        echo "update successful";
    }
} elseif ($type == "publisher") {
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
    if ($cerror == 0) {
        echo "update successful";
    }
} else if ($type == "editbook") {
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

    if ($cerror == 0) {
        echo "Insert successful";
    }
} else if ($type == "add_author") {
    $author_firstname = $_POST["author_firstname"];
    $author_lastname = $_POST["author_lastname"];
    $sql = "select * from author where author_firstname = $author_firstname and author_lastname = $author_lastname";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        $id = md5($author_firstname . $author_lastname . time());
        $sql = "INSERT INTO author (author_id, author_firstname, author_lastname) VALUES ('$id','$author_firstname', '$author_lastname')";
        if (!(mysqli_query($connect, $sql))) {
            $cerror++;
            echo "Error inserting translated : " . mysqli_error($connect);
        } else {
            echo "Insert successful";
        }
    } else {
        echo "that author is exist!";
    }
} else if ($type == "add_interpreter") {
    $interpreter_firstname = $_POST["interpreter_firstname"];
    $interpreter_lastname = $_POST["interpreter_lastname"];
    $sql = "select * from interpreter where interpreter_firstname = $interpreter_firstname and interpreter_lastname = $interpreter_lastname";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        $id = md5($interpreter_firstname . $interpreter_lastname . time());
        $sql = "INSERT INTO interpreter (interpreter_id, interpreter_firstname, interpreter_lastname) VALUES ('$id','$interpreter_firstname', '$interpreter_lastname')";
        if (!(mysqli_query($connect, $sql))) {
            $cerror++;
            echo "Error inserting translated : " . mysqli_error($connect);
        } else {
            echo "Insert successful";
        }
    } else {
        echo "that interpreter is exist!";
    }
} else if ($type == "add_publisher") {
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publisher_phone = $_POST["publisher_phone"];
    $publisher_email = $_POST["publisher_email"];
    $sql = "select * from publisher where publisher_name = $publisher_name";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        $publisher_id = md5($publisher_name . time());
        $sql = "INSERT INTO publisher (publisher_id, publisher_name, publisher_address, publisher_phone, publisher_email) VALUES ('$publisher_id', '$publisher_name','$publisher_address', '$publisher_phone', '$publisher_email')";
        if (!(mysqli_query($connect, $sql))) {
            $cerror++;
            echo "Error inserting publisher : " . mysqli_error($connect);
        } else {
            echo "Insert successful";
        }
    } else {
        echo "that publisher is exist!";
    }
} else if ($type == "add_borrowing") {
    $borrower_id = $_POST["borrower_id"];
    $book_id = $_POST["book_id"];

    $borrowing_id = md5($borrower_id . $book_id . time());
    $date_string = date('Y-m-d', time());
    $due_date = date('Y-m-d', strtotime($today . ' + 15 days'));

    $sql = "INSERT INTO borrowing (borrowing_id, borrowing_rent_date, borrowing_due_date, borrowing_return_date, borrowing_fee, borrower_id, borrowing_status) 
    VALUES ('$borrowing_id', '$date_string','$due_date', null, '0', '$borrower_id', 'valid')";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error inserting borrowing : " . mysqli_error($connect);
        exit;
    }
    $sql = "INSERT INTO reference (borrowing_id, book_id) 
    VALUES ('$borrowing_id', '$book_id')";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error inserting borrowing : " . mysqli_error($connect);
        exit;
    }
    if ($cerror == 0) {
        echo "Insert successful";
    }
} else if ($type == "edit_author") {
    $author_id = $_POST["author_id"];
    $author_firstname = $_POST["author_firstname"];
    $author_lastname = $_POST["author_lastname"];
    $sql = "UPDATE author SET author_firstname = '$author_firstname', author_lastname = '$author_lastname' WHERE author_id = '$author_id'";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error edition : " . mysqli_error($connect);
    } else {
        echo "edit successful";
        echo "<script>window.close()</script>";
    }
} else if ($type == "edit_interpreter") {
    $interpreter_id = $_POST["interpreter_id"];
    $interpreter_firstname = $_POST["interpreter_firstname"];
    $interpreter_lastname = $_POST["interpreter_lastname"];
    $sql = "UPDATE interpreter SET interpreter_firstname = '$interpreter_firstname', interpreter_lastname = '$interpreter_lastname' WHERE interpreter_id = '$interpreter_id'";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error edition : " . mysqli_error($connect);
    } else {
        echo "edit successful";
        echo "<script>window.close()</script>";
    }
} else if ($type == "edit_publisher") {
    $publisher_id = $_POST["publisher_id"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publisher_phone = $_POST["publisher_phone"];
    $publisher_email = $_POST["publisher_email"];
    $sql = "UPDATE publisher SET publisher_name='$publisher_name', publisher_address='$publisher_address', publisher_phone='$publisher_phone', publisher_email='$publisher_email' WHERE publisher_id = '$publisher_id'";
    $result = mysqli_query($connect, $sql);
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error inserting publisher : " . mysqli_error($connect);
    } else {
        echo "edit successful";
        echo "<script>window.close()</script>";
    }
} else if ($type == "delete_author") {
    $author_id = $_POST["author_id"];
    $sql = "DELETE FROM author WHERE author_id = '$author_id'";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error edition : " . mysqli_error($connect);
    } else {
        echo "edit successful";
        echo "<script>window.close()</script>";
    }
} else if ($type == "delete_publisher") {
    $publisher_id = $_POST["publisher_id"];
    $sql = "DELETE FROM publisher WHERE publisher_id = '$publisher_id'";
    if (!(mysqli_query($connect, $sql))) {
        $cerror++;
        echo "Error edition : " . mysqli_error($connect);
    } else {
        echo "edit successful";
        echo "<script>window.close()</script>";
    }
}
echo "eh";



mysqli_close($connect);
