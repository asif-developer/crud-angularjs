<?php session_start(); 
	if(isset($_SESSION['admin_id'])){
		header('location:users.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<!-- <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> -->
	<script type="text/javascript" src="lib/bootstrap/ui-bootstrap-1.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/ui-bootstrap-1.1.1-csp.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="ctrl.js"></script>
</head>
<body ng-app="regUser">
<div ng-controller="loginUser" class="col-sm-5">
	<h1>Admin Login</h1>
	<div style="color:red;" ng-if="errMsg">{{errMsg}}</div>
	<form name="loginForm" role="form" novalidate ng-submit="submitLoginForm()">
		<table class="table">
			
			<tr>
				<td>Username/Email*</td>
				<td><!-- <input type="email" class="form-control" name="email" ng-pattern="empp" ng-model="form.email" ng-required="true"/> -->
					<input type="text" class="form-control" name="username" ng-model="form.username" ng-required="true"/>
					<span style="color:red" ng-show="loginForm.$submitted && loginForm.username.$invalid">
						<span ng-show="loginForm.username.$error.required">This field is required</span>
					</span>

					<!-- <span style="color:red" ng-show="loginForm.$submitted && loginForm.email.$error.pattern">
						<span ng-show="loginForm.email.$error.pattern">Invalid email</span>
					</span> -->

				</td>
			</tr>
			
			<tr>
				<td>Password*</td>
				<td><input type="password" class="form-control" name="pass" ng-model="form.pass" ng-required="true" />
					<span style="color:red" ng-show="loginForm.$submitted && loginForm.pass.$invalid">
						<span ng-show="loginForm.pass.$error.required">This field is required</span>
					</span>

				</td>
			</tr>

			<tr>
				<td></td>
				<td>
				<!-- <input type="submit" class="btn btn-danger" ngClick="Submit" ng-disabled="regForm.fName.$untouched || regForm.fName.$invalid || regForm.lName.$untouched || regForm.lName.$invalid || regForm.email.$untouched || regForm.email.$invalid || regForm.pass.$untouched || regForm.pass.$invalid"  /> -->
				<input type="submit" class="btn btn-danger pull-right" ngClick="Submit" />

				</td>
			</tr>
		
		</table>
	
	</form>
</div>
</body>
</html>