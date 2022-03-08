<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use App\Models\OneTimePassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \Crypt;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$email)
    {
        $this->details = $details;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function confirmationcode()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); 
        $alphaLength = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return $code = implode($pass);
    }

    public function build()
    {
       
        
        $emailni = implode($this->email,',');
        $ccode = $this->confirmationcode();

        $otp = new OneTimePassword;
        $otp->email = $emailni;
        $otp->status = 0;
        $otp->otp = $ccode;
        $save = $otp->save();
        return $this->subject('iMC3 AEM Account Confirmation')
                     ->view('mail',['ccode'=>$ccode]);
                    
    }
}
