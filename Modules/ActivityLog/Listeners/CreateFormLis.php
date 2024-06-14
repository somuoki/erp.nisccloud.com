<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\FormBuilder\Events\CreateForm;

class CreateFormLis
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
    public function handle(CreateForm $event)
    {
        if (module_is_active('ActivityLog')) {
            $form = $event->form_builder;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'CRM';
            $activity['sub_module']     = 'Form Builder';
            $activity['description']    = __('New Form Created by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $form->workspace;
            $activity['created_by']     = $form->created_by;
            $activity->save();
        }
    }
}
