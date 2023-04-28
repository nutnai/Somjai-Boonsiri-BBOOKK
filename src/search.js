import { getauth, permission, authed } from "./auth.js"

var type1 = ["ชื่อหนังสือ", "ชื่อตอน", "ชื่อผู้แต่ง", "ชื่อผู้แปล", "ชื่อสำนักพิมพ์", "ISBN"]
var type2 = ["ครั้งที่พิมพ์", "ปีที่พิมพ์", "ราคา"]
var type3 = ["เท่ากับ", "มากกว่า", "น้อยกว่า", "ช่วง"]
var bigbox = document.getElementById("boxadd")

//for new node
var range = document.createRange();

async function check_number_dropbox(node, value) {
    var node_id = node.id.charAt(node.id.length - 1);
    //new node
    var newbox2 = range.createContextualFragment('<select name="dropbox2' + node_id + '" class="box" id="box2" onchange="select_dropbox2(this.parentNode, this.value)"><option value="เท่ากับ">เท่ากับ</option><option value="มากกว่า">มากกว่า</option><option value="น้อยกว่า">น้อยกว่า</option><option value="ช่วง">ช่วง</option></select>')

    //element
    var number_children = bigbox.children.length
    var box1 = node.querySelector("#box1")
    var box2 = node.querySelector("#box2")
    var textbox1 = node.querySelector("#textbox1")
    var textbox2 = node.querySelector("#textbox2")
    var to = node.querySelector("#to")
    if (value == "none") {
        node.remove()
        maximum_dropbox()
    } else if (type1.indexOf(value) != -1) {
        await reset_node(new Array(box2, textbox1, textbox2, to));
        node.appendChild(kid(value, node_id));
        maximum_dropbox()
    } else {
        await reset_node(new Array(box2, textbox1, textbox2, to))
        node.appendChild(newbox2)
        node.appendChild(newtextbox1)
        maximum_dropbox()
    }
}
window.check_number_dropbox = check_number_dropbox;

function kid(value, node_id) {
    if (value == "ชื่อหนังสือ") {
        return range.createContextualFragment('<input list="' + "book_list" + '" type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
    } else if (value == "ชื่อผู้แต่ง") {
        return range.createContextualFragment('<input list="' + "author_list" + '" type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
    } else if (value == "ชื่อผู้แปล") {
        return range.createContextualFragment('<input list="' + "interpreter_list" + '" type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
    } else if (value == "ชื่อสำนักพิมพ์") {
        return range.createContextualFragment('<input list="' + "publisher_list" + '" type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
    }
    else return range.createContextualFragment('<input type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
}

async function select_dropbox2(node, value) {
    var node_id = node.id.charAt(node.id.length - 1);
    //new node
    var newtextbox1 = range.createContextualFragment('<input type="text" name="textbox1' + node_id + '" class="textbox" id="textbox1" required>')
    var newtextbox2 = range.createContextualFragment('<input type="text" name="textbox2' + node_id + '" class="textbox" id="textbox2" required>')
    var newto = range.createContextualFragment('<p name="to' + node_id + '" id="to">to</p>')

    //element
    var textbox1 = node.querySelector("#textbox1")
    var textbox2 = node.querySelector("#textbox2")
    var to = node.querySelector("#to")
    if (value == "ช่วง") {
        await reset_node(new Array(textbox1, textbox2, to))
        node.appendChild(newtextbox1)
        node.appendChild(newto)
        node.appendChild(newtextbox2)
    } else {
        await reset_node(new Array(textbox1, textbox2, to))
        node.appendChild(newtextbox1)
    }
}
window.select_dropbox2 = select_dropbox2;

function reset_node(list) {
    list.forEach(node => {
        if (node != null)
            node.remove()
    });
}
function maximum_dropbox() {
    var count = bigbox.childElementCount
    var last_dropbox = count != 0 ? bigbox.lastElementChild.querySelector("#box1").value : 1
    if (count < 4 && last_dropbox != "none") {
        for (var number = 1; number <= 4; number++) {
            if (!bigbox.querySelector("#_" + number)) {
                bigbox.appendChild(range.createContextualFragment('<div class="boxandtext" id="_' + number + '"><select name="dropbox1' + number + '" class="box" id="box1" onchange="check_number_dropbox(this.parentNode, this.value)"><option value="none">none</option><option value="ชื่อหนังสือ">ชื่อหนังสือ</option><option value="ชื่อตอน">ชื่อตอน</option><option value="ชื่อผู้แต่ง">ชื่อผู้แต่ง</option><option value="ชื่อผู้แปล">ชื่อผู้แปล</option><option value="ชื่อสำนักพิมพ์">ชื่อสำนักพิมพ์</option><option value="ISBN">ISBN</option><option value="ครั้งที่พิมพ์">ครั้งที่พิมพ์</option><option value="ปีที่พิมพ์">ปีที่พิมพ์</option><option value="ราคา">ราคา</option></select></div>'))
                break;
            }
        }

    }
}
maximum_dropbox()

function selectbook(node) {
    var book_id = node.querySelector("#idbook").value
    var formpost = document.getElementById("formpost");
    document.getElementById("book_idpost").value = book_id;
    permission("clickProfile").then((result) => {
        if (result == 1) {
            formpost.setAttribute('action', "./book_edit.php");
        } else {
            formpost.setAttribute('action', "./detail.php");
        }
        formpost.submit();
    })
}
window.selectbook = selectbook;