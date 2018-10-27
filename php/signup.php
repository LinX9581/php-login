<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>註冊</title>
		<meta name="author"      content="Toshiya TSURU @ SunBusiness, Inc.">
		<meta name="viewport"    content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css"         rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-3 span9">
					<h1>註冊</h1>
					<hr/>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="span12">
					<form class="form-horizontal" role="form" id="form" method="post" action="php/post.php">
						
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">ID</label>
							<div class="col-sm-3 controls">		
								<input type="text" id="name" name="name" placeholder="LINX" class="form-control" >
							</div>
						</div>
						
						<div class="form-group">
							<label for="content" class="col-sm-3 control-label">密碼</label>
							<div class="col-sm-6 controls">
								<input class="form-control" id="password" name="password" placeholder="password" >
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">電子郵件</label>
							<div class="col-sm-4 controls">
								<input type="email" id="email" name="email" placeholder="找回密碼用" class="form-control">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-primary btn-lg btn-block">註冊</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- Bootstrap --> 
		<script src="js/bootstrap.min.js"></script>
		<!-- zip2addr plugin -->
		<script src="js/jquery.zip2addr.js"></script>
		<!-- jQuery Validation Plugin -->
		<script src="js/jquery.validate.min.js"></script>
		<!-- my scripts -->
		<script>
			(function(){
				$(function() {
					// 驗證資料
					// jQuery Validation Plugin 的Twitter BootStrap 3 支援
					$.validator.setDefaults({
						highlight: function(element) {
							$(element).closest('.form-group').addClass('has-error');
						},
						unhighlight: function(element) {
							$(element).closest('.form-group').removeClass('has-error');
						},
						errorElement:   'span',
						errorClass:     'help-block',
						errorPlacement: function(error, element) {
							if(element.parent('.controls').length) {
								error.insertAfter(element.parent());
							} else {
								error.insertAfter(element);
							}
						}
					});
					// jQuery Validation Plugin的套用
					$('#form').validate({
						/**
						 * validate 規則設定
						 */
						rules: {		
							name:     "required",
							
							email:      {
								required:  true,
								email:     true
							},
							
							password:    {
								required:  true,
								minlength: 8
							}
							
							
						},
						/**
						 * validate 訊息設定
						 */
						 //email 不能和 password互換?
						messages: {
							name:     "請輸入ID。",
							
							email:       {
								required:  "請輸入電子郵件。",
								email:     "請輸入正確的電子郵件格式。",	
							},
							
							password:     {
								required:  "請輸入密碼。",
								minlength: jQuery.format("密碼不得小於8。") 
							},						
							
							
						}
					});
				});
			})();
		</script>
	</body>
</html>