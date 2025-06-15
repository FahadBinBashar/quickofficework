@extends('layouts.app')

@section('title', 'Merge PDF')

@section('content')
<div class="container mt-4">
    <h3>Merge PDF Files</h3>
    <form method="POST" action="/merge" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Select PDF files:</label>
            <input type="file" name="pdfs[]" multiple class="form-control" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Merge</button>
    </form>
</div>
@endsection
