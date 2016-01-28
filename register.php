<!DOCTYPE html>
<?php require 'conn.php'; ?>
<html>
<head>
	<title>Register User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<!-- <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> -->
	<script type="text/javascript" src="lib/bootstrap/ui-bootstrap-1.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/ui-bootstrap-1.1.1-csp.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="ctrl.js"></script>
</head>
<body ng-app="regUser">
<div ng-controller="addUser" class="col-sm-5">
	<!-- <h1>User registeration</h1> -->
	<my-heading-2></my-heading-2>
	<form name="regForm" role="form" novalidate ng-submit="submitForm()">
		<table class="table">
			
			<tr>
				<td>First Name*</td>
				<td><input class="form-control" type="text" name="fName" ng-model="form.fName" ng-focus="A(true)" required ng-required='true'/>
				<span style="color:red" ng-show="regForm.$submitted && regForm.fName.$invalid">
					<span ng-show="regForm.fName.$error.required">This field is required</span>
				</span>

				</td>
			</tr>
			
			<tr>
				<td>Last Name*</td>
				<td><input type="text" class="form-control" name="lName" ng-model="form.lName" ng-required="true" />
				<span style="color:red" ng-show="regForm.$submitted && regForm.lName.$invalid">
					<span ng-show="regForm.lName.$error.required">This field is required</span>
				</span>
				</td>
			</tr>
			
			<tr>
				<td>Email*</td>
				<td><input type="email" class="form-control" name="email" ng-pattern="emp" ng-model="form.email" ng-required="true"/>
					<span style="color:red" ng-show="regForm.$submitted && regForm.email.$invalid">
						<span ng-show="regForm.email.$error.required">This field is required</span>
					</span>

					<span style="color:red" ng-show="regForm.$submitted && regForm.email.$error.pattern">
						<span ng-show="regForm.email.$error.pattern">Invalid email</span>
					</span>

				</td>
			</tr>
			
			<tr>
				<td>Password*</td>
				<td><input type="password" class="form-control" name="pass" ng-model="form.pass" ng-required="true" />
					<span style="color:red" ng-show="regForm.$submitted && regForm.pass.$invalid">
						<span ng-show="regForm.pass.$error.required">This field is required</span>
					</span>

				</td>
			</tr>

			<!-- <tr>
				<td>Avatar</td>
				<td><input type="file" name="file" ng-model="form.file" class="form-control" ng-required="true"/>
				<span style="color:red" ng-show="regForm.$submitted && regForm.file.$invalid">
						<span ng-show="regForm.file.$error.required">Upload avatar image</span>
					</span>
				</td>
			</tr> -->

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