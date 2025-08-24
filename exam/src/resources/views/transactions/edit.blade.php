@extends('layouts.app')

@section('content')
<div class="container">
    <h2>แก้ไขรายการรายรับ/รายจ่าย</h2>

    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT')

        <label>ประเภท:</label>
        <select name="type">
            <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>รายรับ</option>
            <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>รายจ่าย</option>
        </select><br>

        <label>ชื่อรายการ:</label>
        <input name="title" value="{{ $transaction->title }}" required><br>

        <label>จำนวนเงิน:</label>
        <input type="number" step="0.01" name="amount" value="{{ $transaction->amount }}" required><br>

        <label>วันที่ใช้จ่าย:</label>
        <input type="date" name="spend_date" value="{{ $transaction->spend_date }}" required><br><br>

        <button type="submit">อัปเดตรายการ</button>
    </form>
</div>
@endsection
