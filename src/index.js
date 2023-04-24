import { set_type_user } from "./firestoreAPI.js";

function admin(option) {
    switch (option) {
        case 0:
            set_type_user(localStorage.getItem("user_id"),0).then(()=>{console.log("set to borrower");})
            break;
        case 1:
            set_type_user(localStorage.getItem("user_id"),1).then(()=>{console.log("set to publisher");})
            break
        default:
            console.log("input parameter to set type (0 for borrower, 1 for publisher) \nexample: admin(1)");
            break;
    }
}
window.admin = admin

