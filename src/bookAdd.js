import { upload_image } from "./firestoreAPI.js";
console.log("js");
var range = document.createRange();

async function uploadImage() {
    var form = document.getElementById("form");
    var file = document.getElementById("image-upload").files
    console.log(file);
    var image_name_list = ["defult.png"];
    if (form.checkValidity()) {
        document.getElementById("all").style.display = '';
        document.getElementById("booked").style.display = 'none';
        document.getElementById("upload").style.display = 'none';
        document.getElementById("finish").style.display = 'none';
        if (file.length > 0) {
            localStorage.setItem("upload_detail", "0")
            document.getElementById("upload").style.display = '';
            document.getElementById("finish").style.display = 'none';
            var upload1 = document.getElementById("upload1");
            var upload2 = document.getElementById("upload2");
            var c = true;
            console.log("file>0");
            upload_image(file).then((result) => {
                image_name_list = result;
            });
            (async () => {
                while (c) {
                    console.log("hahah");
                    var upload_detail = parseInt(localStorage.getItem("upload_detail"))
                    var percent = ((upload_detail / file.length) * 100).toFixed(2)
                    upload1.innerHTML = upload_detail + "/" + file.length
                    upload2.innerHTML = percent + "%"
                    if (upload_detail == file.length) c = false;
                    await new Promise(resolve => setTimeout(resolve, 1000));
                }
                localStorage.setItem("add", "no")
                image_name_list.forEach(element => {
                    console.log(element);
                    form.appendChild(range.createContextualFragment("<input type='hidden' name='book_image[]' value='" + element + "'>"))
                });
                document.getElementById("upload").style.display = 'none';
                document.getElementById("finish").style.display = '';
                form.submit();
            })();
        } else {
            localStorage.setItem("add", "no")
            await (() => {
                image_name_list.forEach(element => {
                    form.appendChild(range.createContextualFragment("<input type='hidden' name='book_image[]' value='" + element + "'>"))
                });
            })();
            document.getElementById("upload").style.display = 'none';
            document.getElementById("finish").style.display = '';
            form.submit();
        }

    } else {
        alert("Please fill out all required fields.");
    }
}
window.uploadImage = uploadImage