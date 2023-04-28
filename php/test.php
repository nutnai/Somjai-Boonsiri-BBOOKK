<!DOCTYPE html>
<html lang="en">
<?php
$publisher_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

$sql = "select * from publisher where publisher_id = $publisher_id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$text = $row["publisher_name"];
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?php echo $text; ?></p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<?php
    $publisher_id = 1; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";

    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "select * from publisher where publisher_id = $publisher_id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $publisher_id = $row["publisher_id"];
    $publisher_name = $row["publisher_name"];
    $publisher_phone = $row["publisher_phone"];
    $publisher_address = $row["publisher_address"];
    $publisher_email = $row["publisher_email"];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/publisher.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <script type="module" src="../src/publisher.js"></script>
    <title>Publisher</title>
</head>

<body style="background-color: white;">
    <div id="sifah">
    <img id="logo" src="https://storage.googleapis.com/bbookk-c601f.appspot.com/lg/logo.png" onclick="window.location.href='../index.html'"></img>

        <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
    </div>
    <div id="mid"></div>
    <div id="bluebox"></div>
    <!-- <div id="yellowbox"></div>
    <div id="whitebox"></div> -->
    
    <!-- <div class="line1">
        <div id="linee1"></div>
        <div id="linee2"></div>
        <div id="linee3"></div>
        <div id="linee4"></div>
        <div id="linee5"></div>
    </div> -->
    <!-- <input id="id"type="text" placeholder="ID..." readonly class="edit">
    <input id="na"type="text" placeholder="name..." readonly class="edit">
    <input id="Phonnumber"type="text" placeholder="Phone number..." readonly class="edit">
    <input id="Adrress"type="text" placeholder="address..." readonly class="edit">
    <input id="email"type="text" placeholder="email..." readonly class="edit"> -->
        
    <div id="information">
        <div id="yellowbox">
          <div id="whitebox">
          <form method="post" action="./inserter.php">
            <input type="hidden" name="type" value="publisher">
            <p class="head">ID :</p>
            <p class="info"><input type="text" id="publisher_id" name="publisher_id" required readonly class="textbox" value="<?php echo $publisher_id ?>"></p>
            <div class="line"></div>
            <p class="head">Name :</p>
            <p class="info"><input type="text" id="publisher_name" name="publisher_name" required readonly class="textbox" value="<?php echo $publisher_name ?>"></p>
            <div class="line"></div>
            <p class="head">Address :</p>
            <p class="info"><input type="text" id="publisher_address" name="publisher_address" required readonly class="textbox" value="<?php echo $publisher_address ?>"></p>
            <div class="line"></div>
            <p class="head">Phone :</p>
            <p class="info"><input type="text" id="publisher_phone" name="publisher_phone" required class="textbox" value="<?php echo $publisher_phone ?>"></p>
            <div class="line"></div>
            <p class="head">Email :</p>
            <p class="info"><input type="text" id="publisher_email" name="publisher_email" required readonly class="textbox" value="<?php echo $publisher_email ?>"></p>
            <div class="line"></div>
            <input id="but1" type="submit" value="Edit" onclick="clickEdit('edit')"  >
            <input id="but2" type="button" value="Save" onclick="clickEdit('save')" style="display: none;">
            <input id="but3" type="button" value="Cancel" onclick="clickEdit('cancel')" style="display: none;">
          </form>
        </div>  
        </div>
    </div>

    <p id="personal">Publisher's details</p>
    <input id="delete" type="button" value="Delete accout" onclick="myFunction()" style="display: none;">
    <input id="logout" type="button" value="Log Out" onclick="signOut()">
    <p class="reset" style="display: none;">Reset password ?</p>
    <p id="blankk"> </p>
    <div class="popup" id="all">
        <span class="popuptext" id="myPopup"></span>
        <span class="asky" id="ask"> Do &nbsp;you&nbsp;sure&nbsp;&#x3F;</span>
        <input class="noo" type="button" value="No" id="no" onclick="closeWin()">
        <input class="yess" type="button" value="Yes" id="yes">
    </div>
    <div class="admin">

        <button type="button" id="adminy" onclick="window.location.href='./book_add.php'">Add Book</button>
        <button type="button" id="editHotel" onclick="window.location.href='./publisher_book.php'">Book List</button>
    </div>

    <script>
        // When the user clicks on <div>, open the popup
        function myFunction() {

            var popup = document.getElementById("myPopup");
            var pop1 = document.getElementById("ask");
            var pop2 = document.getElementById("no");
            var pop3 = document.getElementById("yes");

            popup.classList.toggle("show");
            pop1.classList.toggle("show");
            pop2.classList.toggle("show");
            pop3.classList.toggle("show");

        }
        function closeWin() {

            document.getElementById("myPopup").style.display = "none";
            document.getElementById("ask").style.display = "none";
            document.getElementById("no").style.display = "none";
            document.getElementById("yes").style.display = "none";
        }
    </script>

</body>

</html>