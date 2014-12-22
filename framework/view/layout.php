<!doctype html>
<html lang="en" ng-app="frameworkApp">
	<head>
		<meta charset="utf-8">
		<title>My HTML File</title>
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="css/app.css">
	</head>
	<body ng-controller="homeCtrl">

		<ul>
			<li ng-repeat="phone in phones">
				<span>{{phone.name}}</span>
				<p>{{phone.snippet}}</p>
			</li>
		</ul>

	</body>

	<script src="assets/js/angular.min.js"></script>
	<script src="framework/js/app.js"></script>
	<script src="framework/js/controllers/homeCtrl.js"></script>

</html>