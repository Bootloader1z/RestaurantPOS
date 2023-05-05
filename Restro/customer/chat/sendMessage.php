<?php
include "config/config.php"; 
include "config.php";
session_start();
if($_POST)
{
	if(isset($_SESSION['customer_id']))
	{
		
			$customer_id = $_SESSION['customer_id'];
			//$login_id = $_SESSION['login_id'];
			$ret = "SELECT * FROM  rpos_customers  WHERE customer_id = '$customer_id'";
			$stmt = $mysqli->prepare($ret);
			$stmt->execute();
			$res = $stmt->get_result();
			
		while ($customer = $res->fetch_object()) {
		$name=$customer->customer_name;
		$msg=$_POST['msg'];
		
		$sql="INSERT INTO `chat`(`name`, `message`) VALUES ('".$name."', '".$msg."')";

		$query = mysqli_query($conn,$sql);
			if($query)
			{
				header('Location: chatpage');
			}
			else
			{
				echo "Something went wrong";
			}
		}
	}
	elseif(isset($_SESSION['admin_id']))
	{
		
			$admin_id = $_SESSION['admin_id'];
			//$login_id = $_SESSION['login_id'];
			$ret = "SELECT * FROM  rpos_admin  WHERE admin_id = '$admin_id'";
			$stmt = $mysqli->prepare($ret);
			$stmt->execute();
			$res = $stmt->get_result();
			
		while ($admin = $res->fetch_object()) {
		$name=$admin->admin_name;
		$msg=$_POST['msg'];
		
		$sql="INSERT INTO `chat`(`name`, `message`) VALUES ('".$name."', '".$msg."')";

		$query = mysqli_query($conn,$sql);
			if($query)
			{
				header('Location: chatpage');
			}
			else
			{
				echo "Something went wrong";
			}
		}
	}
}

else
				{
					echo "Something went wrong";
				}
?>