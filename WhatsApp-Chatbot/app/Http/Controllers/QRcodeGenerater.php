<?php

namespace App\Http\Controllers;

// use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\item;
use App\Models\qr;


class QRcodeGenerater extends Controller
{
    public function QRGenerate(Request $request)
    {
        $filename = time() . '.svg';
        $path = "qrcode/$filename";
        $qr_data = new qr();
        $item = $request->item;
        $design = $request->design_no;
        $hsn = $request->hsn;
        $mrp = $request->mrp;
        $qr_data->item = $item;
        $qr_data->design_no = $design;
        $qr_data->hsn = $hsn;
        $qr_data->mrp = $mrp;
        $qr_data->QR = $path;
        if ($qr_data->save()) {
            echo "Success";
        } else {
            echo "Data not saved please try again later";
        }
        return QrCode::size(300)->generate(implode(',', $request->all()), $path);
        // $data = implode(',', $request->all());
        // $path = public_path('qrcode/' . time() . '.svg');
        // return QrCode::size(200)->generate($data);
    }
}
