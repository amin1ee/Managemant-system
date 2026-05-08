<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Reorder;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DashboardStats extends Component
{
    public function __construct(public $productsCount = 0, public $reordersCount = 0, public $notificationsCount = 0)
    {
        $this->productsCount = Product::count();
        $this->reordersCount = Reorder::count();
        $this->notificationsCount = Auth::user()->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-stats');
    }
}
