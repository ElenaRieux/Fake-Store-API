document.addEventListener("DOMContentLoaded", function () {
  const priceElements = document.querySelectorAll(".item-container.price span");

  const costSpan = document.querySelector(".item-container.cost span");

  let totalPrice = 0;

  priceElements.forEach((element) => {
    const priceText = element.textContent.trim().replace("$", "");
    const quantityInput = element
      .closest(".cart-container")
      .querySelector('input[type="number"]');
    const quantity = parseInt(quantityInput.value);
    const price = parseFloat(priceText);
    const totalProductPrice = price * quantity;
    totalPrice += totalProductPrice;
  });

  totalPrice = totalPrice.toFixed(2);

  costSpan.textContent = "Total: " + totalPrice + " $";
});

const numberInputs = document.querySelectorAll('input[type="number"]');

numberInputs.forEach((input) => {
  input.addEventListener("input", function (event) {
    const newValue = event.target.value;
    console.log("Nuovo valore:", newValue);
  });
});
