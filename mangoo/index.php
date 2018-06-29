<!DOCTYPE HTML>
<?PHP
	#session_start();
	require 'function.php';
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
        <br/><br/> <marquee><h1 style="color:#037881;font-size:30pt">Iryaruvumba Developement Savings and Credit Cooperative</h1></marquee>
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
			
			
		</div>
		<marquee><h1 style="color:#037881;font-size:30pt">Save For The Future</h1></marquee>
		
		
		
		
	</body>
</html>