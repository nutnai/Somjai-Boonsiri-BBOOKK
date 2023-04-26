<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/book_add.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Add</title>
    <script type="module" src="../src/hasTopRightAuth.js"></script>
    <script type="module" src="../src/book_add.js"></script>
</head>
<?php
$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";

$sql = "select * from author";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result_author = mysqli_query($connect, $sql);

$sql = "select * from interpreter";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result_interpreter = mysqli_query($connect, $sql);

$sql = "select * from publisher";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result_publisher = mysqli_query($connect, $sql);

if (isset($_POST["user_id"])) {
}
?>

<body>
    <div id="sifah">
        <p id="hua" onclick="window.location.href='../index.html'" onclick="window.location.href='../index.html'">
            BbookK
        </p>

        <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
        <div id="auth1" style="display: none;">

            <div id="roob" onclick="clickProfile()">
            </div>
            <p id="username"> username</p>

        </div>
        <div id="auth0">
            <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='../signin.php'" />
        </div>
        <p id="personal">About Hotel</p>
        <div id="information">
            <div id="yellowbox">
                <div id="whitebox">
                    <form method="post" action="./inserter.php" id="form">
                        <input type="hidden" name="type" value="add">
                        <p class="head">Book Name :</p>
                        <input type="text" id="book_name" name="book_name" required class="info" placeholder="Book Name . . .">
                        <div class="line"></div>
                        <p class="head">Book Chapter :</p>
                        <input type="text" id="book_chapter" name="book_chapter" required class="info" placeholder="Book Chapter . . .">
                        <div class="line"></div>
                        <p class="head">Book ISBN :</p>
                        <input type="number" id="book_isbn" name="book_isbn" required class="info" placeholder="Book ISBN . . .">
                        <div class="line"></div>
                        <p class="head">Book Number Of Pages :</p>
                        <input type="number" id="book_npage" name="book_npage" required class="info" placeholder="Book Number Of Pages . . .">
                        <div class="line"></div>
                        <p class="head">Book Year :</p>
                        <input type="text" id="book_yaer" name="book_year" required class="info" placeholder="Book Wrtitten date . . .">
                        <div class="line"></div>
                        <p class="head">Book Price :</p>
                        <input type="number" id="book_price" name="book_price" class="info" placeholder="Book Price . . .">
                        <div class="line"></div>
                        <p class="head">Book Edition :</p>
                        <input type="number" id="book_edition" name="book_edition" required class="info" placeholder="Book Edition . . .">
                        <div class="line"></div>
                        <p class="head">Book Language :</p>
                        <input type="text" id="book_language" name="book_language" required class="info" placeholder="Book Language . . .">
                        <div class="line"></div>
                        <p class="head">Book Summary :</p>
                        <textarea id="book_summary" name="book_summary" placeholder="Book summary..." onchange="auto_grow(this);" onkeyup="auto_grow(this);"></textarea>
                        <div class="line"></div>

                        <!-- <input type="text" id="book_summary" name="book_summary" required class="info" placeholder="Book Sunmmary . . ."> -->
                        <p class="head">Publisher Name :</p>
                        <div class="field" id="input_publisher_field">
                            <input list="publisher_list" id="publisher_name" class="info" name="publisher_name" onchange="inputchecklist(this, publisher_list)" placeholder="Publisher name . . .">
                        </div>
                        <datalist id="publisher_list">
                            <?php
                            while ($row_publisher = mysqli_fetch_assoc($result_publisher)) {
                                $publisher_firstname = $row_publisher["publisher_name"];
                                echo "<option value='" . $publisher_firstname . "'>";
                            }
                            ?>
                        </datalist>
                        <div class="line"></div>
                        <!-- ////////////////////////////////////////////// -->
                        <p class="head">Author Name :</p>
                        <div class="field" id="input_author_field">
                            <input list="author_list" id="author_name" class="info" name="author_name[]" onchange="inputchecklist(this, author_list)" placeholder="Author name . . .">
                        </div>
                        <datalist id="author_list">
                            <?php
                            while ($row_author = mysqli_fetch_assoc($result_author)) {
                                $author_firstname = $row_author["author_firstname"];
                                $author_lastname = $row_author["author_lastname"];
                                echo "<option value='" . $author_firstname . " " . $author_lastname . "'>";
                            }
                            ?>
                        </datalist>
                        <!-- //////////////////////////////////////////////// -->
                        <div class="line"></div>
                        <p class="head">Interpreter Name :</p>
                        <div class="field" id="input_interpreter_field">
                            <input list="interpreter_list" id="interpreter_name" class="info" name="interpreter_name[]" onchange="inputchecklist(this, interpreter_list)" placeholder="interpreter name . . .">
                        </div>
                        <datalist id="interpreter_list">
                            <?php
                            while ($row_interpreter = mysqli_fetch_assoc($result_interpreter)) {
                                $interpreter_firstname = $row_interpreter["interpreter_firstname"];
                                $interpreter_lastname = $row_interpreter["interpreter_lastname"];
                                echo "<option value='" . $interpreter_firstname . " " . $interpreter_lastname . "'>";
                            }
                            ?>
                        </datalist>
                        <!-- ////////////////////////////////////////////////////////////// -->
                        <div class="line"></div>
                        <div class="headd">
                            <p class="head">Image :</p>
                            <input type="file" id="image-upload" name="image-upload" accept="image/*" multiple>
                        </div>
                        <input type="hidden" value="" id="publisher_id">
                        <input id="save" type="submit" value="add">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <input type="button" id="delete" value="delete hotel" style="display: none;" onclick="document.getElementById('all').style.display='';document.getElementById('booked').style.display=''" ;>
    <div id="all" style="display: none;">
        <div id="bgall"></div>
        <div id="all2">
            <div id="booked" class="bgWhiteAll" style="display: none;">
                <p style="text-align: center;">Are you sure you want to delete this hotel?</p>
                <input type="button" value="Back" id="backall" class="backall" onclick="document.getElementById('all').style.display='none';">
                <input type="button" value="Confirm" id="confirmall" class="confirmall" onclick="clickDelete()">
            </div>
            <div id="upload" class="bgWhiteAll" style="display: none;">
                <p style="text-align: center;">uploading Image</p>
                <br>
                <p style="text-align: center;" id="upload1">0/0</p>
                <p style="text-align: center;" id="upload2">0%</p>
            </div>
            <div id="finish" class="bgWhiteAll" style="display: none;">
                <p style="text-align: center;" id="finish1">Add hotel complete</p>
                <input type="button" value="Back" class="backall" onclick="window.history.back();">
                <input type="button" value="Add more" class="confirmall" onclick="window.location.reload();">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var range = document.createRange();

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }

        async function inputchecklist(node, datalist) {
            await new Promise((resolve) => {
                if (!datalist.querySelector("option[value='" + node.value + "']")) {
                    node.value = "";
                }
                resolve();
            })
            await new Promise((resolve) => {
                console.log(node.parentNode.childNodes);
                if (node.value == "") {
                    if ((node.parentNode.childNodes.length != 3))
                        node.remove();
                } else if (node.parentNode.querySelector("#author_name")) {
                    var input_author_field = document.getElementById("input_author_field");
                    if (input_author_field.lastChild.value != "") {
                        node.parentNode.appendChild(range.createContextualFragment("<input list='author_list' id='author_name' class='info' name='author_name[]' onchange='inputchecklist(this, author_list)' placeholder='Author name . . .'>"))
                    }
                } else if (node.parentNode.querySelector("#interpreter_name")) {
                    var input_interpreter_field = document.getElementById("input_interpreter_field");
                    if (input_interpreter_field.lastChild.value != "") {
                        node.parentNode.appendChild(range.createContextualFragment("<input list='interpreter_list' id='interpreter_name' class='info' name='interpreter_name[]' onchange='inputchecklist(this, interpreter_list)' placeholder='interpreter name . . .'>"))
                    }
                }
                resolve();
            })
        }
    </script>

</body>
<style>
    #yellowbox {
        position: absolute;
        width: 845px;
        height: max-content;
        left: 210px;
        top: 200px;

        background: #FFEB85;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }

    #whitebox {
        position: relative;
        width: 94%;
        height: 94%;
        background: #FFFFFF;
        border-radius: 10px;
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 300;
        font-size: 24px;
        line-height: 29px;
        color: #1a3244;
        margin: 3%;

    }

    #whitebox .info {
        position: absolute;
        word-wrap: break-word;
        word-break: break-word;
        width: 500px;
        right: 0px;
        text-align: right;
        right: 30px;
        margin-top: 30px;
        font-size: 18px;
        border: none;
        background-color: rgb(218, 217, 217);
    }

    #whitebox .head {
        position: relative;
        font-size: 20px;
        padding-left: 30px;
        display: inline-block;
        top: 1px;
    }
</style>

</html>