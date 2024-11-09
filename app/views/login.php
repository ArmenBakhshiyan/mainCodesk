<?php
    if(isset($_COOKIE['loginName'])){
        $_SESSION['loginName'] = $_COOKIE['loginName'];
        redirect('');
    }
?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <title>Լոգին համակարգ</title>
     <link rel="stylesheet" href='public/css/login.css' >
</head>
<body>

<div class="login-reg-panel">
    <div class="login-info-box">
        <h2>Գրանցված եք?</h2>
        <label id="label-register" for="log-reg-show">Այո</label>
        <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>
    <div class="register-info-box">
        <!-- <h2>Ոչ գրանցված չենք?</h2> -->
        <label id="label-login" for="log-login-show">Ոչ</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
    </div>
    <div class="white-panel">
        <div class="login-show show-log-panel p-2">
            <h2>ՄՈՒՏՔ</h2>
            <input type="email" class="mutq" name = 'email' id="emailEnt" placeholder="Email">
		  <div class="d-flex">
            	<input type="password" class="mutq" name = 'password' placeholder="Password">
			<!-- <button class=""><i class="fa fa-eye" aria-hidden="true"></i></button> -->
		  </div>
            <input type="button" id="mutq" class="btn btn-info" value="Մուտք" onclick="chektMutq(this)">
            <div class="mt-3"><input type="checkbox" id = 'loginRemembr'  name="loginRemembr"><span> Remember me</span></div>
            <div class="mt-2"><a href="" >Forgot password</a></div>
        </div>
        <div class="register-show">

			<form id = 'formaRegistring'>
				<h2>ԳՐԱՆՑՎԵԼ</h2>
				<input type="text" class="registring" name = 'name' placeholder="Name">
				<input type="text" class="registring" name = 'lastname' placeholder="Lastname">
				<input type="email" id="emailReg" name = 'email' class="registring" placeholder="email">
				<input type="password" class="registring" name = 'password' placeholder="Password">
				<input type="text" class="registring" name = 'phone' placeholder="Phone">
				<input type="button" class="btn btn-success" onclick="chektregister(this)" id="grancel" value="Գրանցվել">
			</form>
        </div>
    </div>
</div>
<!-- <script src="app/public/js/login.js"></script> -->
