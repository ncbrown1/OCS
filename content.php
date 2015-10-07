<?php

function readCSV($file) {
	$f = file($file);
	foreach($f as $k)
		$csv[] = explode("\t", $k);
	return $csv;
}
$lines = readCSV("data/objectcodes.tsv");
foreach($lines as $line) {
	echo "<tr class= \"result\">\n";
	foreach($line as $item) {
		echo "<td>" . $item . "</td>";
	}
	echo "</tr>\n";
}

?>