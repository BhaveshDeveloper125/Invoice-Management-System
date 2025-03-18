<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\invoice_data;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;


class Invoice_Controller extends Controller
{
    public function Invoicefunction(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $item1 = $request->item1;
        $item2 = $request->item2;

        $invoice = new invoice_data();

        $data = [
            'title' => 'This is the title of the PDF',
            'date' => date('d/m/y'),
            'message' => "Welcome $name Thank you for Purchasing the $item1 and $item2."
        ];
        $pdfname = 'invoice_' . time() . '.pdf';
        $pdfpath = "invoice_$pdfname";
        $pdf = Pdf::loadView('PDFDownloader', $data);
        Storage::disk('public')->put($pdfpath, $pdf->output());
        // Storage::disk('public')->put('public/Bhavesh.pdf', $pdf->output());


        $invoice->name = $name;
        $invoice->phone = $phone;
        $invoice->item1 = $item1;
        $invoice->item2 = $item2;
        $invoice->media = $pdfpath;
        $invoice->URL =  "http://127.0.0.1:8000/storage/$pdfpath";

        if ($invoice->save()) {
            $SID = env('TWILIO_SID');
            $Token = env('TWILIO_AUTH_TOKEN');
            $WhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
            $Receiver = "whatsapp:+91$phone";

            $twilio = new Client($SID, $Token);
            try {
                $response = $twilio->messages->create($Receiver, [
                    "from" => "whatsapp:$WhatsAppNumber",
                    "body" => "Welcome $name to our Shop and Thanks for Purchasing the $item1 and $item2. ",
                    "mediaUrl" => "https://beta.gujaratuniversity.ac.in/data/pdfs/admissionseatmetrix/BSC_Information_Booklet_PNG_21_5_2022.pdf",


                    // "mediaUrl" => "https://64d6-2402-a00-405-cfe6-683f-1136-5e4e-f520.ngrok-free.app/storage/$pdfpath",
                    //"mediaUrl" => "http://127.0.0.1:8000/storage/$pdfpath",
                ]);
                // dd($response);
                return redirect('/invoice-form');
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return response()->json([
                'message' => 'oops something went wrong...',
            ]);
        }
    }
}
