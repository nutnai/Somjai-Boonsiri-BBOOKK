<!DOCTYPE html>
<html lang="en">

<?php
$book_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";

$sql = "select * from book where book_id = $book_id";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($connect, $sql);
$row_book = mysqli_fetch_assoc($result);

$book_status = $row_book["book_status"];
$book_id = $row_book["book_id"];
$book_name = $row_book["book_name"];
$book_chapter = $row_book["book_chapter"];
$book_edition = $row_book["book_edition"];
$book_language = $row_book["book_language"];

$sql_1 = "select * from book_genre where book_id = $book_id";
$result_1 = mysqli_query($connect, $sql_1);
$row_book_genre = mysqli_fetch_assoc($result_1);

$genre_id = $row_book_genre["genre_id"];

$sql_2 = "select * from genre where genre_id = $genre_id";
$result_2 = mysqli_query($connect, $sql_2);
$row_genre = mysqli_fetch_assoc($result_2);

$book_genre = $row_genre["genre"];

$sql_3 = "select * from book_written where book_id = $book_id";
$result_3 = mysqli_query($connect, $sql_3);
$row_book_written = mysqli_fetch_assoc($result_3);

$author_id = $row_book_written["author_id"];

$sql_4 = "select * from author where author_id = $author_id";
$result_4 = mysqli_query($connect, $sql_4);
$row_author = mysqli_fetch_assoc($result_4);

$author_fname = $row_author["author_firstname"];
$author_lname = $row_author["author_lastname"];
$author_name = $author_fname . " " . $author_lname;

$sql_5 = "select * from book_translated where book_id = $book_id";
$result_5 = mysqli_query($connect, $sql_5);
$row_book_interpreter = mysqli_fetch_assoc($result_5);

$interpreter_id = $row_book_interpreter["interpreter_id"];

$sql_6 = "select * from interpreter where interpreter_id = $interpreter_id";
$result_6 = mysqli_query($connect, $sql_6);
$row_interpreter = mysqli_fetch_assoc($result_6);

$interpreter_fname = $row_interpreter["interpreter_firstname"];
$interpreter_lname = $row_interpreter["interpreter_lastname"];
$interpreter_name = $interpreter_fname . " " . $author_lname;

$book_isbn = $row_book["book_isbn"];
$book_year = $row_book["book_year"];
$book_numpage = $row_book["book_number_of_pages"];
$book_price = $row_book["book_price"];
$book_summary = $row_book["book_summary"];
$publisher_id = $row_book["publisher_id"];

$sql_publisher = "select * from publisher where publisher_id = $publisher_id";
$result_publisher = mysqli_query($connect, $sql_publisher);
$row_publisher = mysqli_fetch_assoc($result_publisher);

$publisher_name = $row_publisher["publisher_name"];
$publisher_phone = $row_publisher["publisher_phone"];
$publisher_email = $row_publisher["publisher_email"];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detail.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="../src/detail.js"></script>
    <title>detail</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="module" src="../src/hasTopRightAuth.js"></script>
</head>

<body>
    <div id="sifah">
        <p id="hua" onclick="window.location.href='../index.html'">BbookK</p>

        <img id="home1" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
        <div id="auth1" style="display: none;">
            <div id="roob" onclick="clickProfile()">
            </div>
            <p id="username"> username</p>
        </div>
        <div id="auth0">
            <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='../signin.php'" />
        </div>
    </div>

    <div id="information">
        <div id="roopyai">
        </div>
        <div id="rooprek">
        </div>
        <div id="detailText">
            <div id="sikaw">
                <p> Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_status; ?></p>
                <p> Book name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_name; ?></p>
                <p> Book Chapter &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $book_chapter; ?></p>
                <p> Edition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_edition; ?></p>
                <p> Language &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_language; ?></p>
                <p> Genre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_genre; ?></p>
                <p> Author &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $author_name; ?></p>
                <p> Interpretor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $interpreter_name; ?></p>
                <p> Book ISBN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $book_isbn; ?></p>
                <p> Year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_year; ?></p>
                <p> Pages &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_numpage; ?></p>
                <p> Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_price; ?></p>
                <p> Summary &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $book_summary; ?></p>
            </div>
        </div>
    <div id="fahunder">
      <div id="sikaw22">
        <p id="contact">&nbsp;&nbsp;&nbsp;Contact publisher : </p>
        <p id="phone">&nbsp;&nbsp;&nbsp;Phone : </p>
        <p id="email">&nbsp;&nbsp;&nbsp;Email : </p>
      </div>
    </div>
    <div id="heartborrow">
      <div class="heart-btn">
        <div class="content"><span class="heart"></span></div>
      </div>
      <input type="button" value="borrow" id="reserve" class="yellow"
        onclick="document.getElementById('all').style.display = '';document.getElementById('reserveall').style.display = '';document.getElementById('booked').style.display = 'none'">
    </div>
  </div>

  <div id="all" style="display: none">
    <div id="bgall"></div>
    <div id="all2">
      <div id="booked" class="bgWhiteAll">
        <p style="text-align: center;">Are you sure you want to borrow this book?</p>
        <input type="button" value="Back" id="backall" onclick="document.getElementById('all').style.display='none';">
        <input type="button" value="Confirm" id="confirmall" onclick="clickDelete()">
      </div>
    </div>
  </div>

  <div id="booked" class="bgWhiteAll" style="display: none;">
    <p style="text-align: center;">Successfully booked. Thank you for using the service.</p>
    <img id="imageCorrect" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_correct.webp">
    <input type="button" value="Back" id="backall" onclick="document.getElementById('all').style.display='none';">
    <input type="button" value="See contract" id="contractall" onclick="clickContract()">
  </div>
  </div>
  </div>
  <script>
    $(document).ready(function () {
      $('.content').click(function () {
        $('.content').toggleClass("heart-active")
        $('.heart').toggleClass("heart-active")
      });
    });
  </script>




</body>

</html>
<style>
  .roopyai {
    height: 90%;
    border-radius: 10%;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
  }

  .rooprek {
    position: relative;
    height: 90%;
    margin: auto;
    border-radius: 10%;
    top: 5%;
    margin-left: 10px;
    cursor: pointer;
  }
</style>