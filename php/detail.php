<!DOCTYPE html>
<html lang="en">

<?php
$book_id = trim($_POST['book_id']);
// $book_id = 1;

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";

$sql = "select * from book where book_id = '$book_id'";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($connect, $sql);
$row_book = mysqli_fetch_assoc($result);

$book_status = $row_book["book_status"];
$book_name = $row_book["book_name"];
$book_chapter = $row_book["book_chapter"];
$book_edition = $row_book["book_edition"];
$book_language = $row_book["book_language"];

$sql_1 = "select * from book_genre where book_id = '$book_id'";
$result_1 = mysqli_query($connect, $sql_1);
$row_book_genre = mysqli_fetch_assoc($result_1);

$genre_id = $row_book_genre["genre_id"];

$sql_2 = "select * from genre where genre_id = '$genre_id'";
$result_2 = mysqli_query($connect, $sql_2);
$row_genre = mysqli_fetch_assoc($result_2);

$book_genre = $row_genre["genre"];

$sql_3 = "select * from book_written where book_id = '$book_id'";
$result_3 = mysqli_query($connect, $sql_3);
$row_book_written = mysqli_fetch_assoc($result_3);

$author_id = $row_book_written["author_id"];

$sql_4 = "select * from author where author_id = '$author_id'";
$result_4 = mysqli_query($connect, $sql_4);
$row_author = mysqli_fetch_assoc($result_4);

$author_fname = $row_author["author_firstname"];
$author_lname = $row_author["author_lastname"];
$author_name = $author_fname . " " . $author_lname;

$sql_5 = "select * from book_translated where book_id = '$book_id'";
$result_5 = mysqli_query($connect, $sql_5);
$row_book_interpreter = mysqli_fetch_assoc($result_5);
if ($row_book_interpreter) {
    $interpreter_id = $row_book_interpreter["interpreter_id"];

    $sql_6 = "select * from interpreter where interpreter_id = '$interpreter_id'";
    $result_6 = mysqli_query($connect, $sql_6);
    $row_interpreter = mysqli_fetch_assoc($result_6);

    $interpreter_fname = $row_interpreter["interpreter_firstname"];
    $interpreter_lname = $row_interpreter["interpreter_lastname"];
    $interpreter_name = $interpreter_fname . " " . $author_lname;
}


$book_isbn = $row_book["book_isbn"];
$book_year = $row_book["book_year"];
$book_numpage = $row_book["book_number_of_pages"];
$book_price = $row_book["book_price"];
$book_summary = $row_book["book_summary"];
$publisher_id = $row_book["publisher_id"];

$sql_publisher = "select * from publisher where publisher_id = '$publisher_id'";
$result_publisher = mysqli_query($connect, $sql_publisher);
$row_publisher = mysqli_fetch_assoc($result_publisher);

$publisher_name = $row_publisher["publisher_name"];
$publisher_phone = $row_publisher["publisher_phone"];
$publisher_email = $row_publisher["publisher_email"];
$publisher_address = $row_publisher["publisher_address"];
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

<body style="background-color: #fff7e6;">
    <div id="sifah">
    <img id="logo" src="https://storage.googleapis.com/bbookk-c601f.appspot.com/lg/logo.png" onclick="window.location.href='../index.html'"></img>
        <div id="auth1" style="display: none;">
            <div id="roob" onclick="clickProfile()">
                <form action="" method="post" id="formposthtr"></form>
            </div>
            <p id="username"> username</p>
        </div>
        <div id="auth0">
            <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='./signin.php'" />
        </div>
    </div>

    <div id="information">
        <?php
        $sql_tmp = "select * from book_image where book_id = '$book_id'";
        $result_tmp = mysqli_query($connect, $sql_tmp);
        $row_image = mysqli_fetch_assoc($result_tmp);
        ?>
        <div id="roopyai">
            <?php
            $url = "https://storage.googleapis.com/bbookk-c601f.appspot.com/bk/" . $row_image["image_id"];
            echo "<img class='roopyai'src='$url'; onclick='window.open('$url')'>";
            ?>
        </div>
        <div id="rooprek">
            <?php
            $result_tmp = mysqli_query($connect, $sql_tmp);
            while ($row_image = mysqli_fetch_assoc($result_tmp)) {
                $url = "https://storage.googleapis.com/bbookk-c601f.appspot.com/bk/" . $row_image["image_id"];
                echo "<img class='rooprek'src='$url'; onclick='changeroopyai('$url')'>";
            }
            ?>
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
                <p id="contact">&nbsp;&nbsp;&nbsp;Contact publisher : <?php echo $publisher_name; ?></p>
                <p id="phone">&nbsp;&nbsp;&nbsp;Phone : <?php echo $publisher_phone; ?></p>
                <p id="email">&nbsp;&nbsp;&nbsp;Email : <?php echo $publisher_email; ?></p>
                <p id="email">&nbsp;&nbsp;&nbsp;Address : <?php echo $publisher_address; ?></p>
            </div>
        </div>
        <div id="heartborrow">
            <div class="heart-btn">
                <div class="content"><span class="heart"></span></div>
            </div>
            <input type="button" value="borrow" id="reserve" class="yellow" onclick="document.getElementById('all').style.display = '';">
        </div>
    </div>

    <div id="all" style="display: none">
        <div id="bgall"></div>
        <div id="all2">
            <div id="booked" class="bgWhiteAll">
                <p style="text-align: center;">Are you sure you want to borrow this book?</p>
                <input type="button" value="Back" id="backall" onclick="document.getElementById('all').style.display='none';">
                <input type="button" value="Confirm" id="confirmall" onclick="confirmall();document.getElementById('all').style.display='none';">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.content').click(function() {
                $('.content').toggleClass("heart-active")
                $('.heart').toggleClass("heart-active")
            });
        });
    </script>
    <form action="./inserter.php" method="post" target="_blank" id="formpost">
        <input type="hidden" name="type" value="add_borrowing">
        <input type="hidden" name="borrower_id" value="" id="borrower_id">
        <input type="hidden" name="book_id" value="<?php echo $book_id ?>">
    </form>
</body>
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

</html>