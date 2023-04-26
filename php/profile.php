<!DOCTYPE html>
<html lang="en">
<?php
$borrower_id = $_POST['user_id']; //explode("?", $_SERVER["PHP_SELF"])[1];

$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";

$sql = "select * from borrower where borrower_id = $borrower_id";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
//$publisher_id = $row["publisher_id"];
$borrower_fname = $row["borrower_firstname"];
$borrower_lname = $row["borrower_lastname"];
$borrower_birthday = $row["borrower_birthday"];
$borrower_register_date = $row["borrower_register_date"];
$borrower_phone = $row["borrower_phone"];
$borrower_address = $row["borrower_address"];
$borrower_email = $row["borrower_email"];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <script type="module" src="../src/profile.js"></script>
    <title>Profile</title>
</head>

<body style="background-color: white;">
    <div id="sifah">
        <p id="hua" onclick="window.location.href='../index.html'">BbookK</p>

        <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
    </div>
    <div id="mid"></div>
    <div id="bluebox"></div>

    <div id="information">
        <div id="yellowbox">
            <form method="post" action="./inserter.php">
                <div id="whitebox">
                    <input type="hidden" name="type" value="profile">
                    <p class="head">ID :</p>
                    <p class="info"><input type="text" id="borrower_id" name="borrower_id" required readonly class="textbox" value="<?php echo $borrower_id ?>"></p>
                    <div class="line"></div>
                    <p class="head">First Name :</p>
                    <p class="info"><input type="text" id="borrower_fname" name="borrower_fname" required readonly class="textbox" value="<?php echo $borrower_fname ?>"></p>
                    <div class="line"></div>
                    <p class="head">Last Name :</p>
                    <p class="info"><input type="text" id="borrower_lname" name="borrower_lname" required readonly class="textbox" value="<?php echo $borrower_lname ?>"></p>
                    <div class="line"></div>
                    <p class="head">Address :</p>
                    <p class="info"><input type="text" id="borrower_address" name="borrower_address" required readonly class="textbox" value="<?php echo $borrower_address ?>"></p>
                    <div class="line"></div>
                    <p class="head">Birthday :</p>
                    <p class="info"><input type="text" id="borrower_birthday" name="borrower_birthday" required readonly class="textbox" value="<?php echo $borrower_birthday ?>"></p>
                    <div class="line"></div>
                    <p class="head">Register Date :</p>
                    <p class="info"><input type="text" id="borrower_register_date" name="borrower_register_date" required readonly class="textbox" value="<?php echo $borrower_register_date ?>"></p>
                    <div class="line"></div>
                    <p class="head">Phone :</p>
                    <p class="info"><input type="text" id="borrower_phone" name="borrower_phone" required readonly class="textbox" value="<?php echo $borrower_phone ?>"></p>
                    <div class="line"></div>
                    <p class="head">Email:</p>
                    <p class="info"><input type="text" id="borrower_email" name="borrower_email" required readonly class="textbox" value="<?php echo $borrower_email ?>"></p>
                    <div class="line"></div>
                    <input id="but1" type="button" value="Edit" onclick="clickEdit('edit')">
                    <input id="but2" type="submit" value="Save" onclick="clickEdit('save')" style="display: none;">
                    <input id="but3" type="button" value="Cancel" onclick="clickEdit('cancel')" style="display: none;">
                </div>
            </form>
        </div>
    </div>

    <p id="personal">Personal details</p>
    <input id="delete" type="button" value="Delete accout" onclick="myFunction()" style="display: none;">
    <input id="llogout" type="button" value="Log Out" onclick="signOut()">
    <p class="reset" style="display: none;">Reset password ?</p>
    <p id="blankk"> </p>
    <div class="popup" id="all">
        <span class="popuptext" id="myPopup"></span>
        <span class="asky" id="ask"> Do &nbsp;you&nbsp;sure&nbsp;&#x3F;</span>
        <input class="noo" type="button" value="No" id="no" onclick="closeWin()">
        <input class="yess" type="button" value="Yes" id="yes">
    </div>
    <div class="admin">

        <form action="./history.php" method="post" id="formposthtr">
            <input type="hidden" name="user_id" value="">
            <input type="submit" id="adminy" value="History">
        </form>

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