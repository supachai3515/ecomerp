<?php
require 'vendor/autoload.php';

use When\When;

// friday the 13th forever; see which ones occur in 2018
$r = new When();
$r->startDate(new DateTime("19980213T090000"))
  ->rrule("FREQ=MONTHLY;BYDAY=FR;BYMONTHDAY=13");


$occurrences = $r->getOccurrencesBetween(new DateTime('2018-01-01 09:00:00'),
                                         new DateTime('2019-01-01 09:00:00'));
echo '<pre>';
print_r($occurrences);
echo '</pre>';

?>