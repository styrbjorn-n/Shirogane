function send() {
  var arrivalDate = document.getElementById('arrivalDate').value;
  var departureDate = document.getElementById('departureDate').value;
  // console.log(arrivalDate);
  // console.log(departureDate);
  if (arrivalDate && departureDate) {
    var data = new FormData();
    data.append('arrival', arrivalDate);
    data.append('departure', departureDate);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', 'dateChecker.php', true);
    xmlhttp.setRequestHeader(
      'Content-Type',
      'application/x-www-form-urlencoded'
    );

    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        console.log(xmlhttp.responseText);
      }
    };
    xmlhttp.send(data);
  }
}
