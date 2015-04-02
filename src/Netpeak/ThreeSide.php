<?php

namespace Kosmoss\Netpeak;

    //require_once "../Lib/View.php";
//require_once "BaseTriangle.php";

class ThreeSide extends BaseTriangle
{
    protected $defaultTpl = '3_side.phtml';
    protected $title      = 'Result';

    public function existenceTriangle($a, $b, $c)
    {
        return (($c > ($a + $b)) || ($a > ($b + $c)) || ($b > ($a + $c))) ? 0 : 1;
    }

    public function show_form()
    {

        $title = 'The definition of a third side of a right triangle';
        $HTML
               = '
	<html>
	<title>' . $title . '</title>
	<LINK rel="stylesheet" type="text/css" title="Style" href="../css/style.css">
	<body>
	<table>
	<caption class = "name-table">The definition of a third side of a right triangle</caption>
		<tr>
			<td>
				<img src="../img/triangle.png" width="300" height="276" alt="triangle"/><br/><br/>
			</td>
		</tr>
		<form action="netpeak_3_side.php" method="post">
		<tr>
			<td>
				A <input type="number" class = "form_action" min = "0" name="a" /> <br/><br/>
				B <input type="number" class = "form_action" min = "0" name="b" /> <br/><br/>
				C <input type="number" class = "form_action" min = "0" name="c" />
			</td>
		</tr>
		<tr>
			<td align = "right">
				<input type="submit" value="submit" /> <br/>
			</td>
		</tr>
		</form>
		<tr>
			<td>
				<a href = "index.php">Back to the menu</a>
			</td>
		</tr>
	</table>
	</body>
	</html>';
        echo $HTML;
    }
}