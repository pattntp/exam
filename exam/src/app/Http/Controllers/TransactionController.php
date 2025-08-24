<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month');

        $query = Transaction::query();
        if ($month) {
            $query->whereMonth('spend_date', Carbon::parse($month)->month)
                  ->whereYear('spend_date', Carbon::parse($month)->year);
        }

        $items = $query->orderBy('spend_date', 'desc')->get();

        $summary = [
            'income' => $items->where('type', 'income')->sum('amount'),
            'expense' => $items->where('type', 'expense')->sum('amount'),
        ];
        $summary['balance'] = $summary['income'] - $summary['expense'];

        return view('transactions.index', compact('items', 'summary', 'month'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'spend_date' => 'required|date',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Saved');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Updated');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Deleted');
    }
}
