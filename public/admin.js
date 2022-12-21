function displayCurentPrice() {
  fetch('./prices.json')
    .then((Response) => Response.json())
    .then(console.log('successfully loaded json'))
    .then((prices) => {
      var priceDisplays = document.querySelectorAll('.priceDisplay');
      var i = 1;
      priceDisplays.forEach((display) => {
        display.innerHTML = prices['value' + i];
        i++;
      });
      console.log('successfully printed json');
    });
}
displayCurentPrice();
