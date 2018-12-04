<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $code;
    public function __construct($code)
    {
       $this->code = $code; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('QuanLiPhatGiao@gmail.com')->subject('Hệ Thống Quản Lí Hồ Sơ Phật Giáo')->view('member.mailsend',['code'=>$this->code]);
    }
}
