// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js';
import { getStorage, ref, uploadBytesResumable, getDownloadURL } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-storage.js';
import { getFirestore, query, collection, getDocs, doc, setDoc, addDoc, where, getDoc, updateDoc, orderBy, deleteDoc } from 'https://www.gstatic.com/firebasejs/9.14.0/firebase-firestore.js';
import { MD5 } from './MD5.js';

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
const db = getFirestore(app);

//! Config //////////////////////////////////////////////////////////////////////////////////////////////////////////get

//ดูข้อมูลผู้ใช้จากไอดี
export async function get_user(id_user) {
    const userSnapshot = await getDoc(doc(db, "user_list", id_user));
    var ret = userSnapshot.data()
    if (ret !== undefined) ret["id"] = userSnapshot.id
    return ret;
}
// get_user("UsAaanGHf6fFWRXk9n17arcykZt1").   then((result)=>{console.log(result);})
////////////////////////////////////////config
//user
export async function add_user(id_user, type, image) {

    if (id_user != null) {
        await setDoc(doc(db, "user_list", id_user), {
            type: type,
            image: image,
        });
        console.log("create new user!");
    } else {
        await addDoc(collection(db, "user_list"), {
            type: type,
            image: image
        });
    }
}
function tuser() {
    var id_user = "test1"
    var type = 1;
    var image = "pf_deww.jpg";
    add_user(id_user, type, image);
}
window.tuser = tuser;
////////////////////////////////////////////////////////////////////////////////////////////////set
export async function set_type_user(id_user, option) {
    await updateDoc(doc(db, "user_list", id_user), {
        type: option
    })
}
/////////////////////////////////////////////////////////////////////////////////////////////////delete

///////////////////////////////////////////////////////////////////////////////////////////storage

export async function upload_image(file) {
    const storage = getStorage(app);
    var date = new Date();
    var time = date.getTime()
    var ret = []
    const metadata = {
        contentType: 'image/jpeg',
        acl: [{
            "entity": "allUsers",
            "role": "READER"
        }]
    };

    // Create the upload options object
    localStorage.setItem("upload_detail", "0")
    for (let i = 0; i < file.length; i++) {
        const img = file[i];
        const nameImg = "ht_" + MD5(img.name + time) + ".jpg";
        ret.push(nameImg)
        var storageRef = ref(storage, "ht/" + nameImg);
        var uploadTask = uploadBytesResumable(storageRef, img, metadata);
        uploadTask.on('state_changed',
            (snapshot) => {
                const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                console.log('Upload is ' + progress + '% done');
                switch (snapshot.state) {
                    case 'paused':
                        console.log('Upload is paused');
                        break;
                    case 'running':
                        console.log('Upload is running');
                        break;
                }
            },
            (error) => {
                console.log(error);
            },
            () => {
                getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
                    var n = parseInt(localStorage.getItem("upload_detail")) + 1;
                    localStorage.setItem("upload_detail", n)
                    console.log();
                });
            }
        );
    }
    return ret;

}
// getstorage();