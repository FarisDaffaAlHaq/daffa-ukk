<?php

namespace App\Services\LogActivitiesServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\LogActivitiesServices\ServicesConfig;
use Dzaki236\LoggingServices\FileServicesConfig;

class MainLogActivitiesServices extends ServicesConfig
{
   /**
    * Constructor
    * @return void
    */
   public function __construct(ServicesConfig $conf)
   {
      parent::__construct();
      $this->limit = $conf->_limit();
   }

   /**
    * Get all logs
    * @return void
    */
   public function activitylog(bool $success, string $msglogs,?bool $dump = true): void
   {
      try {
         //code...
         if (app()->version() > 8) {
            # code...
            // for laravel 8x+
            $this->logdepedencies = new \App\Models\LogActivity;
         } else {
            # code...
            // for laravel 7x+ or -
            $this->logdepedencies = new \App\LogActivity;
         }
         $model = $this->logdepedencies;
         $request = request();
         $total = $model->all();
         $log = $this->logdepedencies;
         $log->msglogs = strtolower($msglogs);
         $log->action = $request->getPathInfo();
         if (Auth::check()) {
            # code...
            $log->user_id = Auth::user()->id;
         }

         $log->currurl = url()->current();
         $log->useragent = $request->header('User-Agent');
         $log->connection = $request->header('connection');
         $log->method = $request->method();
         $log->date = date('d-F-Y H:i:s');
         if ($success) {
            # code...
            $log->status = 'success';
         } else {
            # code...
            $log->status = 'failed';
         }
         if($dump){
            $config = new FileServicesConfig('logactivities.txt');
            $config->insert([
               $log->msglogs,
               $log->action,
               $log->user_id,
               $log->currurl,
               $log->useragent,
               $log->connection,
               $log->method,
               $log->date,
               $log->status
            ]);
         }
         $log->save();
         $flush = $this->flush_active();
         if ($flush == true) {
            if (count($total) >= $this->limit) {
               # code...
               DB::table('log_activities')->truncate();
               // $model->truncate(); //if not working use this
            }
         }
      } catch (\Exception $th) {
         //throw $th;
         // Debug error
         dd($th);
      }
   }

   /**
    * Get flush activated
    * @return bool
    */
   public function flush_active():bool
   {

      return config('logservices.flush');

   }
}
