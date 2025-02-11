
@extends('book.layout')
@section('title')
Add new Book
@endsection

@section('content')
            <form action="{{route('book.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="bookname" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="bookprice" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price">
                </div>

                <div class="mb-3">
                    <input type="submit" value="update" class="btn btn-primary">
                </div>
            </form>
@endsection
