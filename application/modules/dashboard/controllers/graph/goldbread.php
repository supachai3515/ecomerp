<?php
// include('../phpgraphlib.php');
$graph = new PHPGraphLib(800, 350);
// $graph = new PHPGraphLib(800, 350, APPPATH .'modules/dashboard/controllers/graph/img/image.png');

$data1 = array(
    'BK' => 97,
    'KB' => 101,
    'KR' => 109,
    'NP' => 103,
    'KK' => 114,
    'AY' => 118,
    'RY' => 124,
    'SK' => 53,
    'PY' => 52,
    'SR' => 51,
    'CB' => 104,
    'UB' => 56,
    'KL' => 54,
    'LA' => 64,
    'UD' => 57,
    'PC' => 62,
    'BR' => 80,
    'LB' => 104,
    'SN' => 92,
    'NS' => 122,
);


$graph->addData($data1);
$graph->setTitle('Monthly sales achievement');
$graph->setLegendTitle('Target', 'Actual');

$graph->setGradient("#4ACDC7", "#4ACDC7");
// $graph->setGradient('#65E465', '#65E465');
// $graph->setBarOutlineColor('#009600');

$graph->setupYAxis(12);

$graph->setDataValues(true);
$graph->setDataValueColor('navy');
$graph->setDataFormat('percent');

$graph->setGoalLine(100);
$graph->setGoalLineColor('red');

$graph->createGraph();
