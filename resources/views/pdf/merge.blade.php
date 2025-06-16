@extends('layouts.app')
@section('title', 'Merge PDF')
@section('content')
<div class="container mt-4">
    <h3>Merge PDF</h3>
    <form method="POST" action="/merge" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdfs[]" multiple required class="form-control mt-2">
        <button class="btn btn-primary mt-3">Merge</button>
    </form>
</div>
@endsection
