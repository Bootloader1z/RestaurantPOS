<?php 
	session_start();
	include('config/config.php');
require_once('partials/_head.php');
require_once('partials/_analytics.php');
?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container-box {
    margin-top: 3%;
	margin-bottom: 7%;
	margin-left: 20%;
    width: 60%;
	
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
	
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		border-radius: 30px;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.display-chat::-webkit-scrollbar{
		display: none;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
	.summitte{
	margin-left: 85%;

	}
  </style>
<?php
	if(isset($_SESSION['customer_id']))
	{
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

		include ('config.php');
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);
		include "config/config.php"; 
		$customer_id = $_SESSION['customer_id'];
        //$login_id = $_SESSION['login_id'];
        $ret = "SELECT * FROM  fms_customers  WHERE customer_id = '$customer_id'";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
		
		while ($customer = $res->fetch_object()) {
		
?>


<div class="container-box">
  <center><h2>Welcome <span style="color:#dd7ff3;"><?php echo $customer->customer_name; ?>!</span></h2>
	<label>Join the chat</label>
  </center></br>
  <div class="display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
			<p>
				<span><?php echo $row['name']; ?> :</span>
				<?php echo $row['message']; ?>
			</p>
		</div>
<?php
		}
	}
	else
	{
?>
<div class="message">
			<p>
				No previous chat available.
			</p>
</div>
<?php
	} 
?>

  </div>
  <form class="form-horizontal" method="post" action="sendMessage.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..." style="height: 50px;"></textarea> 
      </div>
      <div class="summitte">
	  <button type="submit" class="btn btn-primary">Send</button>
      </div>

    </div>
  </form>
</div>
<?php
  require_once('partials/_footer.php');
  ?>
</body>
</html>
<?php
		}
	}
	elseif(isset($_SESSION['admin_id']))
	{
		include "layouts/header2.php"; 
		include "config.php"; 
		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);
		include "config/config.php"; 
		$admin_id = $_SESSION['admin_id'];
        //$login_id = $_SESSION['login_id'];
        $ret = "SELECT * FROM  fms_admin  WHERE admin_id = '$admin_id'";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
		
		while ($admin = $res->fetch_object()) {
		
?>
<div class="container">
  <center><h2>Welcome <span style="color:#dd7ff3;"><?php echo $admin->admin_name; ?>!</span></h2>
	<label>Join the chat</label>
  </center></br>
  <div class="display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
			<p>
				<span><?php echo $row['name']; ?> :</span>
				<?php echo $row['message']; ?>
			</p>
		</div>
<?php
		}
	}
	else
	{
?>
<div class="message">
			<p>
				No previous chat available.
			</p>
</div>
<?php
	} 
?>

  </div>
  <form class="form-horizontal" method="post" action="sendMessage.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
      </div>
      <div class="summitte">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>

    </div>
  </form>
</div>

</body>
</html>
<?php
		}
	}


	else
	{
		header('location:index.php');
	}
?>