<?php

namespace Kosmoss\Netpeak;

require_once "../Lib/View.php";
require_once "BaseTriangle.php";

class AreaTriangle extends BaseTriangle
{
    protected $defaultTpl = 'area.phtml';
    protected $title      = 'Result';

    public function existenceTriangle($a, $b, $c)
    {
        return (($c < ($a + $b)) && ($a < ($b + $c)) && ($b < ($a + $c))) ? 1 : 0;
    }

    public function show_form()
    {

        $title = 'Calculating the area of a triangle';
        $HTML
               = '
	<html>
	<title>' . $title . '</title>
	<LINK rel="stylesheet" type="text/css" title="Style" href="../css/style.css">
	<body>
	<table>
	<caption class = "name-table">Calculating the area of a triangle</caption>
		<tr>
			<td>
				<img src="triangle.png" width="300" height="276" alt="triangle"/><br/><br/>
			</td>
		</tr>
		<form action="netpeak_area_triangle.php" method="post">
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
				<a href = "netpeak.html">Back to the menu</a>
			</td>
		</tr>
	</table>

	</body>
	</html>';
        echo $HTML;
    }
}
