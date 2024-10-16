<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="lib/css/style_login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  	<div class="wrapper">
	    <div class="title"><span><i class="fa fa-sign-in fa-lg fa-fw"></i></span></div>
	    <form id="fdangnhap" method="post">
      		<div class="row">
	        	<i class="fas fa-user"></i>
	        	<input type="text" id="username" name="username" placeholder="Tên đăng nhập" autofocus required />
      		</div>
      		<div class="row">
	        	<i class="fas fa-lock"></i>
	        	<input type="password" id="password" name="password" placeholder="Mật khẩu" required />
      		</div>
	      <!-- <div class="pass"><a href="#">Forgot password?</a></div> -->
      		<div class="row button">
	        	<input type="button" value="Đăng nhập" id="login" onclick="$('#fdangnhap').submit();"/>
      		</div>
      		<div class="signup-link">
	      	<!-- Not a member? <a href="#">Signup now</a> -->
      		</div>
	    </form>
  	</div>
  	<script async src="./lib/js/lib.js"></script>
  	<script type="text/javascript">
	    $(function(){
			$('#fdangnhap').on('submit', function(donard){
				donard.preventDefault();
				var a = $(this).find('input[name="username"]').val().trim();
				var b = $(this).find('input[name="password"]').val().trim();
				$.ajax({
					type: 'POST',
					url: 'go',
					data: {
						for: "login",
						taikhoan: a,
						matkhau: MD5(b),
						mobile: 0
					},
					beforeSend: function(){
					//showDiv();
					}
				}).done(function(ret){
					var val = JSON.parse(ret);
					if (val.trangthai == "1"){
						window.location.href = "go?page=_main";
					} else {
						alert("Đăng nhập thất bại! Vui lòng kiểm tra lại!");
					}
				});
			});
			$('#fdangnhap').on('keypress',function(e) {
				if(e.which == 13) {
					$('#fdangnhap').submit();
				}
			});
		});
	</script>
</body>
</html>