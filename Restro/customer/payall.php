<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

if (isset($_POST['pay'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["pay_code"]) || empty($_POST["pay_amt"]) || empty($_POST['pay_method'])) {
    $err = "Blank Values Not Accepted";
    //Perform Regex On Payments
    
  } else {

    $pay_code = $_POST['pay_code'];
    $paytime = "RM".date("Y");
      if(strlen($pay_code) < 10 )
      {
        $err = "Payment Code Verification Failed, Please Try Again";
      }
      elseif(substr($pay_code, 0, 6) !== $paytime) {
        // the code does not start with "RM", so reject it
        $err = "Unauthorize Payment Code";
      }
      else
      {
        $ret = "SELECT * FROM fms_orders WHERE order_status='' AND order_code NOT IN (SELECT order_code FROM fms_payments WHERE pay_amt>0)";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $total = 0;
        while ($order = $res->fetch_object()) {
            $total_orders = $order->prod_qty;
            $total_price = $order->prod_price;
        
            // Calculate the total for this order
            $order_total = $total_orders * $total_price;
        
            // Print the order code and total for this order
            // echo "Order Code: {$order->order_code} | Total: {$order_total}<br>";
        
            // Update the order status to "paid"
            $customer_id = $_GET['customer_id'];
            $pay_method = $_POST['pay_method'];
            $pay_id = $_POST['pay_id'];
            $order_status = $_GET['order_status'];
        
            while (mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM fms_payments WHERE pay_id='$payid'")) > 0) {
              // If the payid already exists, generate a new one
              $payid = bin2hex(random_bytes('3'));
            }
          
            // Insert the payment information into the payments table
            $postQuery = "INSERT INTO fms_payments (pay_id, pay_code, order_code, customer_id, pay_amt, pay_method) VALUES(?,?,?,?,?,?)";
            $postStmt = $mysqli->prepare($postQuery);
            $rc = $postStmt->bind_param('ssssss', $payid, $pay_code, $order->order_code, $customer_id, $order_total, $pay_method);
            $postStmt->execute();
        
            // Update the order status in the orders table
            $upQry = "UPDATE fms_orders SET order_status =? WHERE order_code =?";
            $upStmt = $mysqli->prepare($upQry);
            $rc = $upStmt->bind_param('ss', $order_status, $order->order_code);
            $upStmt->execute();
        
            // if ($upStmt && $postStmt) {
            //     echo "Order {$order->order_code} has been paid.<br>";
            // } else {
            //     echo "Error while trying to update payment information for Order {$order->order_code}.<br>";
            // }
            $total += $order_total;
              if ($upStmt && $postStmt) {
                $success = "Paid {$total}" && header("refresh:1; url=payments_reports");
              } else {
                $err = "Please Try Again Or Try Later";
              }
        
            // Add this order's total to the grand total
            
        }
      
        
        // Print the grand total
        // echo "Grand Total: {$total}";
      }
    }
  }
//

 
  // $customer_id = $_GET['customer_id'];
  //         $pay_amt  = $_POST['pay_amt'];
  //         $pay_method = $_POST['pay_method'];
  //         $pay_id = $_POST['pay_id'];
  //         $order_status = $_GET['order_status'];

//
require_once('partials/_head.php');
$ret = "SELECT * FROM  fms_orders WHERE order_status = '' ";
      $stmt = $mysqli->prepare($ret);
      $stmt->execute();
      $res = $stmt->get_result();
      $total = 0; // Initialize the total variable outside the loop
      while ($order = $res->fetch_object()) {
        $total_orders = $order->prod_qty;
        $total_price = $order->prod_price;
        $total += ($total_orders * $total_price);
      }
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    
    ?>
    
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Payment ID</label>
                    <input type="text" name="pay_id" readonly value="<?php echo $payid;?>" class="form-control" type="hidden">
                  </div>
                  <div class="col-md-6">
                    <label>Payment Code</label><small class="text-danger"> Type 10 Digits Alpha-Code</small>
                    <input type="text" limit="11" name="pay_code" placeholder="" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Amount ($)</label>
                    <input type="text" name="pay_amt" readonly value="<?php echo number_format($total, 2, '.', ','); ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Payment Method</label>
                    <select class="form-control" name="pay_method">
                        <option selected>Cash</option>
                        <option>Paypal</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="pay" value="Pay Order" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>