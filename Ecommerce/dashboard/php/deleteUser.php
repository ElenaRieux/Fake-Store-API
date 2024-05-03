PHP
<?php

require_once "../../include/config_session.php";
require_once "../../models/Role.models.php";
require_once "../../models/User.models.php";


$user = unserialize($_SESSION['user']);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user']) && $user->hasPermission("delete")) {

  $data = json_decode(file_get_contents('php://input'), true);

  if (isset($data['email'])) {
    $email = $data['email'];

    $result = $user->deleteUsers($email);

    if ($result) {
      echo "success";
    } else {
      echo "Failed to delete user.";
    }
  } else {
    echo "Error: Email not found in request data.";
  }
} else {
  echo "You don't have permission to do it";
}
