<html>

<head>
	<title>用PHP实现9*9乘法表</title>
</head>
<h2 align="center">9*9乘法表</h2>

<body style="background-color:rgb(85,170,173);">
	<table border="2px" align="center" style="background-color:rgb(148,41,35);">
		<?php
			for($i = 1; $i <= 9 ; $i++){		
				echo "<tr style='background-color:rgb(229,190,157);'>";
				for($j = 1; $j <= $i ; $j++)
				{
					echo "<th>".$i."*".$j."=".$i*$j."&nbsp;&nbsp;</th>";
				}
				echo "</tr>";
			}
		?>
	</table>
</body>

</html>
