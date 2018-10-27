<?php
  require_once("dbtools.inc.php");
	
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $current_time = date("Y-m-d H:i:s",mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));

  //建立資料連接
  $link = create_connection();

  
//if (mysqli_query($link,$sql)) 只要有查詢就是true
//不管有沒有查詢到結果

//$res=mysqli_query($link,$res)
//mysql_num_rows($res) 判斷筆數
//沒有查到 $res=0

	//各別查詢 id email 是否已經有資料
    $email_id_sql = "SELECT ID FROM message Where ID = '$id' OR email = '$email'";
	$email_sql = "SELECT * FROM message Where email = '$email'";
	$id_sql = "SELECT ID FROM message Where ID = '$id'";
	//各別query
	$email_id_res = mysqli_query($link,$email_id_sql);
	$email_res = mysqli_query($link,$email_sql);
	$id_res = mysqli_query($link,$id_sql);
	
	//email 和 id 都沒有重複
	if(mysqli_num_rows($email_id_res) == 0)
	{
		$sql1 = "INSERT INTO message(name, ID, password, email, date)
		VALUES('$name','$id','$password','$email','$current_time' )";
		
		mysqli_query($link,$sql1);
		//釋放 $result 佔用的記憶體	
		mysqli_free_result($result);
		//關閉資料連接	
		mysqli_close($link);

		//將使用者資料加入 cookies
		setcookie("id", $id);
		setcookie("passed", "TRUE");		
		header("location:../index.php");
	}
	
	else
	{
		//再個別判斷 email id
		if(mysqli_num_rows($id_res) != 0)
		{
			echo "<script type='text/javascript'>";
			echo "alert('此帳號已註冊過');";
			echo "history.back();";
			echo "</script>";
		}
		if(mysqli_num_rows($email_res) != 0)
		{
			echo "<script type='text/javascript'>";
			echo "alert('此信箱已註冊過');";
			echo "history.back();";
			echo "</script>";
		}
	}
?>