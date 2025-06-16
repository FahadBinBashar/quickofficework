@extends('layouts.app')
@section('title', 'Compress PDF')
@section('content')
<div class="container mt-4">
    <h3>Compress PDF</h3>
    <form method="POST" action="/compress" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdf" required class="form-control mt-2">
        <button class="btn btn-warning mt-3">Compress</button>
    </form>
</div>
@endsection
