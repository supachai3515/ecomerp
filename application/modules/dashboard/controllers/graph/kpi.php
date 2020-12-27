<?php
$graph = new PHPGraphLib(495, 280);

$data1 = array(rand(20, 30), rand(40, 50), 20, 44, 41, 18, rand(40, 50), 19, rand(40, 50));
$data2 = array(15, rand(20, 30), rand(20, 30), 11, rand(40, 60), 21, rand(40, 60), 34, rand(20, 30));
//$data3 = array(rand(40, 50), rand(20, 30), 34, 23, rand(45, 60), 32, 43, 41);

$graph->addData($data1, $data2);
$graph->setTitle('Sales achivement target');
$graph->setTitleLocation('left');
$graph->setLegend(true);
$graph->setLegendTitle('Target', 'Actual');

$graph->setGradient("#4ACDC7", "#4ACDC7");
$graph->createGraph();
