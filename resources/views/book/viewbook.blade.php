@extends('book.layout')
@section('title')
Book Details
@endsection

@section('content')
<h2>Title:{{$book->title}}</h2>
<span>price:${{$book->price}}</span><br>
<a href="{{route('book.index')}}" class="btn btn-danger btn-sm mt-2">Back</a>
@endsection
