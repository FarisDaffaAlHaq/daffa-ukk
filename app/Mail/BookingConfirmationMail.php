<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\KamarOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kamarorder;
    public $qrCode;

    public function __construct(KamarOrder $kamarorder, $qrCode)
    {
        $this->kamarorder = $kamarorder;
        $this->qrCode = $qrCode;
    }

    public function build()
    {
        $pdf = Pdf::loadView('emails.bookingconfirmation', [
            'kamarorder' => $this->kamarorder,
            'qrCode' => $this->qrCode,
        ]);
    
        return $this->subject('Konfirmasi Booking - ' . $this->kamarorder->booking_kode)
                    ->view('emails.bookingconfirmation')
                    ->attachData($pdf->output(), 'Bukti_Booking_'.$this->kamarorder->booking_kode.'.pdf');
    }
}
