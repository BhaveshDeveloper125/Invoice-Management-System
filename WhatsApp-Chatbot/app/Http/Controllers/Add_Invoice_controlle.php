<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\giftcardcreation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;


use Twilio\Rest\Client;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\returnSelf;



class Add_Invoice_controlle extends Controller
{
    public function AddInvoice(Request $request)
    {
        $add_invoice = new Invoice();

        if ($request->GiftCardNumber) {
            // $gettingGiftNumber = giftcardcreation::where('gift_card_number', $request->GiftCardNumber)->first();

            if ($gettingGiftNumber = giftcardcreation::where('gift_card_number', $request->GiftCardNumber)->first()) {
                $name = $request->name;
                $email = $request->email;
                $amount = $request->amount;
                $status = $request->status;
                $Bdate = $request->date;
                $Tdate = $request->Tdate;
                $phone = $request->phone;
                $disc = $request->GiftCardNumber;
                $jsondata = $request->input('items');
                // $data = $request->input('items');
                $data2 = json_decode($jsondata, true);
                $data = [$data2, $name, $email, $amount, $status, $Bdate, $Tdate, $phone, $disc];
                $pdfpath = 'Bhavesh_Invoice' . time() . '.pdf';
                $pdf = Pdf::loadView('DiscountPDFMaker', ['data' => $data]);
                Storage::disk('public')->put("public/invoices/$pdfpath", $pdf->output());


                $add_invoice->Name = $name;
                $add_invoice->Email = $email;
                $add_invoice->Amount = $amount;
                $add_invoice->Status = $status;
                $add_invoice->Birth_Date = $Bdate;
                $add_invoice->Transaction_Date = $Tdate;
                $add_invoice->InvoicePDF = "/storage/public/invoices/$pdfpath";
                $add_invoice->phone = $phone;


                $sid    = "ACb08351fd355999c1cc928fa7c499d9f5";
                $token  = "b6c89442a8a190f1b043b8514cc2c28c";
                $twilio = new Client($sid, $token);

                // try {
                //     Log::info('This is working fine...');
                //     $message = $twilio->messages->create(
                //         "whatsapp:+91$phone",
                //         [
                //             "from" => "whatsapp:+14155238886",
                //             "body" => "Congratulations! You are getting a 5% discount! 🎉  use the Gift card Number $GCN"
                //         ]
                //     );
                // } catch (\Exception $e) {
                //     $this->info($e->getMessage());
                // }




                $add_invoice->save();

                if ($add_invoice->save()) {
                    $gettingGiftNumber->delete();
                }
                return response()->json(['message' => $gettingGiftNumber]);
            } else {
                return response()->json(['message' => "oops this card does not exist or alredy use..."]);
            }
        }

        $name = $request->name;
        $email = $request->email;
        $amount = $request->amount;
        $status = $request->status;
        $Bdate = $request->date;
        $Tdate = $request->Tdate;
        $phone = $request->phone;
        $disc = 0;
        $jsondata = $request->input('items');
        // $data = $request->input('items');
        $data2 = json_decode($jsondata, true);
        $data = [$data2, $name, $email, $amount, $status, $Bdate, $Tdate, $phone,];
        $pdfpath = 'Bhavesh_Invoice' . time() . '.pdf';
        $pdf = Pdf::loadView('PDFDownloader', ['data' => $data]);
        Storage::disk('public')->put("public/invoices/$pdfpath", $pdf->output());


        $add_invoice->Name = $name;
        $add_invoice->Email = $email;
        $add_invoice->Amount = $amount;
        $add_invoice->Status = $status;
        $add_invoice->Birth_Date = $Bdate;
        $add_invoice->Transaction_Date = $Tdate;
        $add_invoice->InvoicePDF = "/storage/public/invoices/$pdfpath";
        $add_invoice->phone = $phone;
        $getEmailPhone = Invoice::where('Email', $request->email)->where('phone', $request->phone)->first();

        if ($getEmailPhone !== null) {
            $giftCN = new giftcardcreation();
            do {
                $GCN = rand(1000, 9999);
            } while (giftcardcreation::where('gift_card_number', $GCN)->exists());

            $giftCN->gift_card_number = $GCN;
            $giftCN->save();


            $sid    = "ACb08351fd355999c1cc928fa7c499d9f5";
            $token  = "b6c89442a8a190f1b043b8514cc2c28c";
            $twilio = new Client($sid, $token);
            // if ($getEmailPhone !== null) {
            //     // dd($getEmailPhone);
            //     $giftCN = new giftcardcreation();
            //     do {
            //         $GCN = rand(1000, 9999);
            //     } while (giftcardcreation::where('gift_card_number', $GCN)->exists());

            //     $giftCN->gift_card_number = $GCN;
            //     $giftCN->save();
            // }
            try {
                Log::info('This is working fine...');
                $message = $twilio->messages->create(
                    "whatsapp:+91$phone",
                    [
                        "from" => "whatsapp:+14155238886",
                        "body" => "Congratulations! You are getting a 5% discount! 🎉  use the Gift card Number $GCN"
                    ]
                );
            } catch (\Exception $e) {
                $this->info($e->getMessage());
            }
        }
        $add_invoice->save();



        if ($add_invoice->save()) {


            return response()->json(['message' => 'Data Saved']);
        } else {
            return response()->json(['message' => 'Data not Saved']);
        }
    }

    public function ShowInvoice(Request $request)
    {
        $ShowInvoice = Invoice::all();
        return view('Invoice_Dashboard', ['invoices' => $ShowInvoice]);
        // return response()->json($ShowInvoice);
    }

    public function DeleteInvoice($id)
    {
        $isDeleted = Invoice::destroy($id);
        if ($isDeleted) {
            return redirect('/display_invoices');
        }
    }

    public function EditInvoice($id)
    {
        $findUser = Invoice::find($id);
        return view('EditInvoices', ['user' => $findUser]);
    }

    public function FinalEdit(Request $request, $id)
    {
        $findUser = Invoice::find($id);
        $findUser->Name = $request->name;
        $findUser->Email = $request->email;
        $findUser->Amount = $request->amount;
        $findUser->Status = $request->status;
        $findUser->Birth_date = $request->date;
        $findUser->Transaction_Date = $request->Tdate;

        if ($findUser->save()) {
            return "Edit Success";
        } else {
            return "oops something went wrong...";
        }
    }

    public function ViewInvoice($id)
    {
        $findUser = Invoice::find($id);
        $path_to_pdf = $findUser->InvoicePDF;
        $file_path = public_path($path_to_pdf);
        if (file_exists($file_path)) {
            return response()->file($file_path);
        }
        // return view('ViewInvoices', ['data' => $findUser]);
    }

    public function DownloadInvoice($id)
    {
        $findUser = Invoice::find($id);
        $path_to_PDF = $findUser->InvoicePDF;
        $file_name = basename($path_to_PDF);
        $file_path = public_path($path_to_PDF);

        if (file_exists($file_path)) {
            return Response::download($file_path, $file_name);
        };
    }

    public function TrashedCustomers()
    {
        $trashedInvoices = Invoice::onlyTrashed()->get();
        return view('TrashedCustomers', ['trashedInvoices' => $trashedInvoices]);
    }

    public function RestoreTrashedUsers($id)
    {
        $restoreUser = Invoice::withTrashed()->find($id);
        if ($restoreUser) {
            $restoreUser->restore();
            return redirect('display_invoices');
        } else {
            return redirect('display_invoices');
        }
    }

    public function RemoveTrashedUsers($id)
    {
        $restoreUser = Invoice::withTrashed()->find($id);
        if ($restoreUser) {
            $restoreUser->forceDelete();
            return redirect('display_invoices');
        } else {
            return redirect('display_invoices');
        }
    }

    public function Phone(Request $request)
    {
        echo "$request->all()";
    }

    // API CODE
    public function APIShowInvoice(Request $request)
    {
        $ShowInvoice = Invoice::all();
        // return view('Invoice_Dashboard', ['invoices' => $ShowInvoice]);
        return response()->json($ShowInvoice);
    }
}
