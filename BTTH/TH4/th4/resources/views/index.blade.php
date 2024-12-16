@extends('layouts.app')

@section('content')
<h2>Danh sách Vấn đề</h2>
<a href="{{ route('issues.create') }}" class="btn btn-primary">Thêm Vấn đề Mới</a>
<table class="table">
    <thead>
        <tr>
            <th>Mã vấn đề</th>
            <th>Tên máy tính</th>
            <th>Tên phiên bản</th>
            <th>Người báo cáo</th>
            <th>Thời gian báo cáo</th>
            <th>Mức độ</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($issues as $issue)
        <tr>
            <td>{{ $issue->id }}</td>
            <td>{{ $issue->computer->computer_name }}</td>
            <td>{{ $issue->computer->model }}</td>
            <td>{{ $issue->reported_by }}</td>
            <td>{{ $issue->reported_date }}</td>
            <td>{{ $issue->urgency }}</td>
            <td>{{ $issue->status }}</td>
            <td>
                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
