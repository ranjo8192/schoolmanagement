<?php
/* Print Left
   Triangle
*/
for($i=1;$i<=5;$i++)
{
	for($j=1;$j<=$i;$j++)
	{
		echo "&nbsp;&nbsp;";
		echo "*";
	}
	echo "<br/>";
}
?>
<?php
/* Print Left riverse triangle
   Triangle
*/
echo "<hr>";

for($i=5;$i>=1;$i--)
{
	for($j=1;$j<=$i;$j++)
	{
		echo "&nbsp;&nbsp;";
		echo "*";
	}
	echo "<br/>";
}
?>
<?php
/* Print right riverse triangle
   Triangle
*/
echo "<hr>";

for($i=1;$i<=5;$i++)
{
	for($j=5;$j>$i;$j--)
	{
		echo "&nbsp;&nbsp;";
		//echo "a";
	}
	for($k=1;$k<=$i;$k++)
	{
			echo "*";
	}	
	echo "<br/>";
}
?>
<?php
/* Print square/rectangle with same value in the rows */
echo "<hr>";

for($i=1;$i<=4;$i++)
{
	for($j=1;$j<=4;$j++)
	{
		echo $i."&nbsp;&nbsp;";
		//echo "a";
	}
	echo "<br/>";
}
?>

<?php
/* Print square/rectangle with increment value in the rows */
echo "<hr>";

for($i=1;$i<=4;$i++)
{
	for($j=1;$j<=4;$j++)
	{
		echo $j."&nbsp;&nbsp;";
		//echo "a";
	}
	echo "<br/>";
}
?>
<?php
/* Print square/rectangle with increment value */
echo "<hr>";

$k=1;
for($i=1;$i<=4;$i++)
{
	
	for($j=1;$j<=4;$j++)
	{
		
		echo $k."&nbsp;&nbsp;";
		$k = $k+1;
		
		//echo "a";
	}
	echo "<br/>";
}
?>
<?php
/* Print square/rectangle for table 2 */
echo "<hr>";

$k=2;
for($i=1;$i<=4;$i++)
{
	
	for($j=1;$j<=4;$j++)
	{
		
		echo $k."&nbsp;&nbsp;";
		$k = $k+2;
	}
	echo "<br/>";
}
?>
<?php
/* Print square/rectangle odd numbers*/
echo "<hr>";

$k=1;
for($i=1;$i<=4;$i++)
{
	
	for($j=1;$j<=4;$j++)
	{
		
		echo $k."&nbsp;&nbsp;";
		$k = $k+2;
	}
	echo "<br/>";
}
?>
<?php
/* Print Rectangle for a to d like a, a b, a b c, a b c d */
echo "<hr>";
$alpha = range('A','Z');
for($i=0;$i<5;$i++)
{
	for($j=0;$j<=$i;$j++)
	{
		
		echo $alpha[$j]."&nbsp;&nbsp;";
		//$k = $k+2;
	}
	echo "<br/>";
}
?>
<?php
/* Print Rectangle for a to d like a, a b, a b c, a b c d  in reverse order*/
echo "<hr>";
$alpha = range('A','Z');
for($i=0;$i<=5;$i++)
{
	
	for($j=5;$j>=$i;$j--)
	{
		//echo "x";
		echo "&nbsp;&nbsp;";
		//echo $alpha[$j]."&nbsp;&nbsp;";
		//$k = $k+2;
	}
	for($k=0;$k<=$i;$k++)
	{
		echo $alpha[$i];
	}
	echo "<br/>";
}
?>