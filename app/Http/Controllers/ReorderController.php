<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReorderRequest;
use App\Models\Reorder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReorderController extends Controller
{
    public function index()
    {
        $reorders = Reorder::all();
        return view('reorders.index', compact('reorders'));
    }
    public function edit(Reorder $reorder)
    {
        return view("reorders.edit", compact('reorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Reorder $reorder, ReorderRequest $request)
    {

        $validated = $request->validated();

        $reorder->update($validated);

        return redirect()
            ->route('reorders.index')
            ->with('success', 'Order updated successfully.');
    }



    public function invoice(Reorder $reorder)
    {
        $reorder->load('product');
        $reorder->status = "ordered";
        $reorder->save();

        $pdf = Pdf::loadView('reorders.pdf', [
            'reorder' => $reorder
        ]);

        return $pdf->download('invoice-' . $reorder->id . '.pdf');

    }
    public function destroy(string $id)
    {
        $product = Reorder::findOrFail($id);
        $product->delete();
        return redirect()
            ->route('reorders.index')
            ->with('success', 'Order deleted successfully.');

    }

}
