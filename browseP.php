<!--browse products-->
<?php
//kicks users out if they are not logged in
	session_start();
	if (!isset($_SESSION['email']))
	{
		header('Location: shopperlogin.php');
		exit;
	}
?>
<?php
	include_once('config.php');
	include_once('dbutils.php');

	$title ="Products";
	$h1 = "Products";
	$menuActive=1;
	include_once("shopperheader.php");
?>
	<div class="col-xs-6">
		<div class="col-xs-12">
			<div id="container">
		
<form action = "browseP.php" method="post">
	<select class="form-control" style="width: 200" name="order" data-default-value=<?php $query ?>>
			<option selected disabled hidden>Order By:</option>
			<option value="SELECT IMAGE,PNAME,CATEGORY, PRICE FROM PRODUCT ORDER BY PNAME ASC;">A-Z</option>
			<option value="SELECT IMAGE,PNAME, CATEGORY, PRICE FROM PRODUCT ORDER BY PNAME DESC;">Z-A</option>
			<option value="SELECT IMAGE,PNAME,CATEGORY, PRICE FROM PRODUCT ORDER BY PNAME ASC;">Category</option>
	</select><button type ="submit" class="btn btn-default" name="submit">Go</button>
</form>
	<table class='table table-hover'>

		<thead>
			<th></th>
			<th>Product</th>
			<th>Category</th>
			<th>Price</th>
		</thead>
		<!--include config and util files-->
		<?php

		//connect to the database
		$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
		//run the query

		if (isset($_POST['submit']))
		{$query = $_POST['order'];}
		else{$query ="SELECT IMAGE,PNAME,CATEGORY, PRICE FROM PRODUCT ORDER BY PNAME ASC;";}
		$result= queryDB($query, $db);
				
		while($row = nextTuple($result))
		{
			echo'<tr>';
			echo'<td>';
			if ($row['IMAGE'])
			{$imagelocation=$row['IMAGE'];
			$altText="product" . $row['PNAME'];
			echo "<img src='$imagelocation' width='150' alt=$altText'>";}
			echo'</td>';
			echo '<td>' . $row['PNAME'] . '</td>';
			echo '<td>' . $row['CATEGORY'] . '</td>';
			echo '<td>'; echo"$"; echo $row['PRICE']; echo'</td>';
			echo'</tr>';
		}
		?>
	</table>
<?php
	include_once("footer.php");
?>