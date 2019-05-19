<?php
  class Time {
    public static $timezone;

    public function __construct(){
     Time::$timezone=new DateTimeZone('Africa/Nairobi');
    }

    function get_now($format='Y-m-d H:i:s'){
      return date_create('now',Time::$timezone)->format($format);
    }

    function get_timezone_offset($timezone){
      return (int)date_create('now',$timezone)->getOffset()/3600;
    }

    function time_diff($date1,$date2,$precision='seconds'){
      $precisions=array('seconds'=>1,'days'=>86400,'milliseconds'=>0.001);
      $sign = array('+','-');
      if(!array_key_exists($precision, $precisions)) return false;
      $difference = date_diff(date_create($date2,Time::$timezone),date_create($date1,Time::$timezone));
      $days = $difference->format("%a") * 86400;
      $hours = $difference->h * 3600;
      $minutes = $difference->i * 60;
      $seconds = $difference->s;
      return $sign[$difference->invert].(($days + $hours + $minutes + $seconds) / $precisions[$precision]);
    }

    /**
     * @param String $contrast number prepended with (-|+) for past or future
     * @param String $period seconds|minutes|hours|days|weeks|months|years
     * @param String $from_date default is date now
     */
    function get_date_contrast($contrast, $period, $from_date = 'now',$format="Y-m-d H:i:s"){
      $from_date = $from_date !== 'now' ? $from_date : $this->get_now();
      $response = strtotime(trim($contrast)." ".trim(strtolower($period)) ,strtotime($from_date));
      return date($format,$response);
    }

    function get_past_by_days($by,$start_date='now'){
    	return $this->get_date_constract("-".$by,'days',$start_date);
    }

    function get_future_by_days($by,$start_date='now'){
    	return $this->get_date_constract("+".$by,'days',$start_date);
    }

    function get_past_by_months($by,$start_date='now'){
    	return $this->get_date_constract("-".$by,'months',$start_date);
    }

    function get_future_by_months($by,$start_date='now'){
    	return $this->get_date_constract("+".$by,'months',$start_date);
    }

    function get_past_by_years($by,$start_date='now'){
    	return $this->get_date_constract("-".$by,'years',$start_date);
    }

    function get_future_by_years($by,$start_date='now'){
    	return $this->get_date_constract("+".$by,'years',$start_date);
    }

    function format_date($date='now',$format='Y-m-d H:i:s'){
    	return date_create($date,Time::$timezone)->format($format);
    }

    function unix_to_date($unix,$format='Y-m-d H:i:s'){
        $date = date_create("@$unix",Time::$timezone)->format($format);
        return $date;
    }

    function get_mpesa_timestamp(){
      return $this->get_now('Ymdhis');
    }
  }