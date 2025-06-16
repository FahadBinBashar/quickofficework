@extends('layouts.app')
@section('title', 'Image to PDF')
@section('content')
<div class="container mt-4">
    <h3>Convert Images to PDF</h3>
    <form method="POST" action="/image-to-pdf" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required class="form-control mt-2">
        <button class="btn btn-dark mt-3">Convert</button>
    </form>
</div>
@endsection
