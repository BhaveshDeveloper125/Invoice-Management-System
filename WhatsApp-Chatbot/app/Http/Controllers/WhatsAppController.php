<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    public function SendWhatsAppMessage()
    {
        $SID = env('TWILIO_SID');
        $Token = env('TWILIO_AUTH_TOKEN');
        $WhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
        $Receiver = 'whatsapp:+918200649426';
        $message = "Hello I am Bhavesh from Digital Hero Software how can i help you Contact Number : 9773400215";

        $twilio = new Client($SID, $Token);

        try {
            $twilio->messages->create($Receiver, [
                "from" => "whatsapp:$WhatsAppNumber",
                "body" => $message,
            ]);
            return response()->json(['message' => 'WhatsApp message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
