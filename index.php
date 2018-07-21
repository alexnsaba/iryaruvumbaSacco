<!DOCTYPE HTML>
<?PHP
function includeHead($title, $endFlag = 1) {
          $title="Iryaruvumba SACCO";
		echo '<head>
			<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
			<meta http-equiv="Content-Script-Type" content="text/javascript">
			<meta http-equiv="Content-Style-Type" content="text/css">
			<meta name="robots" content="noindex, nofollow">
			<title>'.$title.' </title>
			<link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon">
			<link rel="stylesheet" href="css/mangoo.css" />
			<link rel="stylesheet" href="ico/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="jquery/jquery-ui-1.11.4/jquery-ui.min.css">
			<script src="jquery/jquery-2.2.1.min.js"></script>
			<script src="jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
			<script>
				$(function() {
					$("#datepicker, #datepicker2, #datepicker3").datepicker({
						showOtherMonths: true,
						selectOtherMonths: true,
						dateFormat: \'dd.mm.yy\',
						changeMonth: true,
						changeYear: true
					});
				});
			</script>
			';
		if ($endFlag == 1) echo '</head>';
	}
	#session_start();
	#require_once 'function.php';
	#$fingerprint = fingerprint();
	#connect();
	
	?>
<html>
<head>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</head>
	<?PHP includeHead('Microfinance Management') ?>	
	
	<body>
        <br/><br/><h1 style="color:#037881;font-size:30pt">Iryaruvumba Developement Savings and Credit Cooperative</h1>
		<div class="content_center" style="width:100%; margin-top:15em">
            
		
		<!-- LEFT SIDE: mangoO Logo -->
		<div class="content_left" style="width:50%; padding-right:5em; text-align:right;">
			<img src="ico/mangoo.jpg" alt="sacco logo " style="width:40%;">
		</div>
		
		<!-- RIGHT SIDE: Login Form -->
		<div class="content_right" style="width:50%; padding-left:5em; text-align:left;"><br/>
			
            <p class="heading" style="margin:0; text-align:left;">Please login...</p>
			
			<form action="function.php" method="post">
				<table id="tb_fields" style="margin:0; border-spacing:0em 1.25em;">
					<tr>
						<td>
							<input type="text" name="username"  placeholder="Username" required/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" placeholder="Password" id="myInput" required />
						</td>
					</tr>
					<tr>
						<td>
					<input type="checkbox" onclick="myFunction()">Show Password
					</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="login" value="Login" style="font-size:20pt">
						</td>
					</tr>
				</table>
			</form>
			<h1 style="color:#037881;font-size:30pt">Save For The Future</h1>
			
		</div>
		
		
		
		
		
		
	</body>
</html>