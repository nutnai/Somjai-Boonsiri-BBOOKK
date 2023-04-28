<!DOCTYPE html>
<html lang="en">

<?php //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

// $sql_book = "select * from book where publisher_id = $publisher_id";
// $result_book = mysqli_query($connect, $sql_book);
$sql_book = "SELECT b.*, GROUP_CONCAT(CONCAT(a.author_firstname, ' ', a.author_lastname) SEPARATOR ', ') as author_name
             FROM book b
             LEFT JOIN book_written bw ON b.book_id = bw.book_id
             LEFT JOIN author a ON bw.author_id = a.author_id
             GROUP BY b.book_id";
$result_book = mysqli_query($connect, $sql_book);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/publisher_book.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <script type="module" src="../src/publisher_book.js"></script>
    <script type="module" src="../src/hasTopRightAuth.js"></script>
    <title>Publisher Book</title>
</head>

<body style="background-color: #fff7e6;">
    <div id="sifah">
        <div id="auth1" style="display: none;">
            <div id="roob" onclick="clickProfile()">
                <form action="" method="post" id="formposthtr"></form>
            </div>
            <p id="username"> username</p>
        </div>
        <div id="auth0">
            <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='./signin.php'" />
        </div>
        <img id="logo" src="https://storage.googleapis.com/bbookk-c601f.appspot.com/lg/logo.png" onclick="window.location.href='../index.html'"></img>
    </div>
    <!-- <div id="mid"></div> -->
    <div id="bluebox">
    </div>

    <p id="personal">Book List</p>

    <div id="addBlock">
        <?php
        // while ($row_book = mysqli_fetch_assoc($result_book)) {
        //     $book_id = $row_book["book_id"];
        //     $book_name = $row_book["book_name"];
        //     $book_chapter = $row_book["book_chapter"];
        //     $author_name = $row_book["author_name"];

        //     echo '<div id="block" onclick="selectHotel(this)">
        //     <div id="idHotel"></div>
        //     <div id="roop"></div>
        //     <p id="lowname">
        //     <div id="asd">

        //         <p id="bookna">book name : ' . $book_name . '</p>
        //         <p id="bookch">book chapter : ' . $book_chapter . '</p>
        //         <p id="bookau">author name : ' . $author_name . '</p>
        //     </div>
        //     </p>
        // </div>';
        // }
        while ($row_book = mysqli_fetch_assoc($result)) {
            $show_data = "";
            $book_id = $row_book["book_id"];
            $book_name = $row_book["book_name"];
            $book_chapter = $row_book["book_chapter"];

            $show_data .= '<p class="detailbook">book name : ' . $book_name . '</p>';
            $show_data .= '<p class="detailbook">book chapter : ' . $book_chapter . '</p>';
            if (!empty($transql)) {
                $author_name = $row_book["author_name"];
                $show_data .= '<p class="detailbook">author name : ' . $author_name . '</p>';
            }
            echo '<div class="block" onclick="selectbook(this)">
                <input type="hidden" id="idbook" value="' . $book_id . '">
                <div id="roop"></div>
                <div id="lowname">
                ' . $show_data . '
                </div>
            </div>';
        }
        ?>


    </div>

</body>
<style>
    #whitebox {
        position: relative;
        width: 94%;
        height: auto;
        left: 3%;
        top: 3%;

        background: #FFFFFF;
        border-radius: 15px;
    }

    #inform {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 10px;
        position: relative;
        width: 96%;
        height: auto;
        left: 5%;
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 29px;
        line-height: 50px;
        cursor: pointer;
    }

    #yellowbox {
        position: absolute;
        width: 845px;
        height: auto;
        left: 356px;
        top: 248px;
        background: #FFEB85;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }

    #bookna {
        position: relative;
        width: 330px;
        height: 30px;
        left: 350px;
        bottom: 135px;
        border: none;
        background: white;
        border-radius: 15px;
        padding-left: 20px;
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 29px;

    }

    #bookch {
        position: relative;
        width: 330px;
        height: 30px;
        left: 350px;
        bottom: 110px;
        border: none;
        background: white;
        border-radius: 15px;
        padding-left: 20px;
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 29px;
    }

    #bookau {
        position: relative;
        width: 330px;
        height: 30px;
        left: 350px;
        bottom: 90px;
        border: none;
        background: white;
        border-radius: 15px;
        padding-left: 20px;
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 29px;
    }
</style>

</html>