document.addEventListener("DOMContentLoaded", function () {
  fetchData("https://fakestoreapi.com/products");

  function addCart() {
    const addToCartButtons = document.querySelectorAll(".prodotti button");

    addToCartButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        const productDiv = event.target.closest(".prodotti");
        const productId = productDiv.id;
        const quantityInput = productDiv.querySelector(".count");
        const quantity = quantityInput.value;

        if (quantityInput.classList.contains("adding")) {
          const data = {
            idProdotto: productId,
            quantita: quantity,
          };

          fetch("include/aggiungi_carrello.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
          })
            .then((response) => {
              if (!response.ok) {
                throw new Error("Errore durante l'aggiunta al carrello");
              }
              return response.json();
            })
            .then((data) => {
              if (data.message == "success") {
                quantityInput.classList.remove("adding");
                const cartNum = document.querySelector("#cartNum");
                const existingValue = parseInt(cartNum.textContent);
                console.log(typeof existingValue);
                console.log(typeof quantity);
                const newValue = existingValue + parseInt(quantity);
                console.log(newValue);
                cartNum.textContent = newValue;
                displayMessage("Added to your cart");
                
              } else if (data.message == "not logged") {
                displayMessage("You need to login first");
                quantityInput.classList.remove("adding");
                displayBarraLaterale();
              } else {
                quantityInput.classList.remove("adding");
              }
            })
            .catch((error) => {
              console.error("Errore:", error);
            });
        } else {
          quantityInput.classList.add("adding");
          const productDiv = event.target.closest(".prodotti");
          const divCounter = productDiv.querySelector(".counter");
          divCounter.style.display = "block";
        }
      });
    });
  }

  function displayMessage(message){
    const addedMessage = document.querySelector(".confirm");
    addedMessage.style.display = "block";
    addedMessage.classList.add("fadeIn");
    addedMessage.innerText = message;
    setTimeout(() => {
      addedMessage.classList.remove("fadeIn");
      addedMessage.classList.add("fadeOut");
      setTimeout(() => {
        addedMessage.style.display = "none";
        addedMessage.classList.remove("fadeOut");
      }, 1000);
    }, 600); 
  }

  function fetchData(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        construisciLista(data);
        addCart();
      })
      .catch((error) => console.log(error));
  }

  function construisciLista(data) {
    const productList = document.querySelector(".container-prodotti");

    const firstFiveProducts = data.slice(0, 9);
    firstFiveProducts.forEach((product) => {
      const divProdotti = document.createElement("div");
      divProdotti.setAttribute("id", `${product.id}`);
      divProdotti.classList.add("prodotti");

      const divPrezzo = document.createElement("div");
      divPrezzo.classList.add("compra");

      const productImg = document.createElement("img");
      const productName = document.createElement("h4");
      const productDesc = document.createElement("p");
      const price = document.createElement("span");
      const save = document.createElement("i");
      const linkSave = document.createElement("a");
      const linkPrice = document.createElement("a");
      save.classList.add("bi", "bi-bookmark");
      const cart = document.createElement("button");
      const divCounter = document.createElement("div");
      divCounter.classList.add("counter");
      const count = document.createElement("input");

      productImg.src = product["image"];
      productName.textContent = product.title;
      price.textContent = product.price + "€";
      cart.textContent = "ADD TO CART";

      count.setAttribute("type", "number");
      count.setAttribute("min", "1");
      count.setAttribute("value", "1");

      count.classList.add("count");

      divProdotti.appendChild(productImg);
      divProdotti.appendChild(productName);
      divProdotti.appendChild(price);

      divCounter.appendChild(count);

      divProdotti.appendChild(divCounter);

      linkSave.appendChild(save);
      linkPrice.appendChild(cart);

      linkSave.setAttribute("href", "#");

      divPrezzo.appendChild(linkSave);
      divPrezzo.appendChild(linkPrice);

      divProdotti.appendChild(divPrezzo);

      productList.appendChild(divProdotti);
    });
  }
});

function toggleSection(element) {
  var ulElement = element.querySelector("ul");
  var iElement = element.querySelector("i");
  iElement.classList.toggle("rotate");
  ulElement.classList.toggle("open");
}

function displayBarraLaterale() {
  var formLaterale = document.querySelector(".form-laterale");
  formLaterale.style.visibility = "visible";
  formLaterale.style.display = "block";
  setTimeout(function () {
    document.querySelector(".form-laterale").classList.add("open");
  }, 10);
}

function closeBarraLaterale() {
  var formLaterale = document.querySelector(".form-laterale");

  document.querySelector(".form-laterale").classList.remove("open");
  setTimeout(function () {
    formLaterale.style.visibility = "hidden";
    formLaterale.style.display = "none";
  }, 200);
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("contact-form")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      document.getElementById("conferma").style.display = "none";
      document.querySelector(".sub-button").style.display = "none";
      document.querySelector(".img-form").style.display = "inline";

      fetch("form.php", {
        method: "POST",
        body: new FormData(event.target),
      })
        .then((response) => response.text())
        .then((data) => {
          document.getElementById("conferma").innerText = data;
          document.getElementById("conferma").style.display = "block";
          document.querySelector(".img-form").style.display = "none";
          document.querySelector(".sub-button").style.display = "inline";
        })
        .catch((error) => console.error("Error:", error));
    });

});
