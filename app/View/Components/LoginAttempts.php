<?php

namespace App\View\Components;

use App\Models\LoginAttempt;
use Closure;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoginAttempts extends Component
{
    /**
     * Create a new component instance.
     */
    public $loginChart;
    public $loginAttempts;

    public function __construct()
    {
        $this->loginAttempts = LoginAttempt::latest()->take(5)->get();

        $successfulLogins = $this->loginAttempts->where('successful', true)->count();
        $failedLogins = $this->loginAttempts->where('successful', false)->count();

        $this->loginChart = Chartjs::build()
            ->name('loginChart')
            ->type('line')
            ->labels([
                'Successful Logins',
                'Failed Logins',
            ])
            ->datasets([
                [
                    'label' => 'Login attempts',
                    'data' => [
                        $successfulLogins,
                        $failedLogins,
                    ],

                    'backgroundColor' => [
                        '#22c55e',
                        '#ef4444',
                    ],
                ],
            ])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.login-attempts');
    }
}
