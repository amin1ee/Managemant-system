<?php

namespace App\Http\Controllers;

use App\Models\ReorderRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReorderRequestController extends Controller
{
    public function index()
    {
        $reorders = ReorderRequest::all();
        return view('reorders.index', compact('reorders'));
    }
    public function store(ReorderRequest $reorder)
    {
        $reorder->with('product');
        dd($reorder);
        $pdf = Pdf::loadView('reorders.pdf', compact('reorder'));
        return $pdf->download();


    }

}
