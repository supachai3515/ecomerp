<?php
$graph = new PHPGraphLib(495, 280);
$data1 = array('alpha' => intval(rand(20) + 1), 'beta' => intval(rand(15) + 1), 'cappa' => intval(rand(10) + 1), 'delta' => intval(rand(20) + 1), 'echo' => intval(rand(10) + 1));
$data2 = array('alpha' => intval(rand(8) + 1), 'beta' => intval(rand(20) + 1), 'cappa' => intval(rand(20) + 1), 'delta' => intval(rand(20) + 1), 'echo' => intval(rand(50) + 1));
$data3 = array('alpha' => intval(rand(25) + 1), 'beta' => intval(rand(8) + 1), 'cappa' => intval(rand(10) + 1), 'delta' => intval(rand(50) + 1), 'echo' => intval(rand(50) + 1));
$data4 = array('alpha' => intval(rand(7) + 1), 'beta' => intval(rand(50) + 1), 'cappa' => intval(rand(5) + 1), 'delta' => intval(rand(50) + 1), 'echo' => intval(rand(50) + 1));
$data = array(rand(20, 30), rand(40, 50), 20, 44, 41, 18, rand(40, 50), 19, rand(40, 50));
$data2 = array(15, rand(20, 30), rand(20, 30), 11, rand(40, 60), 21, rand(40, 60), 34, rand(20, 30));
//$data3 = array(rand(40, 50), rand(20, 30), 34, 23, rand(45, 60), 32, 43, 41);

$graph->addData($data, $data2);
$graph->setTitle('CPU Cycles x1000');
$graph->setTitleLocation('left');
$graph->setLegend(true);
$graph->setLegendTitle('Module-1', 'Module-2', 'Module-3');
$xcolor1 = sprintf("XXX", rand(20, 255), rand(20, 250), rand(20, 250));
$xcolor2 = sprintf("XXX", rand(20, 250), rand(20, 255), rand(20, 250));
$graph->setGradient("#4ACDC7", "#4ACDC7");
$graph->createGraph();
