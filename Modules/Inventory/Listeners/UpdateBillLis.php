<?php

namespace Modules\Inventory\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Account\Entities\Bill;
use Modules\Account\Events\UpdateBill;
use Modules\Inventory\Entities\Inventory;

class UpdateBillLis
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UpdateBill $event)
    {
        if (module_is_active('Inventory')) {
            $request   = $event->request;
            $bill          = $event->bill;

            $products = $request->items;

            for ($i = 0; $i < count($products); $i++) {
                $inventory = new Inventory();
                $inventory['product_id']  = $products[$i]['item'];
                $inventory['type']        = 'Bill';
                $inventory['quantity']    = $products[$i]['quantity'];
                $inventory['description'] = $products[$i]['quantity'] . ' ' . __('Quantity Updated by') . ' ' . Bill::billNumberFormat($bill->bill_id) . '.';
                $inventory['feild_id']    = $bill->id;
                $inventory['workspace']   = $bill->workspace;
                $inventory['created_by']  = $bill->created_by;
                $inventory->save();
            }

        }
    }
}
