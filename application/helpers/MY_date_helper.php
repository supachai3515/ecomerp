<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
     * Perform form week number of month
     *
     * @param date in format YYYY-MM-DD 
     *
     * @return Week number of current month or 0 by default
     */
if ( ! function_exists('week_number'))
{
	function week_number($date = null)
    {
    	$wknum = 0;
    	$date = $date != null ? $date : date('Y-m-d');

        $day = strtoupper(date("D", strtotime( $date )));
        $dd = date('d', strtotime( $date ));
        $year = date('Y', strtotime( $date ));
        $month = date('m', strtotime( $date ));
   			
        for($i=1; $i<=$dd; $i++){
            if($day==strtoupper(date("D", strtotime( $year.'-'.$month.'-'.$i )))){
                $wknum++;
            };
        }

        return $wknum;
    }
}


if ( ! function_exists('weekday_number'))
{
    function weekday_number($date) {
        return date('w', strtotime($date));
    }
}

if ( ! function_exists('thai_weekday'))
{
    function weekday_text_thai($day)
    {
        $d[0] = "อาทิตย์";
        $d[1] = "จันทร์";
        $d[2] = "อังคาร";
        $d[3] = "พุธ";
        $d[4] = "พฤหัส";
        $d[5] = "ศุกร์";
        $d[6] = "เสาร์";
        return $d[$day];
    }
}


if( ! function_exists('thai_month_short'))
{
    function thai_month_short($strDate)
    {
        $strYear = date("Y",strtotime($strDate)) + 543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear"; //$strHour:$strMinute";
    }
}


if( ! function_exists('datetime_now'))
{
    function datetime_now()
    {
        $dtNow = new DateTime();
        // Set a non-default timezone if needed
        $dtNow->setTimezone(new DateTimeZone('Asia/Bangkok'));

        $beginOfDay = clone $dtNow;
        $beginOfDay->modify('today');

        $endOfDay = clone $beginOfDay;
        $endOfDay->modify('tomorrow');
        // adjust from the start of next day to the end of the day,
        // per original question
        // Decremented the second as a long timestamp rather than the
        // DateTime object, due to oddities around modifying
        // into skipped hours of day-lights-saving.
        $endOfDateTimestamp = $endOfDay->getTimestamp();
        $endOfDay->setTimestamp($endOfDateTimestamp - 1);

        return  array(
                    'time' => $dtNow->format('Y-m-d H:i:s e'),
                    'start' => $beginOfDay->format('Y-m-d H:i:s e'),
                    'end' => $endOfDay->format('Y-m-d H:i:s e'),
                );
    }
}

if( ! function_exists('date_between'))
{
    function date_between($dates)
    {
        $result = array();
        $dates = explode("-",$dates);
        $date_start = trim($dates[0]);
        $date_start_exp = explode('/',$date_start);
        $date_start = $date_start_exp[2].'-'.$date_start_exp[1].'-'.$date_start_exp[0];

        $date_end = trim($dates[1]);
        $date_end_exp = explode('/',$date_end);
        $date_end = $date_end_exp[2].'-'.$date_end_exp[1].'-'.$date_end_exp[0];

        $result = array(
            'date_start' => $date_start,
            'date_end' => $date_end,
        );
    
        return $result;
        
    }
}


?>