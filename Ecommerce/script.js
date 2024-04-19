document.addEventListener("DOMContentLoaded", function () {
  fetchData("https://fakestoreapi.com/products");

  function fetchData(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => construisciLista(data))
      .catch((error) => console.log(error));
  }

  
  function construisciLista(data) {
    const productList = document.querySelector(".container-prodotti");
    
    const firstFiveProducts = data.slice(0, 9);
    firstFiveProducts.forEach((product) => {
      const divProdotti = document.createElement("div");
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

      productImg.src = product["image"];
      productName.textContent = product.title;
      price.textContent = product.price + "€";
      cart.textContent = "AGGIUNGI AL CARRELLO";

      divProdotti.appendChild(productImg);
      divProdotti.appendChild(productName);
      divProdotti.appendChild(price);

      linkSave.appendChild(save);
      linkPrice.appendChild(cart);

      linkSave.setAttribute("href", "#");
      linkPrice.setAttribute("href", "#");

      divPrezzo.appendChild(linkSave);
      divPrezzo.appendChild(linkPrice);

      divProdotti.appendChild(divPrezzo);

      productList.appendChild(divProdotti);
    });
  }
});

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

function toggleSection(element) {
  var ulElement = element.querySelector('ul');
  var iElement = element.querySelector("i");
  iElement.classList.toggle('rotate');
  ulElement.classList.toggle('open');
}

function displayBarraLaterale(){
  var formLaterale = document.querySelector('.form-laterale');
  formLaterale.style.visibility = 'visible';
  formLaterale.style.display = 'block';
  setTimeout(function() {
    document.querySelector('.form-laterale').classList.add('open');
  }, 10);}

function closeBarraLaterale(){
  var formLaterale = document.querySelector('.form-laterale');

  document.querySelector('.form-laterale').classList.remove('open');
  setTimeout(function() {
    formLaterale.style.visibility = 'hidden';
    formLaterale.style.display = 'none';
  }, 200);
}