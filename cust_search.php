<?PHP
	require 'function.php';
	?>
	<!DOCTYPE html>
 <html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Customer Search',1); ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(2);
		?>
		<!-- MENU MAIN -->
		<br><div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="cust_search.php" id="item_selected">Search</a>
			<a href="cust_new.php">New Customer</a>
			<a href="cust_act.php">List of all Customers</a>
            <a href="edit.php">Edit </a>
			<a href="custDel.php">Delete </a>
		</div>
					
		<!-- CONTENT: Customer Search -->
		<div class="content_center">
	
			<form action="customerSearch.php" method="post">
				<p class="heading_narrow">Quick Search by AccountNo</p>
				<input type="text" name="cust" placeholder="account Number" required/>
				<input type="submit" name="custo" value="Search" />
			</form>
			
			<form action="customerSearch.php" method="post" >
             <p class="heading_narrow">Detailed Customer Search</p>
				<input type="text" name="cust_search_name" placeholder="Name or name part"/>
				<br/><br/>
				<input type="text" name="cust_search_occup" placeholder="Occupation or part"/>
				<br/><br/>
				<input type="text" name="cust_search_addr" placeholder="Address or address part"/>
				<br/><br/>
				<input type="submit" name="cust_search" value="Search" />
			</form>
		</div>
	</body>
</html>