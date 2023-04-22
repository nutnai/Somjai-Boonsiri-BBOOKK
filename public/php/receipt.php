<!DOCTYPE html>
<html lang="en">
<?php
    $borrowing_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";
    $connect = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql_borrowing = "select * from borrowing where borrowing_id = $borrowing_id";
    $result_borrowing = mysqli_query($connect, $sql_borrowing);
    $row_borrowing = mysqli_fetch_assoc($result_borrowing);

    $borrower_id = $row_borrowing["borrower_id"];

    $sql_reference = "select * from reference where borrowing_id = $borrowing_id";
    $result_reference = mysqli_query($connect, $sql_reference);
    $row_reference = mysqli_fetch_assoc($result_reference);

    $book_id = $row_reference["book_id"];

    $sql_book = "select * from book where book_id = $book_id";
    $result_book = mysqli_query($connect, $sql_book);
    $row_book = mysqli_fetch_assoc($result_book);

    $sql = "select * from borrower where borrower_id = $borrower_id";
    $result = mysqli_query($connect, $sql);
    $row_borrower = mysqli_fetch_assoc($result);

    $borrower_fname = $row_borrower["borrower_firstname"];
    $borrower_lname = $row_borrower["borrower_lastname"];
    $borrower_name = $borrower_fname." ".$borrower_lname;
    $book_name = $row_book["book_name"];
    $book_id = $row_book["book_id"];
    $borrowing_rent_date = $row_borrowing["borrowing_rent_date"];
    $borrowing_due_date = $row_borrowing["borrowing_due_date"];
    $borrowing_return_date = $row_borrowing["borrowing_return_date"];
    $borrowing_fee = $row_borrowing["borrowing_fee"];
    $borrowing_status = $row_borrowing["borrowing_status"];
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../css/receipt.css">
  <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrow Receipt</title>
  <script type="module" src="../src/hasTopRightAuth.js"></script>
  <script type="module" src="../src/receipt.js"></script>
</head>

<body>
  <div id="sifah">
    <p id="hua" onclick="window.location.href='../index.html'" onclick="window.location.href='../index.html'">
      BbookK
    </p>

    <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

    </img>
    <div id="auth1">

      <div id="roob" onclick="clickProfile()">
      </div>
      <p id="username"> username</p>

    </div>
    <div id="auth0" style="display: none;">
      <!-- <input type="button" value="Register" id="regis" class="yellow"
        onclick="window.location.href='../register.html'" /> -->
      <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='../signin.php'" />
    </div>
    </div>
  </div>
  <div id="bluebox">
    <!-- <p id="personal">Borrow Reciept</p> -->
    Borrow Receipt
  </div>
  
  <div id="information">
    <div id="yellowbox">
      <div id="whitebox">
        <p class="head">Borrowing ID :</p>
        <p class="info"><?php echo $borrowing_id; ?></p>
        <div class="line"></div>
        <p class="head">Borrower name :</p>
        <p class="info"><?php echo $borrower_name; ?></p>
        <div class="line"></div>
        <p class="head">Book name :</p>
        <p class="info"><?php echo $book_name; ?></p>
        <div class="line"></div>
        <p class="head">Book ID :</p>
        <p class="info"><?php echo $book_id; ?></p>
        <div class="line"></div>
        <p class="head">Rent Date :</p>
        <p class="info"><?php echo $borrowing_rent_date; ?></p>
        <div class="line"></div>
        <p class="head">Due date :</p>
        <p class="info"><?php echo $borrowing_due_date; ?></p>
        <div class="line"></div>
        <p class="head">Return Date :</p>
        <p class="info"><?php echo $borrowing_return_date; ?></p>
        <div class="line"></div>
        <p class="head">Fee :</p>
        <p class="info"><?php echo $borrowing_fee; ?></p>
        <div class="line"></div>
        <p class="head">Status :</p>
        <p class="info"><?php echo $borrowing_status; ?></p>
      </div>
    </div>
  </div>
  <input type="button" id="delete" value="Cancel booking" style="display: none;" onclick="document.getElementById('all').style.display=''";>
  <div id="all" style="display: none">
    <div id="bgall"></div>
    <div id="all2">
      <div id="booked" class="bgWhiteAll">
        <p style="text-align: center;">Are you sure you want to cancel this booking?</p>
        <input type="button" value="Back" id="backall" onclick="document.getElementById('all').style.display='none';">
        <input type="button" value="Confirm" id="confirmall" onclick="clickDelete()">
      </div>
    </div>
  </div>
</body>

</html>