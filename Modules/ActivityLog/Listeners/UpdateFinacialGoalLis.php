<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\Goal\Events\UpdateFinacialGoal;

class UpdateFinacialGoalLis
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
    public function handle(UpdateFinacialGoal $event)
    {
        if (module_is_active('ActivityLog')) {
            $goal = $event->goal;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'Accounting';
            $activity['sub_module']     = 'Finacial Goal';
            $activity['description']    = __('Finacial Goal Updated by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $goal->workspace;
            $activity['created_by']     = $goal->created_by;
            $activity->save();
        }
    }
}
