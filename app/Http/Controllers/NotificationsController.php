<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $notifications = $user->notifications()->latest()->paginate(20);

        return view('notifications.index', compact('notifications'));

    }

    public function destroy($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->delete();
            return back()->with('success', 'Notification deleted!');
        }
        return back()->with('error', 'Notification not found.');
    }
}
