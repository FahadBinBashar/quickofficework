@extends('layouts.app')
@section('title', 'PDF to Image')
@section('content')
<div class="container mt-4">
    <h3>Convert PDF to Image</h3>
    <form method="POST" action="/pdf-to-image" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdf" required class="form-control mt-2">
        <button class="btn btn-info mt-3">Convert</button>
    </form>
</div>
@endsection
