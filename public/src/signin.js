import { signin, signout ,authed } from "./auth.js";

signout()
function signIn() {
    signin();
    (async() => {
        while(!authed()) {
            console.log("wait...");
            await new Promise(resolve => setTimeout(resolve, 100));
        }
        window.location.href = "../index.html"    
    })();
}

window.signIn = signIn;