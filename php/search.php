<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "id20576360_learnjapannutnai";
$password = "wn3V%=/uMYin&|o2";
$dbname = "id20576360_bbookk";
$connect = mysqli_connect($servername, $username, $password, $dbname);

$type1 = ["ชื่อหนังสือ", "ชื่อตอน", "ชื่อผู้แต่ง", "ชื่อผู้แปล", "ชื่อสำนักพิมพ์", "ISBN"];
$keytype = ["ชื่อหนังสือ" => "book.book_name", "ชื่อตอน" => "book.book_chapter", "ISBN" => "book.book_isbn", "ครั้งที่พิมพ์" => "book.book_edition", "ปีที่พิมพ์" => "book.book_year", "ราคา" => "book.book_price", "เท่ากับ" => "=", "มากกว่า" => ">", "น้อยกว่า" => "<", "ชื่อผู้แปล" => "interpreter.interpreter_name", "ชื่อสำนักพิมพ์" => "publisher.publisher_name"];
$postboxadd = "";
$allsql = "";
$sql = "SELECT book.*, publisher.* FROM book JOIN publisher ON publisher.publisher_id = book.publisher_id";
$writesql = "";
$wheresql = "";
$transql = "";
$result = null;
$show_search = "";
if (isset($_POST['submit'])) {
    $postboxadd = $_POST['postboxadd'];
    echo $postboxadd;
    for ($i = 1; $i <= 4; $i++) {
        $tmp = 'dropbox1' . $i;
        //ดูว่าบล็อกที่มีเลือกค้นจากอะไร
        if (isset($_POST[$tmp])) {
            if ($_POST[$tmp] == "none") continue;
            $wheresql = " WHERE";
            $show_search .= '<div class="boxandtext" id="_' . $i . '"><select name="dropbox1' . $i . '" class="box" id="box1" onchange="check_number_dropbox(this.parentNode, this.value)"><option value="none">none</option><option value="ชื่อหนังสือ" ' . (($_POST[$tmp] == "ชื่อหนังสือ") ? "selected" : "") . '>ชื่อหนังสือ</option><option value="ชื่อตอน" ' . (($_POST[$tmp] == "ชื่อตอน") ? "selected" : "") . '>ชื่อตอน</option><option value="ชื่อผู้แต่ง" ' . (($_POST[$tmp] == "ชื่อผู้แต่ง") ? "selected" : "") . '>ชื่อผู้แต่ง</option><option value="ชื่อผู้แปล" ' . (($_POST[$tmp] == "ชื่อผู้แปล") ? "selected" : "") . '>ชื่อผู้แปล</option><option value="ชื่อสำนักพิมพ์" ' . (($_POST[$tmp] == "ชื่อสำนักพิมพ์") ? "selected" : "") . '>ชื่อสำนักพิมพ์</option><option value="ISBN" ' . (($_POST[$tmp] == "ISBN") ? "selected" : "") . '>ISBN</option><option value="ครั้งที่พิมพ์" ' . (($_POST[$tmp] == "ครั้งที่พิมพ์") ? "selected" : "") . '>ครั้งที่พิมพ์</option><option value="ปีที่พิมพ์" ' . (($_POST[$tmp] == "ปีที่พิมพ์") ? "selected" : "") . '>ปีที่พิมพ์</option><option value="ราคา" ' . (($_POST[$tmp] == "ราคา") ? "selected" : "") . '>ราคา</option></select>';
            if (in_array($_POST[$tmp], $type1)) { //ถ้าเป็นชนิดแรกที่มีแค่กล่องข้อความ
                $tmp1 = "textbox1" . $i;
                $show_search .= '<input type="text" name="textbox1' . $i . '" class="textbox" id="textbox1" value="' . $_POST[$tmp1] . '" required>';
                if ($_POST[$tmp] == "ชื่อผู้แต่ง") {
                    $writesql = " JOIN book_written ON book.book_id = book_written.book_id JOIN author ON book_written.author_id = author.author_id";
                    $allsql .= " AND author_firstname = '" . $_POST[$tmp1] . "' OR author_lastname = '" . $_POST[$tmp1] . "'";
                } else if ($_POST[$tmp] == "ชื่อผู้แปล") {
                    $transql = " JOIN book_translated ON book_translated.book_id = book.book_id JOIN interpreter ON interpreter.interpreter_id = book_translated.interpreter_id";
                    $allsql .= " AND interpreter_firstname = '" . $_POST[$tmp1] . "' OR interpreter_lastname = '" . $_POST[$tmp1] . "'";
                } else {
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " = '" . $_POST[$tmp1] . "'";
                }
            } else { //ถ้าเป็นชิดที่สองต้องใส่ตัวเลข
                $tmp = 'dropbox2' . $i;
                if ($_POST[$tmp] == "ช่วง") { //เป็นช่วงที่ใส่สองเลข
                    $tmp1 = "textbox1" . $i;
                    $tmp2 = "textbox2" . $i;
                    $tmp3 = "dropbox2" . $i;
                    $show_search .= '<select name="dropbox2' . $i . '" class="box" id="box2" onchange="select_dropbox2(this.parentNode, this.value)"><option value="เท่ากับ" ' . (($_POST[$tmp3] == "เท่ากับ") ? "selected" : "") . '>เท่ากับ</option><option value="มากกว่า" ' . (($_POST[$tmp3] == "มากกว่า") ? "selected" : "") . '>มากกว่า</option><option value="น้อยกว่า" ' . (($_POST[$tmp3] == "น้อยกว่า") ? "selected" : "") . '>น้อยกว่า</option><option value="ช่วง" ' . (($_POST[$tmp3] == "ช่วง") ? "selected" : "") . '>ช่วง</option></select>';
                    $show_search .= '<input type="text" name="textbox1' . $i . '" class="textbox" id="textbox1" value="' . $_POST[$tmp1] . '" required>';
                    $show_search .= '<p name="to' . $i . '" id="to">to</p>';
                    $show_search .= '<input type="text" name="textbox2' . $i . '" class="textbox" id="textbox2" value="' . $_POST[$tmp2] . '" required>';
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " BETWEEN " . $_POST[$tmp1] . " AND " . $_POST[$tmp2];
                } else { //เป็นค่าคงที่ที่มีค่าเดียว
                    $tmp1 = "dropbox2" . $i;
                    $tmp2 = "textbox1" . $i;
                    $show_search .= '<select name="dropbox2' . $i . '" class="box" id="box2" onchange="select_dropbox2(this.parentNode, this.value)"><option value="เท่ากับ" ' . (($_POST[$tmp1] == "เท่ากับ") ? "selected" : "") . '>เท่ากับ</option><option value="มากกว่า" ' . (($_POST[$tmp1] == "มากกว่า") ? "selected" : "") . '>มากกว่า</option><option value="น้อยกว่า" ' . (($_POST[$tmp1] == "น้อยกว่า") ? "selected" : "") . '>น้อยกว่า</option><option value="ช่วง" ' . (($_POST[$tmp1] == "ช่วง") ? "selected" : "") . '>ช่วง</option></select>';
                    $show_search .= '<input type="text" name="textbox1' . $i . '" class="textbox" id="textbox1" value="' . $_POST[$tmp2] . '" required>';
                    $allsql .= " AND " . $keytype[$_POST[$tmp]] . " " . $keytype[$_POST[$tmp1]] . " " . $_POST[$tmp2];
                }
            }
            $show_search .= "</div>";
        }
    }
    $pos = strpos($allsql, "AND");
    if ($pos !== false) $allsql = substr_replace($allsql, "", $pos, 3);
}
$sql .= $wheresql . $writesql . $transql . $allsql;
$result = mysqli_query($connect, $sql);

$sql = "select * from author";
$result_author = mysqli_query($connect, $sql);

$sql = "select * from interpreter";
$result_interpreter = mysqli_query($connect, $sql);

$sql = "select * from publisher";
$result_publisher = mysqli_query($connect, $sql);

$sql = "select * from book";
$result_book = mysqli_query($connect, $sql);
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
    <script type="module" src="../src/auth.js"></script>

    <title>Search</title>
</head>
<form action="" method="post" id="formposthtr"></form>

<body style="background-color: #fff7e6;">
    <datalist id="author_list">
        <?php
        while ($row_author = mysqli_fetch_assoc($result_author)) {
            $author_firstname = $row_author["author_firstname"];
            $author_lastname = $row_author["author_lastname"];
            echo "<option value='$author_firstname'>";
        }
        ?>
    </datalist>
    <datalist id="interpreter_list">
        <?php
        while ($row_interpreter = mysqli_fetch_assoc($result_interpreter)) {
            $interpreter_firstname = $row_interpreter["interpreter_firstname"];
            $interpreter_lastname = $row_interpreter["interpreter_lastname"];
            echo "<option value='$interpreter_firstname'>";
        }
        ?>
    </datalist>
    <datalist id="publisher_list">
        <?php
        while ($row_publisher = mysqli_fetch_assoc($result_publisher)) {
            $publisher_firstname = $row_publisher["publisher_name"];
            echo "<option value='" . $publisher_firstname . "'>";
        }
        ?>
    </datalist>
    <datalist id="book_list">
        <?php
        while ($row_book = mysqli_fetch_assoc($result_book)) {
            $book_name = $row_book["book_name"];
            echo "<option value='" . $book_name . "'>";
        }
        ?>
    </datalist>
    <div id="all">
        <div id="sifah">
            <img id="logo" src="https://storage.googleapis.com/bbookk-c601f.appspot.com/lg/logo.png" onclick="window.location.href='../index.html'"></img>
            <div id="auth1" style="display: none;">
                <div id="roob" onclick="clickProfile()">

                </div>
                <p id="username"> username</p>
            </div>
            <div id="auth0">
                <!-- <input type="button" value="Admin" id="regis" class="yellow" onclick="window.location.href='./register.html'" /> -->
                <input type="button" value="Log in" id="signin" class="yellow" onclick="window.location.href='./signin.php'" />
            </div>
        </div>
        <div id="groupsifah2">
            <div id="sifah2">
                <div id="search1">search</div>
                <div id="dropbox">
                    <form method="post" action="./search.php" id="box">
                        <div id="boxadd">
                            <?php echo $show_search; ?>
                        </div>
                        <input type="submit" name="submit" id="searchbutton" value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    // echo $sql;

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

        $sql = "select * from book_image where book_id = '$book_id'";
        $result_image = mysqli_query($connect, $sql);
        $row_image = mysqli_fetch_assoc($result_image);
        $image_id = $row_image["image_id"];
        echo '<div class="block" onclick="selectbook(this)">
            <input type="hidden" id="idbook" value="' . $book_id . '">
            <div id="roop" style="display: flex;justify-content: center;align-items: center;"><img style="height:100%;border-radius: 7px"src="https://storage.googleapis.com/bbookk-c601f.appspot.com/bk/' . $image_id . '"></img></div>
            <div id="lowname">
            ' . $show_data . '
            </div>
        </div>';
    }

    ?>

    <p id="sorry" class="textSearch" style="display: none;">Sorry, we currently don't have hotels in this location.</p>

    <form action="./detail.php" method="post" target="_blank" id="formpost">
        <input type="hidden" name="book_id" value="" id="book_idpost">
    </form>
</body>

</html>