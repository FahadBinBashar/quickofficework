@extends('layouts.app')

@section('title', 'Compress PDF')

@section('content')
<div class="container mt-4">
    <h3>Compress PDF File</h3>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="/compress" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Select PDF file:</label>
            <input type="file" name="pdf" class="form-control" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Compress</button>
    </form>
</div>
@endsection
