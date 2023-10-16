<?php include "layouts/header.php"; ?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:5%;
    padding-bottom:5%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
}
  </style>
<?php
  session_start();
  include('config/config.php');
  //login 
  if (isset($_POST['login'])) {
      $customer_email = $_POST['email'];
      $customer_password = sha1(md5($_POST['password'])); //double encrypt to increase security
      $stmt = $mysqli->prepare("SELECT customer_email, customer_password, customer_id  FROM  fms_customers WHERE (customer_email =? AND customer_password =?)"); //sql to log in user
      $stmt->bind_param('ss',  $customer_email, $customer_password); //bind fetched parameters
      $stmt->execute(); //execute bind 
      $stmt->bind_result($customer_email, $customer_password, $customer_id); //bind result
      $rs = $stmt->fetch();
      $_SESSION['customer_id'] = $customer_id;
      if ($rs) {
          //if its sucessfull
          header("location: chatpage.php");
      } else {
          $err = "Incorrect Authentication Credentials ";
      }
  }
?>

<div class="container">
  <center><h2>Login form</h2></center></br>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
	  
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
