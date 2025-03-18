<?php

namespace App\Observers;

use App\Models\Invoice;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */

    public function creating(Invoice $invoice)
    {
        $last_invoice = Invoice::orderBy('id', 'desc')->first();
        $invoice->Invoice_ID = $last_invoice ? $last_invoice->Invoice_ID + 1 : 1000;
    }
    public function created(Invoice $invoice): void
    {
        $invoice->save();
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
