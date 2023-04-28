import { getauth, permission, authed } from "./auth.js"

async function load() {
    if (authed()) {
        var user = JSON.parse(localStorage.getItem("user_detail"))
        console.log("I'm in!");
        if (document.getElementById("auth0") != null) {
            document.getElementById("auth0").style.display = "none"
            document.getElementById("auth1").style.display = ""
            var img = document.createElement("img");
            var image = user.image
            if (!user.image.includes("https")) {
                image = "https://storage.googleapis.com/bbookk-c601f.appspot.com/pf/" + image
            }
            img.src = image
            img.style.width = "100%"
            img.style.height = "100%"
            img.style.borderRadius = "100%"
            document.getElementById("roob").appendChild(img)
            document.getElementById("username").innerHTML = user.firstname + " " + user.lastname
        }
    } else {
        console.log("Please sign in!")
        if (document.getElementById("auth0") != null) {
            document.getElementById("auth0").style.display = ""
            document.getElementById("auth1").style.display = "none"
        }
    }
}
load()
var range = document.createRange();
var formpost = document.getElementById("formposthtr")
if (formpost)
    formpost.appendChild(range.createContextualFragment("<input type='hidden' name='user_id' value='" + JSON.parse(localStorage.getItem("user_detail")).id + "'>"))
async function clickProfile() {
    console.log("click profile!");
    var config = "";
    if (!window.location.href.includes("/php")) config = "/php"
    permission("clickProfile").then((result) => {
        if (result == 0) {
            formpost.setAttribute('action', "." + config + "/profile.php");
        } else if (result == 1) {
            formpost.setAttribute('action', "." + config + "/publisher.php");
        } else {
            window.location.href = "." + config + "/signin.php"
        }
        formpost.submit();
    })

}
window.clickProfile = clickProfile