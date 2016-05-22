<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
   		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="default.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<title> el mejor couch </title>
	</head>

	<body>
		<?php include("navbar.php"); ?>
		<div class="container">
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg']);?>
				</div>
			<?php } ?>
		</div>
	</body>

</html>
