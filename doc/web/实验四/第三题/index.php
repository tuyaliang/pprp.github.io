<html>

<head>
	<title>php访问数据库</title>
</head>

<body style="bgcolor:#83f">
	<h1 align="center">php访问数据库(以表格的形式)</h1>
	<table border="2px" style="align:center;">
		<?php
		$con=mysql_connect('127.0.0.1','root','123456') or die("couldn't connect".mysql_connect_error());
	
		mysql_select_db("test",$con);
		$result=mysql_query("select * from mydb") or die(mysql_error());
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>name</th>";
		echo "<th>url</th>";
		echo "<th>intro</th>";
		echo "</tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<th>".$row['id']."</th>";
			echo "<th>".$row['name']."</th>";
			echo "<th>".$row['url']."</th>";
			echo "<th>".$row['intro']."</th>";
			echo "</tr>";
		}	
		mysql_close($con);
?>
	</table>
</body>

</html>