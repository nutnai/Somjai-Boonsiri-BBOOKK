// // Import the functions you need from the SDKs you need

import { GoogleAuthProvider, signInWithPopup, getAuth, signOut, setPersistence, inMemoryPersistence, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-auth.js";
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js';
import { getFirestore, collection, getDocs } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-firestore.js';
import { get_user, add_user } from "./firestoreAPI.js";

// web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyBV6F6NqvApjZly_gje9mRYh7ZNJk-zb64",
    authDomain: "bbookk-c601f.firebaseapp.com",
    databaseURL: "https://bbookk-c601f-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "bbookk-c601f",
    storageBucket: "bbookk-c601f.appspot.com",
    messagingSenderId: "595959528165",
    appId: "1:595959528165:web:87ae676116f8a67b2a720c",
    measurementId: "G-Z496MR4FJ3"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);


//! Config ////////////////////////////////////////////////////////////
export function signin() {
    const auth = getAuth();
    const provider = new GoogleAuthProvider();
    signInWithPopup(auth, provider)
        .then((result) => {
            console.log(result.user.uid);
            var fullname = result.user.displayName.split(" ");
            console.log(fullname[0]+" "+fullname[fullname.length - 1]);
            get_user(result.user.uid).then((user) => {
                if (user !== undefined) {
                    console.log("welcome back, " + user.firstname + " " + user.lastname);
                    localStorage.setItem("isAuth", "yes");
                    localStorage.setItem("user_detail",JSON.stringify({id:user.id, firstname:fullname[0], lastname:fullname[fullname.length - 1], image:user.image, birthday:user.birthday, phone:user.phoneNumber, email:user.email}))
                } else {
                    console.log("First time? welcome, " + result.user.displayName);
                    add_user(result.user.uid, fullname[0], fullname[fullname.length - 1] , result.user.photoURL, 0).then((result) => {
                        localStorage.setItem("isAuth", "yes");
                    localStorage.setItem("user_detail",JSON.stringify({id:result.user.uid, firstname:fullname[0], lastname:fullname[fullname.length - 1], image:user.image, birthday:user.birthday, phone:user.phoneNumber, email:user.email}))
                    })
                }
            })
        }).catch((error) => {
            console.log(error);
        });
}
window.signin = signin;

export function signout() {
    if (!localStorage.getItem("isAuth")) {
        console.log("please sign in");
    } else {
        const auth = getAuth()
        signOut(auth).then(() => {
            console.log("see you later");
            localStorage.removeItem("isAuth");
            localStorage.removeItem("user_detail");
        }).catch((error) => {

        });
    }
}
window.signout = signout;

export function getauth() {
    if (!authed) {
        console.log("please sign in");
        return null;
    } else {
        var auth = getAuth();
        console.log("I am " + auth.currentUser.displayName);
        return auth;
    }
}
window.getauth = getauth;

export async function permission(activity) {
    var ret = -1;
    const auth = getAuth();
    if (auth.currentUser == null) return ret;
    await get_user(auth.currentUser.uid).then((result) => {
        if (result == null) return ret;
        const type = result.type
        localStorage.setItem("isAuth", "yes");
        localStorage.setItem("user_id", result.id)
        switch (activity) {
            case "clickProfile":
                ret = type;
                break;
            case "publisher":
                ret = type == 2
                break
            case "borrower":
                ret = type == 1
                break
            default:
                ret = -1;
                break;
        }
    })
    return ret;
}

export function authed() {
    return localStorage.getItem("isAuth") && localStorage.getItem("user_detail")
}