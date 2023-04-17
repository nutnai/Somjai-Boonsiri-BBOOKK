function refresh() {
    
}

function clickSearch() {
  var where = document.getElementById("w").value;
  var people = document.getElementById("people").value;
  var date = document.getElementById("patitin").value;
  if (people == "") people = "1"
  if (date == ""){
    const dateNow = new Date();
    date = dateNow.getUTCFullYear()+"-"+(dateNow.getUTCMonth()+1)+"-"+dateNow.getUTCDate();
}
  if (where != "") window.location.href = './search.html?' + where + "&" + people+"&"+date;
}
window.clickSearch = clickSearch;

getDBHotel();
//result[i]["price"]["number_of_customer"];
function selectHotel(node) {
  var people = document.getElementById("people").value;
  var date = document.getElementById("patitin").value;
  window.location.href = 'detail.html?' + node.children.item(0).innerHTML +"&"+ people+"&"+date;
}
window.selectHotel = selectHotel;