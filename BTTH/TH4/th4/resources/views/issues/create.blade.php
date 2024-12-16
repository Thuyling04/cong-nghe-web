@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Vấn Đề Mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('issues.store') }}">
        @csrf

        <!-- Máy tính -->
        <div class="form-group">
            <label for="computer_id">Tên máy tính:</label>
            <select name="computer_id" id="computer_id" class="form-control" required>
                <option value="">-- Chọn máy tính --</option>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                @endforeach
            </select>
        </div>

        <!-- Người báo cáo -->
        <div class="form-group">
            <label for="reported_by">Người báo cáo:</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" placeholder="Tên người báo cáo" required>
        </div>

        <!-- Thời gian báo cáo -->
        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo:</label>
            <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" required>
        </div>

        <!-- Mô tả vấn đề -->
        <div class="form-group">
            <label for="description">Mô tả vấn đề:</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Chi tiết vấn đề" required></textarea>
        </div>

        <!-- Mức độ sự cố -->
        <div class="form-group">
            <label for="urgency">Mức độ sự cố:</label>
            <select name="urgency" id="urgency" class="form-control" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <!-- Trạng thái hiện tại -->
        <div class="form-group">
            <label for="status">Trạng thái hiện tại:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>

        <!-- Nút Submit -->
        <button type="submit" class="btn btn-success mt-3">Thêm Vấn Đề</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>
</div>
@endsection
