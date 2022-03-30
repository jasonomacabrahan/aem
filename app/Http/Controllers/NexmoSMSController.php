<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
class NexmoSMSController extends Controller
{
    public function index()
    {

        $basic  = new \Vonage\Client\Credentials\Basic("42d1d39d", "mXH9NrKNTDoZvFSb");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639456618412", BRAND_NAME, 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
