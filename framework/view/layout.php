<!doctype html>
<html lang="en" ng-app="frameworkApp">
	<head>
		<meta charset="utf-8">
		<title>My HTML File</title>
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="css/app.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="nav">
						<li><a href="#home"> Home </a></li>
						<li><a href="#cadastro"> Cadastro </a></li>
					</ul>
				</div>
				<div class="col-md-9">
					<div ng-view=""></div>
				</div>
			</div>
		</div>


	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.3.8/angular-route.min.js"></script>
	<script src="framework/js/app.js"></script>
	<script src="framework/js/controllers/homeCtrl.js"></script>
	<script src="framework/js/controllers/cadastroCtrl.js"></script>

	</body>

</html>