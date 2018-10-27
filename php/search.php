<?php
  require_once("dbtools.inc.php");
  header("Content-type: text/html; charset=utf-8");
	
  //取得表單資料
  $ID = $_POST["ID"]; 	
  $email = $_POST["email"];
  //建立資料連接
  $link = create_connection();
					
  //檢查帳號密碼是否正確
  $sql = "SELECT * FROM message Where ID = '$ID' AND email = '$email'";
  $result = execute_sql($link, "content", $sql);

  //如果帳號密碼錯誤
  if (mysqli_num_rows($result) == 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
	
    //關閉資料連接	
    mysqli_close($link);
		
    //顯示訊息要求使用者輸入正確的帳號密碼
    echo "<script type='text/javascript'>";
    echo "alert('帳號密碼錯誤，請查明後再登入');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號密碼正確
  else
  {
    $row = mysqli_fetch_object($result);
    $password = $row->password;
    $message = "
      <!doctype html>
      <html>
        <head>
          <title></title>
          <meta charset='utf-8'>
        </head>
        <body>
          $name 您好，您的帳號資料如下：<br><br>
          　　密碼：$password<br><br>
            <a href='http://localhost/signin.php'>按此登入本站</a>
          </body>
      </html>
    ";
	echo $message;
 //釋放 $result 佔用的記憶體
  mysqli_free_result($result);
		
  //關閉資料連接	
  mysqli_close($link);	
    //header("location:../linx.html");		
  }
?>