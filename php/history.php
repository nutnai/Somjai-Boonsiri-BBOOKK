<!DOCTYPE html>
<html lang="en">

<?php
$borrower_id = "9GhccUfzlNP8Td2qzMFFfsA6kcw2"; //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

$sql_borrowing = "select * from borrowing where borrower_id = '$borrower_id'";
$result_borrowing = mysqli_query($connect, $sql_borrowing);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/history.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <script type="module" src="../src/history.js"></script>
    <script type="module" src="../src/hasTopRightAuth.js"></script>
    <title>History Read</title>
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

        </img>
    </div>
    <!-- <div id="mid"></div> -->
    <div id="bluebox">
    </div>

    <p id="personal">History</p>

    <div id="addBlock">
        <?php
        while ($row_borrowing = mysqli_fetch_assoc($result_borrowing)) {
            $borrowing_id = $row_borrowing["borrowing_id"];
            $sql_reference = "select * from reference where borrowing_id = '$borrowing_id'";
            $result_reference = mysqli_query($connect, $sql_reference);
            $row_reference = mysqli_fetch_assoc($result_reference);

            $book_id = $row_reference["book_id"];

            $sql_book = "select * from book where book_id = '$book_id'";
            $result_book = mysqli_query($connect, $sql_book);
            $row_book = mysqli_fetch_assoc($result_book);


            $book_name = $row_book["book_name"];
            $borrowing_rent_date = $row_borrowing["borrowing_rent_date"];
            $borrowing_due_date = $row_borrowing["borrowing_due_date"];

            $sql = "select * from book_image where book_id = '$book_id'";
            $result_image = mysqli_query($connect, $sql);
            $row_image = mysqli_fetch_assoc($result_image);
            $image_id = $row_image["image_id"];
            echo "<div id='block' onclick='selectHotel(this)'>
            <div id='idHotel'></div>
            <div id='roop' style='display: flex;justify-content: center;align-items: center;'><img style='height:100%;border-radius: 7px'src='https://storage.googleapis.com/bbookk-c601f.appspot.com/bk/$image_id'></img></div>
            <!-- <p id='name'>Book name</p> -->
            <p id='lowname'>
            <div id='asd'>
                <p id='tumnang'>book name :$book_name</p>
                <p id='raka'>rent date : $borrowing_rent_date</p>
                <p id='konPak'>due date : $borrowing_due_date</p>
            </div>
            </p>
        </div>";
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
</style>

</html>