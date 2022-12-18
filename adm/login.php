<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>

<script type="text/javascript">
$(document).ready(function() {
	$("#form_login").validate();
})

function validasi(form){
	if(form.username.value == ""){
		alert("USERNAME MASIH KOSONG");
		form.username.focus();
		return (false);
	}
     
	if(form.password.value == ""){
		alert("PASSWORD MASIH KOSONG");
		form.password.focus();
		return (false);
	}

	return (true);
}
</script>

</head>

<body OnLoad="document.login.username.focus();">

<form class="form-horizontal" name="login" id="form-login" method="post" action="log_proc.php" onSubmit="return validasi(this)">
	<div class="modal-body text-center">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" class="required input-large" name="username" placeholder="Username..">
		</div>
        <div class="row">
			&nbsp;
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" class="input-large" name="password" placeholder="Password..">
		</div>
        <div class="row">
			&nbsp;
		</div>
		<div>
			<button class="btn btn-small btn-info" type="submit" name="login" id="login">Login</button>
		</div>                       
	</div>
</form>