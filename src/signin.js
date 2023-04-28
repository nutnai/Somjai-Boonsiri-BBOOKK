import { signin, signout ,authed } from "./auth.js";
var range = document.createRange();
signout()
function signIn() {
    signin();
    (async() => {
        while(!authed()) {
            console.log("wait...");
            await new Promise(resolve => setTimeout(resolve, 100));
        }
        var formpost = document.getElementById("formpost")
        const user = JSON.parse(localStorage.getItem("user_detail"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_id' value='"+user.id+"' >"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_firstname' value='"+user.firstname+"' >"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_lastname' value='"+user.lastname+"' >"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_birthday' value='"+user.birthday+"' >"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_phone' value='"+user.phone+"' >"))
        formpost.appendChild(range.createContextualFragment("<input type='hidden' name='borrower_email' value='"+user.email+"' >"))
        formpost.submit();
        window.location.href = "../index.html"    
    })();
}

window.signIn = signIn;