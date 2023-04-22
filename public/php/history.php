<!DOCTYPE html>
<html lang="en">

<?php
    $borrower_id = 6434484923; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "select * from borrower where borrower_id = $borrower_id";
    $result = mysqli_query($connect, $sql);
    $row_borrower = mysqli_fetch_assoc($result);

    $sql_borrowing = "select * from borrowing where borrower_id = $borrower_id";
    $result_borrowing = mysqli_query($connect, $sql_borrowing);
    $row_borrowing = mysqli_fetch_assoc($result_borrowing);

    $borrowing_id = $row_borrowing["borrowing_id"];

    $sql_reference = "select * from reference where borrowing_id = $borrowing_id";
    $result_reference = mysqli_query($connect, $sql_reference);
    $row_reference = mysqli_fetch_assoc($result_reference);

    $book_id = $row_reference["book_id"];

    $sql_book = "select * from book where book_id = $book_id";
    $result_book = mysqli_query($connect, $sql_book);
    $row_book = mysqli_fetch_assoc($result_book);


    $book_name = $row_book["book_name"];
    $borrowing_rent_date = $row_borrowing["borrowing_rent_date"];
    $borrowing_return_date = $row_borrowing["borrowing_return_date"];
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

<body style="background-color: white;">
    <div id="sifah">
        <div id="auth1" style="display: none;">
            <div id="roob" onclick="clickProfile()">
            </div>
            <p id="username"> username</p>
          </div>
          <div id="auth0" >
            <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='../signin.php'" />
          </div>
        <p id="hua" onclick="window.location.href='../index.html'">BbookK</p>

        <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
    </div>
    <!-- <div id="mid"></div> -->
    <div id="bluebox">
    </div>
    
    <p id="personal">History</p>

    <div id="addBlock">
        <div id="block" onclick="selectHotel(this)">
          <div id="idHotel"></div>
          <div id="roop"></div>
          <!-- <p id="name">Book name</p> -->
          <p id="lowname">
          <div id="asd">
            <p id="tumnang">book name : <?php echo $book_name; ?></p>
            <p id="raka">rent date : <?php echo $borrowing_rent_date; ?></p>
            <p id="konPak">return date : <?php echo $borrowing_return_date; ?></p>
          </div>
          </p>
        </div>
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