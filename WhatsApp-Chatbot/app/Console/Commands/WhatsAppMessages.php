<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Carbon\Carbon;
use Twilio\Rest\Client;

class WhatsAppMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->format('d-m');
        $invoices = Invoice::all();

        foreach ($invoices as $i) {
            $birth_date = Carbon::parse($i->Birth_date)->format('d-m');
            if ($today == $birth_date) {
                $phone = $i->phone;

                $this->info($phone);

                // $SID = env('TWILIO_SID');
                // $Token = env('TWILIO_AUTH_TOKEN');
                // $WhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
                // $Receiver = "whatsapp:+91$phone";

                // $twilio = new Client($SID, $Token);

                try {
                    $sid    = "";
                    $token  = ""; //use your own sid and tokens
                    $twilio = new Client($sid, $token);

                    $message = $twilio->messages->create(
                        "whatsapp:+91$phone",
                        [
                            "from" => "whatsapp:+14155238886",
                            "body" => 'Happy BirthDay My dear many many congratulations...'
                        ]
                    );
                } catch (\Exception $e) {
                    $this->info($e->getMessage());
                }
                $this->info('Happy Birthday');
            }
        }
    }
}
