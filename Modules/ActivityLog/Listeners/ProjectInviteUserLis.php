<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\Taskly\Events\ProjectInviteUser;

class ProjectInviteUserLis
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
    public function handle(ProjectInviteUser $event)
    {
        if (module_is_active('ActivityLog')) {
            $user = $event->user;
            $project = $event->project;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'Projects';
            $activity['sub_module']     = 'Project';
            $activity['description']    = __('New User ') . $user->name . __(' Invited in Project ') . $project->name . __(' by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $project->workspace;
            $activity['created_by']     = $project->created_by;
            $activity->save();
        }
    }
}
