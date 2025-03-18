<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SendWhatsAppMessageController extends Controller
{
    public function SendFormMessage(Request $request)
    {
        $item1 = $request->item1;
        $item2 = $request->item2;
        $name = $request->fname;
        $WNumber = $request->WhatsApp;

        $SID = env('TWILIO_SID');
        $Token = env('TWILIO_AUTH_TOKEN');
        $WhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
        $Receiver = "whatsapp:+91$WNumber";

        $twilio = new Client($SID, $Token);

        try {
            $data = [
                'title' => 'PDF Title',
                'date' => date('d/m/y'),
                'message' => "Welcome $name to our Shop and Thanks for Purchasing the $item1 and $item2",
            ];
            $pdf = Pdf::loadView('PDFDownloader', $data);
            Storage::disk('public')->put('public/Bhavesh.pdf', $pdf->output());

            $pdfUrl = url(Storage::url('public/Bhavesh.pdf'));

            $response = $twilio->messages->create($Receiver, [
                "from" => "whatsapp:$WhatsAppNumber",
                "body" => "Welcome $name to our Shop and Thanks for Purchasing the $item1 and $item2. Download your invoice here: $pdfUrl",
            ]);

            // return $pdf->download('Bhavesh.pdf');
            return redirect('/login');
        } catch (\Exception $e) {
            Log::error('Error sending message', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
