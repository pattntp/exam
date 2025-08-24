@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Transaction</h2>

    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT')

        <label>Type:</label>
        <select name="type">
            <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>Income</option>
            <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>Expense</option>
        </select><br>

        <label>Title:</label>
        <input name="title" value="{{ $transaction->title }}" required><br>

        <label>Amount:</label>
        <input type="number" step="0.01" name="amount" value="{{ $transaction->amount }}" required><br>

        <label>Spend Date:</label>
        <input type="date" name="spend_date" value="{{ $transaction->spend_date }}" required><br>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
