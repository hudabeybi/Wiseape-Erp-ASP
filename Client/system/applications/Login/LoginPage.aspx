<%@ Page Language="C#" AutoEventWireup="true" CodeFile="LoginPage.aspx.cs" Inherits="system_applications_Login_LoginPage" %>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<title>Login</title>

		<meta name="description" content="top menu &amp; navigation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta http-equiv="PRAGMA" value="NO-CACHE" />


		<!-- Login page --->
		<link rel="stylesheet" href="assets-login/css/style.css" />

		<!-- text fonts -->



	</head>
	<style>
	@font-face {
	  font-family: 'Open Sans';
	  font-style: normal;
	  font-weight: 300;
	  src: local('Open Sans Light'), local('OpenSans-Light'), url(assets/fonts/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff) format('woff');
	}
	@font-face {
	  font-family: 'Open Sans';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Open Sans'), local('OpenSans'), url(assets/fonts/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
	}

	
	</style>
	

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->

<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip"></div>
  </div>
  <div class="form">

    <h2>Login to your account</h2>
    <form action="login.aspx" method="POST">
      <input name="username" type="text" placeholder="Username"/>
      <input name="password" type="password" placeholder="Password"/>
      <button type="submit" id="btnLogin">Login</button>
    </form>
  </div>
</div>
</body>
</html>