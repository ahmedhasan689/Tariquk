<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class NotificationMenu extends Component
{
    /**
     * @var \App\Notifications\ReportCreatedNotification
     */
    public $notifications;

    public $unread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->notifications = $user->notifications()->limit(5)->get();
        $this->unread = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-menu');
    }
}
