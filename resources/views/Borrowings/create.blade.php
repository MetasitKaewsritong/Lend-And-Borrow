@extends('layout')
@section('title', 'Lend And Borrow')
@section('content')

    <form action="{{ route('Borrowings.store') }}" method="POST">
        @csrf

        <table class="table-bordered">
            <tr>
                <td>
                    <strong>Borrower's Name</strong>
                </td>
                <td>
                    <input type="text" name="borrower_name" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Borrow Date</strong>
                </td>
                <td>
                    <input type="date" name="borrow_date" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Borrowed Items</strong>
                </td>
                <td>
                    <input type="text" name="borrowed_items" class="form-control">
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card-footer ml-auto mr-auto" align=center>
                        <a href="{{ route('Borrowings.index') }}" class="btn btn-danger">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>

@endsection
