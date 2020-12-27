<?php 

require_once('vendor/autoload.php');


$timezone    = 'Asia/Bangkok';
$startDate   = new \DateTime('2013-06-12 20:00:00', new \DateTimeZone($timezone));
//$endDate     = new \DateTime('2013-06-14 20:00:00', new \DateTimeZone($timezone)); // Optional
//$rule        = new \Recurr\Rule('FREQ=MONTHLY;COUNT=5', $startDate, $endDate, $timezone);

$rule = (new \Recurr\Rule)
    ->setStartDate($startDate)
    ->setTimezone($timezone)
    ->setFreq('DAILY')
    ->setByDay(['MO', 'TU'])
    ->setUntil(new \DateTime('2017-12-31'));

echo $rule->getString(); //FREQ=DAILY;UNTIL=20171231T000000;BYDAY=MO,TU


$timezone    = 'Asia/Bangkok';
$startDate   = new \DateTime('2020-01-24 00:00:00', new \DateTimeZone($timezone));
$rule        = new \Recurr\Rule('FREQ=WEEKLY;BYDAY=MO,TU;COUNT=2', $startDate, null, $timezone);
$transformer = new \Recurr\Transformer\ArrayTransformer();

$transformerConfig = new \Recurr\Transformer\ArrayTransformerConfig();
$transformerConfig->enableLastDayOfMonthFix();
$transformer->setConfig($transformerConfig);


// DateTimes used for filtering 
$startDate   = new \DateTime('2020-01-26 00:00:00', new \DateTimeZone($timezone));
$endDate   = new \DateTime('2020-02-27 23:59:59', new \DateTimeZone($timezone));

// true so extremes are included
$result = $transformer->transform($rule)->startsBetween($startDate,$endDate, true )->toArray();

if (count($result) > 0) {
   // then It means this day is "included"
	echo '<pre>';
	print_r($result);
	echo '</pre>';
}




// $transformer = new \Recurr\Transformer\ArrayTransformer();

// print_r($transformer->transform($rule));
