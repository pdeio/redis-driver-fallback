<?php

namespace Pdeio\RedisDriverFallback;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class AlertEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        try {
            return $this->markdown('pdeio.redis-driver-fallback-email-template.alert')->with(['now' => Carbon::now()]);
        } catch (\Exception $e) {
            if (config('redis-driver-fallback.email_config.catch_error', false)) {
                $error = 'the view pdeio.redis-driver-fallback-email-template.alert not exists, please run php artisan vendor:publish --provider="Pdeio\RedisDriverFallback\RedisDriverServiceProvider"' . $e;
                $contents = \Storage::get('redis/mails_error.log');
                $contents .= $error;
                \Storage::put('redis/mails_error.log', $contents);
            } else {
                throw $e;
            }
        }
    }
}
