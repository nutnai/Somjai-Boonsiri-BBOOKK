// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js'
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBV6F6NqvApjZly_gje9mRYh7ZNJk-zb64",
  authDomain: "bbookk-c601f.firebaseapp.com",
  projectId: "bbookk-c601f",
  storageBucket: "bbookk-c601f.appspot.com",
  messagingSenderId: "595959528165",
  appId: "1:595959528165:web:87ae676116f8a67b2a720c",
  measurementId: "G-Z496MR4FJ3"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);