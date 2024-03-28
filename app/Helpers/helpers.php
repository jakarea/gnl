<?php

use App\Models\Task;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Notification;

function NotifyReaUnred($notifyId){
    $notification = Notification::findOrFail($notifyId);

    if ($notification->status == 0) {
        $notification->update(['status' => 1]);

        switch ($notification->action_link) {
            case 'customers.show':
                $exists = Customer::where('customer_id', $notification->action_id)->exists();
                break;
            case 'projects.single':
                $exists = Project::where('project_id', $notification->action_id)->exists();
                break;
            case 'task.show':
                $exists = Task::where('task_id', $notification->action_id)->exists();
                break;
            default:
                $exists = false;
                break;
        }

        return $exists ? true : false;
    }

    return false;
}
