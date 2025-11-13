<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingsController extends Controller
{
    public function index()
    {
        $Borrowings = DB::table('Borrowings')->get();
        return view('Borrowings.index', compact('Borrowings'));
    }

    public function create()
    {
        return view('Borrowings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrower_name' => 'required',
            'borrow_date' => 'required',
            'borrowed_items' => 'required',
        ]);

        try {
            DB::table('Borrowings')->insert([
                'borrower_name' => $request->borrower_name,
                'borrow_date' => $request->borrow_date,
                'borrowed_items' => $request->borrowed_items,
            ]);
            return redirect()->route('Borrowings.index')->with('Success', 'Borrowing created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Borrowings.index')->with('Error', 'Failed to create Borrowing.');
        }
    }

    public function edit(string $id)
    {
        $Borrowings = DB::table('Borrowings')->where('transaction_id', $id)->first();
        return view('Borrowings.edit', compact('Borrowings'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'borrower_name' => 'required',
            'borrow_date' => 'required',
            'borrowed_items' => 'required',
        ]);

        try {
            DB::table('Borrowings')->where('transaction_id', $id)->update([
                'borrower_name' => $request->borrower_name,
                'borrow_date' => $request->borrow_date,
                'borrowed_items' => $request->borrowed_items,
            ]);
            return redirect()->route('Borrowings.index')->with('Success', 'Borrowing updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Borrowings.index')->with('Error', 'Failed to update Borrowing.');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::table('Borrowings')->where('transaction_id', $id)->delete();
            return redirect()->route('Borrowings.index')->with('Success', 'Borrowing deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Borrowings.index')->with('Error', 'Failed to delete Borrowing.');
        }
    }
}
