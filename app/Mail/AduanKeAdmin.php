<?php

namespace App\Mail;

use App\Models\Aduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AduanKeAdmin extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * The aduan instance.
     *
     * @var \App\Models\Aduan
     */
    public $aduan;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return void
     */
    public function __construct(Aduan $aduan)
    {
        $this->aduan = $aduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Aduan Baru Masuk')
            ->view('emails.aduan-admin');
    }
}
