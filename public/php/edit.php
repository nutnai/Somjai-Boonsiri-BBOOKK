<!DOCTYPE html>
<html lang="en">
<?php
    $book_id = 2; //explode("?", $_SERVER["PHP_SELF"])[1];

    $servername = "localhost";
    $username = "id20576360_learnjapannutnai";
    $password = "wn3V%=/uMYin&|o2";
    $dbname = "id20576360_bbookk";

    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $sql ="SELECT book.*, author.author_firstname, interpreter.interpreter_firstname,author.author_lastname,interpreter.interpreter_lastname FROM book LEFT JOIN book_written ON book.book_id = book_written.book_id LEFT JOIN author ON book_written.author_id = author.author_id LEFT JOIN book_translated ON book.book_id = book_translated.book_id LEFT JOIN interpreter ON book_translated.interpreter_id = interpreter.interpreter_id where book.book_id = $book_id
    ";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $book_name = $row["book_name"];
    $book_chapter = $row["book_chapter"];
    $book_isbn = $row["book_isbn"];
    $book_numberofpages = $row["book_number_of_pages"];
    $book_writtendate = $row["book_year"];
    $book_price = $row["book_price"];
    $book_edition = $row["book_edition"];
    $book_language = $row["book_language"];
    $book_summary = $row["book_summary"];
    $author_fname = $row["author_firstname"];
    $author_lname = $row["author_lastname"];
    $interpeter_fname = $row["interpreter_firstname"];
    $interpeter_lname = $row["interpreter_lastname"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../css/edit.css">
  <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit book</title>
  <script type="module" src="../src/hasTopRightAuth.js"></script>
  <script type="module" src="../src/edit.js"></script>
</head>

<body>
  <div id="sifah">
    <p id="hua" onclick="window.location.href='../index.html'" onclick="window.location.href='../index.html'">
      BbookK
    </p>

    <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

    </img>
    <div id="auth1"  style="display: none;">

      <div id="roob" onclick="clickProfile()">
      </div>
      <p id="username"> username</p>

    </div>
    <div id="auth0">
      <!-- <input type="button" value="Register" id="regis" class="yellow"
        onclick="window.location.href='../register.html'" /> -->
      <input type="button" value="Sign in" id="signin" class="yellow" onclick="window.location.href='../signin.html'" />
    </div>
    <p id="personal">About Hotel</p>
    <div id="information">
      <div id="yellowbox">
        <div id="whitebox">
          <p class="head">Book Name :</p>
          <input type="text" class="info" placeholder="Book Name . . ." value="<?php echo $book_name ?>"></p>
          <div class="line"></div>
          <p class="head">Book Chapter :</p>
          <input type="text" class="info" placeholder="Book Chapter . . ." value="<?php echo $book_chapter ?>"></p>
          <div class="line"></div>
          <p class="head">Book ISBN :</p>
          <input type="text" class="info" placeholder="Book ISBN . . ." value="<?php echo $book_isbn ?>"></p>
          <div class="line"></div>
          <p class="head">Book Number Of Pages :</p>
          <input type="text" class="info" placeholder="Book Number Of Pages . . ." value="<?php echo $book_numberofpages ?>"></p>
          <div class="line"></div>
          <p class="head">Book Wrtitten date :</p>
          <input type="text" class="info" placeholder="Book Wrtitten date . . ." value="<?php echo $book_writtendate ?>"></p>
          <div class="line"></div>
          <p class="head">Book Price :</p>
          <input type="text" class="info" placeholder="Book Price . . ." value="<?php echo $book_price ?>"></p>
          <div class="line"></div>
          <p class="head">Book Edition :</p>
          <input type="text" class="info" placeholder="Book Edition . . ." value="<?php echo $book_edition ?>"></p>
          <div class="line"></div>
          <p class="head">Book Language :</p>
          <input type="text" class="info" placeholder="Book Language . . ." value="<?php echo $book_language ?>"></p>
          <div class="line"></div>
          <p class="head">Book Summary :</p>
          <input type="text" class="info" placeholder="Book Sunmmary . . ." value="<?php echo $book_summary ?>"></p>
          <div class="line"></div>
          <p class="head">Author firstname :</p>
          <input type="text" class="info" placeholder="Author firstname . . ." value="<?php echo $author_fname ?>"></p>
          <div class="line"></div>
          <p class="head">Author lastname :</p>
          <input type="text" class="info" placeholder="Author lastname . . ." value="<?php echo $author_lname ?>"></p>
          <div class="line"></div>
          <p class="head">Interpeter firstname :</p>
          <input type="text" class="info" placeholder="Interpreter firstname . . ." value="<?php echo $interpeter_fname ?>"></p>
          <div class="line"></div>
          <p class="head">Interpeter lastname :</p>
          <input type="text" class="info" placeholder="Interpreter lastname . . ." value="<?php echo $interpeter_lname ?>"></p>
          <div class="line"></div>
          
          <!-- <p class="head">Rate price :</p>
          <input type="button" id="addRatePriceButton" value="+" onclick="zone('ratePriceZone','add')">
          <input type="button" id="removeRatePriceButton" value="-" onclick="zone('ratePriceZone','remove')">
          <div id="ratePriceZone">
            <div>
              <input type="number" class="ratePriceZone"  style="width: 50px;">
              <p class="ratePriceZoneText1">person(s)</p>
              <input type="number" class="ratePriceZone" >
              <p class="ratePriceZoneText2">baht</p>
            </div>
          </div> -->
          <div class="line"></div>
          <div class="headd">
            <p class="head">Image :</p>
          <input type="file" id="image-upload" name="image-upload" accept="image/*" multiple>
          </div>
          <input id="save"type="button" value="save" onclick="save()">
        </div>
      </div>
    </div>
  </div>
  <input type="button" id="delete" value="delete hotel" style="display: none;" onclick="document.getElementById('all').style.display='';document.getElementById('booked').style.display=''";>
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
</body>

</html>
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
    width: 500px;
    position: absolute;
    right: 0px;
    display: inline-block;
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


</body>

</html>