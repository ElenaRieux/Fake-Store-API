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

function chooseLog(action) {
  const formLogin = document.querySelector(".form-login.sign-in-container");
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

function signUpSuccess() {
  formLogin = document.querySelector(".form-login.sign-in-container");
  const formSignup = document.querySelector(".form-login.sign-up-container");
  const buttonLog = document.querySelector(".button-login");
  const buttonSign = document.querySelector(".button-signup");
  formLogin.classList.add("open");
  formSignup.classList.remove("open");
  buttonLog.classList.add("active");
  buttonSign.classList.remove("active");
}

const signupUsername = document.getElementById("signup-username");
const signupEmail = document.getElementById("signup-email");
const signupPassword = document.getElementById("signup-password");
const signupPasswordRepeat = document.getElementById("signup-passwordRepeat");


const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = message;
  element.classList.add("error");
};

const setSuccess = (element) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = "";
  element.classList.remove("error");

};

const validateInputs = () => {
  const signupUsernameValue = signupUsername.value.trim();
  const signupEmailValue = signupEmail.value.trim();
  const signupPasswordValue = signupPassword.value.trim();
  const signupPasswordRepeatValue = signupPasswordRepeat.value.trim();
  if (signupUsernameValue === "") {
    setError(signupUsername, "Username is required");

  } else {
    setSuccess(signupUsername);
  }

  if (signupEmailValue === "") {
    setError(signupEmail, "Email is required");
  } else {
    setSuccess(signupEmail);
  }

  if (signupPasswordValue === "") {
    setError(signupPassword, "Password is required");
  } else {
    setSuccess(signupPassword);
  }

  if (signupPasswordRepeatValue === "") {
    setError(signupPasswordRepeat, "Password is required");
  } else {
    setSuccess(signupPasswordRepeat);
  }
};


document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("login-form")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      fetch("include/login_check.php", {
        method: "POST",
        body: new FormData(event.target),
      })
        .then((response) => response.text())
        .then((data) => {
          if (data === "success") {
            window.location.href = "dashboard/index.php";
          } else {
            document.getElementById("risultatoLogin").innerText = data;
          }
        })
        .catch((error) => console.error("Error:", error));
    });

  document
    .getElementById("signup-form")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      validateInputs();
      fetch("include/signup_check.php", {
        method: "POST",
        body: new FormData(event.target),
      })
        .then((response) => response.text())
        .then((data) => {
          document.getElementById("risultatoSignup").innerText = data;
        })
        .catch((error) => console.error("Error:", error));
    });
    
});
