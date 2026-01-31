<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function send()
    {
        $admin = User::find(1);
        $admin->notify(new NewOrderNotification('Ali', 'Laptop', 1200));
        // $admins = User::where('type', 'admin')->get();
        // Notification::send($admins, new NewOrderNotification());
        return 'Notification sent';
    }

}
