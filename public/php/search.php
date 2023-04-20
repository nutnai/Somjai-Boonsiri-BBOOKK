<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

$type1 = ["ชื่อหนังสือ", "ชื่อตอน", "ชื่อผู้แต่ง", "ชื่อผู้แปล", "ชื่อสำนักพิมพ์", "ISBN"];
$keytype = ["ชื่อหนังสือ" => "book_name", "ชื่อตอน" => "book_chapter", "ISBN" => "book_isbn", "ครั้งที่พิมพ์" => "book_edition", "ปีที่พิมพ์" => "book_year", "ราคา" => "book_price", "เท่ากับ" => "=", "มากกว่า" => ">", "น้อยกว่า" => "<", "ชื่อผู้แปล" => "interpreter_name", "ชื่อสำนักพิมพ์" => "publisher_name"];
$postboxadd = "";
$allsql = "";
$sql = "SELECT * FROM book JOIN publisher ON publisher.publisher_id = book.publisher_id";
$writesql = "";
$transql = "";
$result = "";
$show_search = "";
if (isset($_POST['submit'])) {
    $postboxadd = $_POST['postboxadd'];
    echo $postboxadd;
    for ($i = 1; $i <= 4; $i++) {
        $tmp = 'dropbox1' . $i;
        //ดูว่าบล็อกที่มีเลือกค้นจากอะไร
        if (isset($_POST[$tmp])) {
            if ($_POST[$tmp]=="none") continue;
            $show_search .= '<div class="boxandtext" id="_'.$i.'"><select name="dropbox1'.$i.'" class="box" id="box1" onchange="check_number_dropbox(this.parentNode, this.value)"><option value="none">none</option><option value="ชื่อหนังสือ" '.(($_POST[$tmp]=="ชื่อหนังสือ")?"selected":"").'>ชื่อหนังสือ</option><option value="ชื่อตอน" '.(($_POST[$tmp]=="ชื่อตอน")?"selected":"").'>ชื่อตอน</option><option value="ชื่อผู้แต่ง" '.(($_POST[$tmp]=="ชื่อผู้แต่ง")?"selected":"").'>ชื่อผู้แต่ง</option><option value="ชื่อผู้แปล" '.(($_POST[$tmp]=="ชื่อผู้แปล")?"selected":"").'>ชื่อผู้แปล</option><option value="ชื่อสำนักพิมพ์" '.(($_POST[$tmp]=="ชื่อสำนักพิมพ์")?"selected":"").'>ชื่อสำนักพิมพ์</option><option value="ISBN" '.(($_POST[$tmp]=="ISBN")?"selected":"").'>ISBN</option><option value="ครั้งที่พิมพ์" '.(($_POST[$tmp]=="ครั้งที่พิมพ์")?"selected":"").'>ครั้งที่พิมพ์</option><option value="ปีที่พิมพ์" '.(($_POST[$tmp]=="ปีที่พิมพ์")?"selected":"").'>ปีที่พิมพ์</option><option value="ราคา" '.(($_POST[$tmp]=="ราคา")?"selected":"").'>ราคา</option></select></div>';
            if (in_array($_POST[$tmp], $type1)) { //ถ้าเป็นชนิดแรกที่มีแค่กล่องข้อความ
                $tmp1 = "textbox1" . $i;
                if ($_POST[$tmp] == "ชื่อผู้แต่ง") {
                    $writesql = " JOIN book_written ON book.book_id = book_written.book_id JOIN author ON book_written.author_id = author.author_id";
                    $allsql .= " AND author_firstname = " . $_POST[$tmp1] . " OR author_lastname = " . $_POST[$tmp1];
                } else if ($_POST[$tmp] == "ชื่อผู้แปล") {
                    $transql = " JOIN book_translated ON book_translated.book_id = book.book_id JOIN interpreter ON interpreter.interpreter_id = book_translated.interpreter_id";
                    $allsql .= " AND interpreter_firstname = " . $_POST[$tmp1] . " OR interpreter_lastname = " . $_POST[$tmp1];
                } else {
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " = " . $_POST[$tmp1];
                }
            } else { //ถ้าเป็นชิดที่สองต้องใส่ตัวเลข
                if ($_POST[$tmp] == "ช่วง") { //เป็นช่วงที่ใส่สองเลข
                    $tmp1 = "textbox1" . $i;
                    $tmp2 = "textbox2" . $i;
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " BETWEEN " . $_POST[$tmp1] . " AND " . $_POST[$tmp2];
                } else { //เป็นค่าคงที่ที่มีค่าเดียว
                    $tmp1 = "dropbox2" . $i;
                    $tmp2 = "textbox1" . $i;
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " " . $keytype[$_POST[$tmp1]] . " " . $_POST[$tmp2];
                }
            }
        }
    }
    $pos = strpos($allsql, "AND");
    if ($pos !== false) $string = substr_replace($string, "", $pos, 3);
    $sql .= $writesql . $transql . $allsql;

    $result = mysqli_query($connect, $sql);
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/search.css" />
    <link href="https://fonts.googleapis.com/css?family=Inria Sans" rel="stylesheet" />
    <script type="module" src="../src/search.js"></script>
    <script type="module" src="../src/firestoreAPI.js"></script>
    <script type="module" src="../src/hasTopRightAuth.js"></script>

    <title>Search</title>
</head>

<body style="background-color: white;">
    <div id="all">
        <div id="sifah">
            <p id="hua" onclick="window.location.href='../index.html'">BbookK</p>
            <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png"></img>
            <div id="auth1" style="display: none;">
                <div id="roob" onclick="clickProfile()"></div>
                <p id="username"> username</p>
            </div>
            <div id="auth0">
                <!-- <input type="button" value="Admin" id="regis" class="yellow" onclick="window.location.href='./register.html'" /> -->
                <input type="button" value="Log in" id="signin" class="yellow" onclick="window.location.href='./signin.html'"/>
            </div>
        </div>
        <div id="groupsifah2">
            <div id="sifah2">
                <div id="search1">search</div>
                <div id="dropbox">
                    <form action="" id="box">
                        <div id="boxadd">
                            <?php echo $show_search; echo $_POST['dropbox11']?>
                        </div>
                        <input type="submit" name="submit" id="searchbutton" value="Search">

                    </form>
                </div>
            </div>

        </div>
    </div>

    <p id="sorry" class="textSearch" style="display: none;">Sorry, we currently don't have hotels in this location.</p>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Send the form data to a PHP script via AJAX
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: $(this).serialize(),
                success: function(response) {
                    // Update a <div> element on the page with the data from the database
                    $('#myDiv').html(response);
                }
            });
        });
    });
</script>

</html>