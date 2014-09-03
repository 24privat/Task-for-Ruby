<?php 
include_once 'config.php'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Simple Todo List</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		
		<!-- Пользовательские стили -->
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
		<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 text-center">
						<header>
							<h1>SIMPLE TODO LIST</h1>
							<h4>FROM RUBY GARAGE</h4>
						</header>
						
						<!-- начало: таблица -->
						<div class="main-table">
							<!-- начало: шапка таблицы -->
							<div class="header">
								<i class="glyphicon glyphicon-calendar"></i> Complete the test task for Ruby Garage
								<span class="pull-right">
									<button type="submit">
										<i class="glyphicon glyphicon-pencil"></i>
									</button>
									<button type="submit">
										<i class="glyphicon glyphicon-trash"></i>
									</button>
								</span>
							</div>
							<!-- конец: шапка таблицы -->
							
							<!-- начало: добавление записи -->
							<div class="add">
								<form class="form-inline" role="form">
									<div class="form-group">
										<input type="text" class="form-control" name="add" placeholder="Start typing here to create a ivent" />
									</div>
									<button type="submit" class="btn btn-default">Add Ivent</button>
								</form>
							</div>
							<!-- конец: добавление записи -->
							
							<!-- начало: данные -->
							<table class="table table-striped table-bordered">
								<tbody>
									<tr>
										<td>
											<input type="checkbox" name="check[]" />
										</td>
										<td class="hidden">
											1
										</td>
										<td>
											Название события
										</td>
										<td>
											<div class="button">
												<a href="#">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
												<a href="#">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="check[]" />
										</td>
										<td class="hidden">
											2
										</td>
										<td>
											Название события
										</td>
										<td>
											<div class="button">
												<a href="#">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
												<a href="#">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<!-- конец: данные -->
						</div>
						<!-- конец: таблица -->
						
					</div>
				</div>
			</div>
			
			<div class="h-footer"></div><!-- заглушка для подвала -->
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="copyright">
							© Oleg Marchenko
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- Bootstrap -->			 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
