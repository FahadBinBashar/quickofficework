@extends('layouts.app')
@section('title', 'Split PDF')
@section('content')
<div class="container mt-4">
    <h3>Split PDF</h3>
    <form method="POST" action="/split" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdf" required class="form-control mt-2">
        <input type="number" name="from_page" placeholder="From Page" required class="form-control mt-2">
        <input type="number" name="to_page" placeholder="To Page" required class="form-control mt-2">
        <button class="btn btn-success mt-3">Split</button>
    </form>
</div>
@endsection
