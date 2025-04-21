<?php 
namespace App\Services\LogActivitiesServices;

class ServicesConfig{

   public $logdepedencies;

   public $limit;

   public function __construct() {

      $this->logdepedencies;

      $this->limit = $this->_limit();
      
   }

   public static function _limit()
   {

      # code...

      return config('logservices.limit');

   }
   
}