$(document).ready(function () {
  var email;

  $(".delete-button").click(function () {
    var row = $(this).closest("tr");
    email = row.find("td:eq(1)").text();
  });

  $(".delete-user").click(function () {
    fetch("php/deleteUser.php", {
      method: "POST",
      body: JSON.stringify({ email: email }),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.text())
      .then((data) => {
        location.reload();
      })
      .catch((error) => {
        console.error("Error:", error);
        console.log("An error occurred. Please try again later.");
      });
  });

  document
    .getElementById("formNewUser")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      fetch("php/addUser.php", {
        method: "POST",
        body: new FormData(event.target),
      })
        .then((response) => response.text())
        .then((data) => {
          if (data == "success") {
            location.reload();
          } else {
            document.getElementById("risultatoAddUser").innerText = data;
          }
        })
        .catch((error) => console.error("Error:", error));
    });

    function setEditFormData(username, email, role) {
        document.getElementById('editUsername').value = username;
        document.getElementById('editEmail').value = email;
        document.getElementById('editRole').value = role;
    }
    
    $(".edit-button").click(function() {
        var row = $(this).closest("tr");
        var username = row.find("td:eq(0)").text(); 
        var email = row.find("td:eq(1)").text(); 
        var role = row.find("td:eq(2)").text();
    
        setEditFormData(username, email, role);
    });
});
