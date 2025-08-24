@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Transaction</h2>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <label>Type:</label>
        <select name="type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select><br>

        <label>Title:</label>
        <input name="title" required><br>

        <label>Amount:</label>
        <input type="number" step="0.01" name="amount" required><br>

        <label>Spend Date:</label>
        <input type="date" name="spend_date" required><br>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
