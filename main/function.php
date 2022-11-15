<?php
function number_fm($int)
{
    if ($int == 0) {
        return "-";
    } else {
        return (number_format($int));
    }
}

function DateDesc($strDate)
{
    $strYearTH = date("Y", strtotime($strDate)) + 543;
    $strYearEN = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthTH_Cut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthTH_Short_Cut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthEN_Cut = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthEN_Short_Cut = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    $strMonthTH = $strMonthTH_Cut[$strMonth];
    $strMonthTH_Short = $strMonthTH_Short_Cut[$strMonth];
    $strMonthEN = $strMonthEN_Cut[$strMonth];
    $strMonthEN_Short = $strMonthEN_Short_Cut[$strMonth];
    $date_TH_Text = "$strDay $strMonthTH $strYearTH";
    $date_TH_Text_Short = "$strDay $strMonthTH_Short $strYearTH";
    $date_EN_Text = "$strDay $strMonthEN $strYearEN";
    $date_EN_Text_Short = "$strDay $strMonthEN_Short $strYearEN";
    $Time = "$strHour:$strMinute:$strSeconds";
    return array(
        "time" => $Time,
        "date_TH_text" => $date_TH_Text,
        "date_TH_text_short" => $date_TH_Text_Short,
        "datetime_TH" => $date_TH_Text_Short . " (" . $Time . " น.)",
        "date_EN_text" => $date_EN_Text,
        "date_EN_text_short" => $date_EN_Text_Short,
        "datetime_EN" => $date_EN_Text_Short . " (" . $Time . ")",
        "day" => $strDay,
        "month" => $strMonth,
        "year" => $strYearEN,
        "year_TH" => $strYearTH,
        "month_TH" => $strMonthTH,
        "month_TH_short" => $strMonthTH_Short,
        "month_EN" => $strMonthEN,
        "month_EN_short" => $strMonthEN_Short
    );
}

function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
