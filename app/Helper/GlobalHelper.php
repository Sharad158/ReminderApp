<?php
namespace App\Helper;

class GlobalHelper
{
  public static function getFormattedDate($date)
  {
    if(!empty($date)){
      $date = date_create($date);
      return date_format($date, "d-M-Y h:i A");
    }
    else {
      return "";
    }
  }
}

?>