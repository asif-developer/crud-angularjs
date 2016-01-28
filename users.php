<?php session_start(); 
if(!isset($_SESSION['admin_id'])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registered Users</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<!-- <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> -->
	<script type="text/javascript" src="lib/bootstrap/ui-bootstrap-1.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/ui-bootstrap-1.1.1-csp.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="ctrl.js"></script>
</head>
<body ng-app="regUser">
<div ng-controller="getusers" class="col-sm-5">
	<!-- <h1>Registered Users</h1> -->
	<my-heading></my-heading>
	<input type="text" ng-model="srch" placeholder="Search user" class="form-control">
		<table class="table table-hover">
			<thead>
				<th ng-click="orderByThis('fname')">First Name</th>
				<th ng-click="orderByThis('lname')">Last Name</th>
				<th ng-click="orderByThis('email')">Email</th>
				<th>Action</th>
			</thead>
			<tbody>
			<tr data-ng-repeat="u in user_list | filter:srch | orderBy:myOrderBy">
				<td>{{u.fname | uppercase}}</td>
				<td>{{u.lname}}</td>
				<td>{{u.email}}</td>
				<td><!-- <button type="button" ng-click="del(user_list.indexOf(u))" class="btn btn-danger">Delete</button> -->
				<button type="button" ng-click="del(u)" class="btn btn-danger">Delete</button>
				</td>
			</tr>
			</tbody>
		</table>

		<a href="signout.php" class="btn btn-success">logout</a>
</div>


</body>
</html>