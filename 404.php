<?php
if (isset($_POST['register'])) {
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $admin_password = sha1(md5($_POST['admin_password'])); //double encrypt to increase security
  $stmt = $mysqli->prepare("INSERT INTO rpos_admin (admin_name, admin_email, admin_password) VALUES (?, ?, ?)");
  $stmt->bind_param('sss', $admin_name, $admin_email, $admin_password);
  if($stmt->execute()) {
    $success = "Registration Successful";
  } else {
    $err = "Error Occurred in Registration";
  }
}

?>