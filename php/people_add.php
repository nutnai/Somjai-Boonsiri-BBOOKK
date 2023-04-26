<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/people_add.css">
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Add</title>
    <script type="module" src="../src/hasTopRightAuth.js"></script>
    <script type="module" src="../src/people_add.js"></script>
</head>
<?php
$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";

$sql = "select * from author";
$connect = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($connect, $sql);

$sql2 = "select * from interpreter";
$result2 = mysqli_query($connect, $sql);
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
        <div id="information">
            <div id="bluebox">
                <p id="personal">Add author</p>
            </div>
            <div id="yellowbox">
                <div id="whitebox">
                    <form method="post" action="./inserter.php" target="_blank">
                        <input type="hidden" name="type" value="add_author">
                        <p class="head">Author firstname :</p>
                        <input type="text" id="author_firstname" name="author_firstname" require class="info" placeholder="Author firstname . . ." pattern="^[A-Za-z0-9]+$">
                        <div class="line"></div>
                        <p class="head">Author lastname :</p>
                        <input type="text" id="author_lastname" name="author_lastname" class="info" placeholder="Author lastname . . ." pattern="^[A-Za-z0-9]+$">
                        <div class="line"></div>
                        <input id="save" type="submit" value="add">
                </div>
            </div>
            </form>
        </div>
        <div id="information2">
            <div id="bluebox">
                <p id="personal">Add Interpreter</p>
            </div>
            <div id="yellowbox">
                <div id="whitebox">
                    <form method="post" action="./inserter.php" target="_blank">
                        <input type="hidden" name="type" value="add_interpreter">
                        <p class="head">Interpreter firstname :</p>
                        <input type="text" id="interpreter_firstname" name="interpreter_firstname" require class="info" placeholder="Interpreter firstname . . ." pattern="^[A-Za-z0-9]+$">
                        <div class="line"></div>
                        <p class="head">interpreter lastname :</p>
                        <input type="text" id="interpreter_lastname" name="interpreter_lastname" class="info" placeholder="Interpreter lastname . . .">
                        <div class="line"></div>
                        <input id="save" type="submit" value="add">
                </div>
            </div>
            </form>
        </div>
        <div id="information3">
            <div id="bluebox">
                <p id="personal">Add Interpreter</p>
            </div>
            <div id="yellowbox">
                <div id="whitebox">
                    <form method="post" action="./inserter.php" target="_blank">
                        <input type="hidden" name="type" value="add_publisher">
                        <p class="head">Publisher Name :</p>
                        <input type="text" id="publisher_name" name="publisher_name" require class="info" placeholder="Publisher Name . . .">
                        <div class="line"></div>
                        <p class="head">Publisher Address :</p>
                        <input type="text" id="publisher_address" name="publisher_address" class="info" placeholder="Publisher Address . . .">
                        <div class="line"></div>
                        <p class="head">Publisher Phone :</p>
                        <input type="text" id="publisher_phone" name="publisher_phone" class="info" placeholder="Publisher Phone . . .">
                        <div class="line"></div>
                        <p class="head">Publisher Email :</p>
                        <input type="text" id="publisher_email" name="publisher_email" class="info" placeholder="Publisher Email . . .">
                        <div class="line"></div>
                        <input id="save" type="submit" value="add">
                </div>
            </div>
            </form>
        </div>

    </div>
    <div id="showpeople">
        <div id="bluebox" style="left: 100px;">
            <p id="personal">Author list</p>
        </div>
        <div id="yellowbox" style="width: 1020px;left: 100px;">
            <div class="wb" id="whitebox2">
                <div id="attibute">
                    <p style="width: 110px;">Id</p>
                    <p style="width: 280px;">Firstname</p>
                    <p style="width: 280px;">Lastname</p>
                </div>
                <?php
                $sql = "select * from author";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $author_id = $row["author_id"];
                    $author_firstname = $row["author_firstname"];
                    $author_lastname = $row["author_lastname"];
                    echo "<div id='row'>
                    <input type='text' style='width: 110px;' value='$author_id' readonly>
                    <input type='text' style='width: 280px;' value='$author_firstname' readonly>
                    <input type='text' style='width: 280px;' value='$author_lastname' readonly name='author'>
                    <input type='button' id='edit' value='edit' onclick='editpeople(this.parentNode)'>
                    <input type='button' id='delete' value='delete' style='background: red;' onclick='deletepeople(this.parentNode)' >
                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div id="showpeople1">
        <div id="bluebox" style="left: 100px;">
            <p id="personal">Interpreter list</p>
        </div>
        <div id="yellowbox" style="width: 1020px;left: 100px;">
            <div class="wb" id="whitebox2">
                <div id="attibute">
                    <p style="width: 110px;">Id</p>
                    <p style="width: 280px;">Firstname</p>
                    <p style="width: 280px;">Lastname</p>
                </div>
                <?php
                $sql = "select * from interpreter";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $interpreter_id = $row["interpreter_id"];
                    $interpreter_firstname = $row["interpreter_firstname"];
                    $interpreter_lastname = $row["interpreter_lastname"];
                    echo "<div id='row'>
                    <input type='text' style='width: 110px;' value='$interpreter_id' readonly>
                    <input type='text' style='width: 280px;' value='$interpreter_firstname' readonly>
                    <input type='text' style='width: 280px;' value='$interpreter_lastname' readonly name='interpreter'>
                    <input type='button' id='edit' value='edit' onclick='editpeople(this.parentNode)'>
                    <input type='button' id='delete' value='delete' style='background: red;' onclick='deletepeople(this.parentNode)'>
                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div id="showpeople2">
        <div id="bluebox" style="left: 100px;">
            <p id="personal">Publisher list</p>
        </div>
        <div id="yellowbox" style="width: 1020px;left: 100px;">
            <div class="wb" id="whitebox2">
                <div id="attibute">
                    <p style="width: 110px;">Id</p>
                </div>
                <?php
                $sql = "select * from publisher";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $publisher_id = $row["publisher_id"];
                    $publisher_name = $row["publisher_name"];
                    $publisher_address = $row["publisher_address"];
                    $publisher_phone = $row["publisher_phone"];
                    $publisher_email = $row["publisher_email"];
                    echo "<div id='row'>
                    <input type='text' style='width: 110px;' value='$publisher_id' readonly>
                    <input type='button' id='edit' value='edit' onclick='editpeople(this.parentNode)'>
                    <input type='button' id='delete' value='delete' style='background: red;' onclick='deletepeople(this.parentNode)' name='interpreter'>
                    <div class='divin'>
                        <p class='head'>Publisher Name :</p>
                        <input type='text' id='publisher_name' value='$publisher_name' class='info' readonly>
                    </div>
                    <div class='divin'>
                        <p class='head'>Publisher Address :</p>
                        <input type='text' id='publisher_address' value='$publisher_address' class='info' readonly>
                    </div>
                    <div class='divin'>
                        <p class='head'>Publisher Phone :</p>
                        <input type='text' id='publisher_phone' value='$publisher_phone' class='info' readonly>
                    </div>
                    <div class='divin'>
                        <p class='head'>Publisher Email :</p>
                        <input type='text' id='publisher_email' value='$publisher_email' class='info' readonly name='publisher'>
                    </div>
                    <div class='line' ></div>
                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var range = document.createRange();

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }

        function editpeople(node) {
            if (node.querySelector("#edit").value == "edit") {
                var t = node.querySelectorAll("input[type='text']");
                for (var i = 1; i < t.length; i++) {
                    t[i].removeAttribute('readonly');
                }
                node.querySelector("#delete").style.display = "none";
                node.querySelector("#edit").value = "save";
                node.querySelector("#edit").style.background = "green";
            } else {
                var t = node.querySelectorAll("input[type='text']");
                t.forEach(element => {
                    element.setAttribute('readonly', true);
                });
                node.querySelector("#delete").style.display = "";
                node.querySelector("#edit").value = "edit";
                node.querySelector("#edit").style.background = "#2a9d8f";

                var t = node.querySelectorAll("input[type='text']");
                var formpost = document.getElementById("formpost");
                var n = t[t.length - 1].name;
                if (n != "publisher") {
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='type' value='edit_" + n + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_id' value='" + t[0].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_firstname' value='" + t[1].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_lastname' value='" + t[2].value + "'>"))
                } else {
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='type' value='edit_" + n + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_id' value='" + t[0].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_name' value='" + t[1].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_address' value='" + t[2].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_phone' value='" + t[3].value + "'>"))
                    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_email' value='" + t[4].value + "'>"))
                }
                formpost.submit();
                location.reload();
            }

        }

        function deletepeople(node) {
            var t = node.querySelectorAll("input[type='text']");
            var n = t[t.length - 1].name;
            var formpost = document.getElementById("formpost");
            formpost.appendChild(range.createContextualFragment("<input type='hidden' name='type' value='delete_" + n + "'>"))
            formpost.appendChild(range.createContextualFragment("<input type='hidden' name='" + n + "_id' value='" + t[0].value + "'>"))
            formpost.submit();
            location.reload();
        }
    </script>
    <form action="./inserter.php" method="post" target="_blank" id="formpost">

    </form>
</body>

</html>
<style>
    #information2 {
        position: absolute;
        top: 450px;
    }

    #information3 {
        position: absolute;
        top: 900px;
    }

    #yellowbox {
        position: absolute;
        width: 845px;
        height: max-content;
        left: 210px;
        top: 250px;

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
        padding-bottom: 50px;
    }

    #whitebox .info {
        word-wrap: break-word;
        word-break: break-word;
        width: 500px;
        position: absolute;
        right: 0px;
        text-align: right;
        right: 30px;
        margin-top: 25px;
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

    #addRatePriceButton {
        position: relative;
        border: none;
        height: 40px;
        width: 40px;
        background-color: rgb(155, 255, 4);
        color: white;
        font-size: 35px;
    }

    #removeRatePriceButton {
        position: relative;
        border: none;
        height: 40px;
        width: 40px;
        background-color: rgb(255, 24, 24);
        color: white;
        font-size: 35px;
    }

    .ratePriceZone {
        position: relative;
        display: inline-block;
        border: 0px;
        background-color: rgb(218, 217, 217);
        font-family: 'Inria Sans';
        font-style: normal;
        font-weight: 300;
        font-size: 24px;
        line-height: 29px;
        color: #1a3244;
        left: 300px;
    }

    .ratePriceZoneText1 {
        position: relative;
        left: 300px;
        display: inline-block;
    }

    .ratePriceZoneText2 {
        position: absolute;
        right: 30px;
        display: inline-block;
    }
</style>