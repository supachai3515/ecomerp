<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('GetWhereCommandStringInt')) {
    function GetWhereCommandStringInt($fieldName, $condition)
    {
        if ($condition == null) {
            return  "";
        }

        $retString = "($fieldName = $condition)";

        if ($retString != "")
            $retString = " AND " . $retString;

        return $retString;
    }
}


if (!function_exists('GetWhereCommandString')) {
    function GetWhereCommandString($fieldName, $condition)
    {
        if ($condition == null) {
            return  "";
        }

        $condition = str_replace("'", "''", $condition);
        $retString = "($fieldName = '$condition')";

        if ($retString != "")
            $retString = " AND " . $retString;

        return $retString;
    }
}

if (!function_exists('GetWhereAndLikeString')) {
    function GetWhereAndLikeString($fieldName, $condition)
    {
        if ($condition == null || $condition == "") {
            return  "";
        }

        $condition = GetNVARCHARtoSearch($condition);
        $retString = "($fieldName LIKE $condition)";

        if ($retString != "")
            $retString = " AND " . $retString;

        return $retString;
    }
}

if (!function_exists('GetNVARCHARtoSearch')) {

    function GetNVARCHARtoSearch($value)
    {
        if ($value == "")
            return "NULL";


        $value = str_replace(" ", "%", $value);
        $value = str_replace("'", "''", $value);
        $value = "'%$value%'";
        return   $value;
    }
}


if (!function_exists('GetConfigByCode_name')) {

    function GetConfigByCode_name($value)
    {
        $CI = &get_instance();

        if ($value == "")
            return "NULL";

        $sql = "SELECT  ps.*   FROM  config ps  WHERE   ps.is_active = 1";
        $sql =  $sql . GetWhereCommandString('ps.code_name', $value);

        $result = $CI->db->query($sql);
        $result_data = $result->row_array();
        if ($result != null)
            return $result_data['value'];
    }
}
if (!function_exists('GetWhereCommandDateTime')) {
    function GetWhereCommandDateTime($fieldName, $fromDate, $toDate)
    {
        if ($fromDate == null || $toDate == null || $fromDate == "" || $toDate == "")
            return "";

        $retString = "";

        if ($toDate >= $fromDate) {
            $retString =  "( " . $fieldName . " BETWEEN '" . $fromDate->format('Y-m-d') . "'  AND  '" . $toDate->format('Y-m-d') . " 23:59:59' )";
        } else {
            $retString =  "( " . $fieldName . "  = '" . $toDate->format('Y-m-d') . "')";
        }

        if ($retString != "") {
            $retString = "AND " . $retString;
        }
        return $retString;
    }
}

// public static string GetWhereCommandDateTime(string fieldName, string fromDate, string toDate)
// {
//     if (fromDate.IsNullOrWhiteSpace() || toDate.IsNullOrWhiteSpace())
//         return string.Empty;

//     string retString;

//     if (DateTime.Parse(toDate) > DateTime.Parse(fromDate))
//     {
//         retString = $"(CONVERT(DATETIME,{fieldName}) BETWEEN CONVERT(DATETIME,'{fromDate}')  AND CONVERT(DATETIME,'{toDate} 23:59:59')) ";
//     }
//     else
//     {
//         retString = $"( CONVERT(nvarchar(10),{fieldName}, 121)  = CONVERT(nvarchar(10), CONVERT(DATETIME,'{toDate}'), 121)  ) ";
//     }

//     if (retString != string.Empty)
//         retString = "AND " + retString;

//     return retString;
// }
