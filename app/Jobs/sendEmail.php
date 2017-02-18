<?php

namespace itstep\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use itstep\Models\ListModel;
use itstep\Mail\Test as TestMail;

use itstep\Models\EmailSendType as EmailSendTypeModel;
use itstep\Models\EmailSendSetting as EmailSetSettingModel;

class sendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $listId;

    private $message;

    private $subject;

    private $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($listId, $message, $subject, $userId)
    {
        $this->listId = $listId;
        $this->message = $message;
        $this->subject = $subject;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Config::set('mail.driver', $this->getMailDriver());
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();

        $listSubscribers = ListModel::findOrFail($this->listId)->subscribers()->get();
        foreach ($listSubscribers as $subscriber) 
        {
            $mail = new TestMail($this->message, $this->subject);
            \Mail::to($subscriber->email)->send($mail);
        }
    }



    private function getMailDriver()
    {
        $typeId = EmailSetSettingModel::where('user_id', $this->userId)->value('type_send_id');
        if (!empty($typeId)) {
            return EmailSendTypeModel::find($typeId)->type;
        }
        else{
            return EmailSendTypeModel::first()->type;
        }
    }
}
