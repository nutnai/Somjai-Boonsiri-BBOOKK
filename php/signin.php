<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <script type="module" src="../src/signin.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Inria Sans' rel='stylesheet'>
    <title>Sign in</title>
</head>

<body>
    <div id="sifah">
        <p id="hua" onclick="window.location.href='../index.html'">BbookK</p>

        <img id="home" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_home.png">

        </img>
    </div>
    <div id="sifah2"></div>
    <div id="huasignin">
        <!-- <input type="text" placeholder="Sing in" id="huasigninjing"> -->
        <div>
            <p id="huasigninjing">Sign in</p>
        </div>
    </div>
    <div id="roob">
        <img id="person" src="https://storage.googleapis.com/travalokail-55abf.appspot.com/lg/lg_blackPerson.png">

        </img>
    </div>
    <div id="saimail">
        <input type="text" placeholder="Email or phone number" id="saijing">
    </div>
    <div id="saipass">
        <input type="text" placeholder="Password" id="saipassjing">
    </div>
    <input type="button" value="sign in" id="login" onclick="window.location.href='../index.html'">
    <input type="button" value="Sign in with Google" id="signingoogle" onclick="signIn()">

</body>

</html>