@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa Thông Tin Vấn Đề</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('issues.update', $issue->id) }}">
        @csrf
        @method('PUT')

        <!-- Máy tính -->
        <div class="form-group">
            <label for="computer_id">Tên máy tính:</label>
            <select name="computer_id" id="computer_id" class="form-control" required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} - {{ $computer->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Người báo cáo -->
        <div class="form-group">
            <label for="reported_by">Người báo cáo:</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
        </div>

        <!-- Thời gian báo cáo -->
        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo:</label>
            <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Mô tả vấn đề -->
        <div class="form-group">
            <label for="description">Mô tả vấn đề:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $issue->description }}</textarea>
        </div>

        <!-- Mức độ sự cố -->
        <div class="form-group">
            <label for="urgency">Mức độ sự cố:</label>
            <select name="urgency" id="urgency" class="form-control" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <!-- Trạng thái hiện tại -->
        <div class="form-group">
            <label for="status">Trạng thái hiện tại:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>

        <!-- Nút Submit -->
        <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary mt-3">Hủy</a>
    </form>
</div>
@endsection
