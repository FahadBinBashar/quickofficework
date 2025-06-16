@extends('layouts.app')
@section('title', 'Result')
@section('content')
<div class="container mt-4">
    <h3>Converted Images</h3>
    @foreach($imageUrls as $url)
        <img src="{{ $url }}" class="img-fluid mb-2" style="max-width:100%;">
    @endforeach
</div>
@endsection
