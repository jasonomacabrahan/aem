<?php


namespace App\Helpers;
use Request;
use App\Models\User;
use App\Models\LogActivity as LogActivityModel;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::join('users','users.id','=','log_activities.user_id')
								->orderBy('log_activities.id','desc')
								->get(['log_activities.*','users.*','log_activities.created_at as logdate']);
    }


}