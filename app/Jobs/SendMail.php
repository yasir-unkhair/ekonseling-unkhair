<?php

namespace App\Jobs;

use App\Mail\Register;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue, ShouldBeUnique
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    public $uniqueFor = 60; // 1 minute

    protected $content;
    protected $params;
    /**
     * Create a new job instance.
     */
    public function __construct($content, $params)
    {
        $this->content = $content;
        $this->params = $params;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->content == 'register') {
            Mail::to($this->params['email'])->send(new Register($this->params));
        }
    }

    public function uniqueId()
    {
        return $this->params['email'];
    }
}
