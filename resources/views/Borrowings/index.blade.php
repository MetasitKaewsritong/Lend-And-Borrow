@extends('layout')
@section('title', 'Lend And Borrow')
@section('content')

    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="{{ route('Borrowings.create') }}" class="btn btn-success">เพิ่มข้อมูล</a>
            </li>
        </ul>
    </div>

    <div>
        @if (session('Success'))
            <div class="alert alert-success">{{ session('Success') }}</div>
        @endif

        @if (session('Error'))
            <div class="alert alert-danger">{{ session('Error') }}</div>
        @endif
    </div>

    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Transaction ID</th>
                    <th>Borrower's Name</th>
                    <th>Borrow Date</th>
                    <th>Borrowed Items</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Borrowings as $Br)
                    <tr>
                        <td>{{ $Br->transaction_id }}</td>
                        <td>{{ $Br->borrower_name }}</td>
                        <td>{{ $Br->borrow_date }}</td>
                        <td>{{ $Br->borrowed_items }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('Borrowings.edit', $Br->transaction_id) }}" class="btn btn-warning btn-sm">แก้ไข</a>

                            <form action="{{ route('Borrowings.destroy', $Br->transaction_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบรายการนี้?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
