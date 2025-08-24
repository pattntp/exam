@extends('layouts.app')

@section('content')
<div class="container">
    <h2>บันทึกรายรับรายจ่าย</h2>

    <form method="GET">
        <label>กรองตามเดือน:</label>
        <input type="month" name="month" value="{{ request('month') }}">
        <button type="submit">ค้นหา</button>
        <a href="{{ route('transactions.create') }}">เพิ่มรายการใหม่</a>
    </form>

    <h4>สรุปผล</h4>
    <ul>
        <li>รวมรายรับ: {{ number_format($summary['income'], 2) }} บาท</li>
        <li>รวมรายจ่าย: {{ number_format($summary['expense'], 2) }} บาท</li>
        <li>ยอดคงเหลือ: {{ number_format($summary['balance'], 2) }} บาท</li>
    </ul>

    <table border="1" cellpadding="6">
        <tr>
            <th>ประเภท</th>
            <th>ชื่อรายการ</th>
            <th>จำนวนเงิน</th>
            <th>วันที่ใช้จ่าย</th>
            <th>วันที่บันทึก</th>
            <th>ตัวเลือก</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->type === 'income' ? 'รายรับ' : 'รายจ่าย' }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ number_format($item->amount, 2) }} บาท</td>
            <td>{{ $item->spend_date }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('transactions.edit', $item->id) }}">แก้ไข</a>
                <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('คุณต้องการลบรายการนี้หรือไม่?')">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
