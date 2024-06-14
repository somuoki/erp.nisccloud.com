<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\Account\Events\CreateCustomer;

class CreateCustomerLis
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
    public function handle(CreateCustomer $event)
    {
        if (module_is_active('ActivityLog')) {
            $customer = $event->customer;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'Accounting';
            $activity['sub_module']     = 'Customer';
            $activity['description']    = __('New Customer created by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $customer->workspace;
            $activity['created_by']     = $customer->created_by;
            $activity->save();
        }
    }
}
