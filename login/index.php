<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Orgelbygger.dk</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<!--STYLESHEETS-->
		<link href='../assets/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
		<link href='../assets/css/style.css?n=2' type='text/css' rel='stylesheet'>
		<link href='../assets/css/breakpoints.css' type='text/css' rel='stylesheet'>
		<link href='../assets/css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<!-- SCRIPTS-->
		<script src="../assets/js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/script.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/canvas-video-player.js?n=1" type="text/javascript"></script>
		<!--FONTS-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	</head>
	<body class="white">
    <div id="content" class="content-container">
<center>
<div class="content-container-inner">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
<?
    if($_GET['loginError']){
        ?>
            <h1>Noget gik galt</h1>
            <h2><?=$_GET['loginError']?></h2>
        <?
    }else{
        ?>
            <h1 class="green-text">Login</h1>
            <h2>Indtast brugernavn og password</h2>
        <?
    }
?>


            <form action="loginCheck.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" class="form-control" name="userName" placeholder="Brugernavn" aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" class="form-control" name="password" placeholder="password" aria-describedby="basic-addon1">
                </div><br>
                <input type="submit" value="LOGIN" name="submit">
            </form>
        </div>
    </div>
</div>
</div>
</center>
</div>
</body>