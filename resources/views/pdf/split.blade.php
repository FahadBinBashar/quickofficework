@extends('layouts.app')

@section('title', 'Split PDF')

@section('content')
<div class="container mt-4">
    <h3>Split PDF File</h3>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="/split" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Select PDF file:</label>
            <input type="file" name="pdf" class="form-control" accept="application/pdf" required>
        </div>
        <div class="form-group mt-2">
            <label>From Page:</label>
            <input type="number" name="from_page" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>To Page:</label>
            <input type="number" name="to_page" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Split</button>
    </form>
</div>
@endsection
