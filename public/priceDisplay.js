function priceDisplay() {
  fetch('./prices.json')
    .then((Response) => Response.json())
    .then(console.log('successfully loaded json'))
    .then((prices) => {
      var price = document.querySelector('#room');
      var totalCost = document.querySelector('#totalCost');
      var totalPrice = prices['value' + price.value];

      totalCost.value = totalPrice;
    });
}
priceDisplay();
