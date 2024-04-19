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

function chooseLog(action) {
  const formLogin = document.querySelector(".form-login.sign-in-container");
  console.log(formLogin);
  const formSignup = document.querySelector(".form-login.sign-up-container");
  const buttonLog = document.querySelector(".button-login");
  const buttonSign = document.querySelector(".button-signup");
  if (action === "login") {
    formLogin.classList.add("open");
    formSignup.classList.remove("open");
    buttonLog.classList.add("active");
    buttonSign.classList.remove("active");

  } else if (action === "signup") {
    formSignup.classList.add("open");
    formLogin.classList.remove("open");
    buttonSign.classList.add("active");
    buttonLog.classList.remove("active");
  }
}
