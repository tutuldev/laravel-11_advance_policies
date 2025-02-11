
@extends('book.layout')
@section('title')
Update Book
@endsection

@section('content')
            <form action="{{route('book.update',$book->id)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- <pre>
                    @php
                        print_r($errors->all())
                    @endphp
                </pre> --}}
                <div class="mb-3">
                    <label for="bookname" class="form-label">Title</label>
                    <input type="text" value="{{$book->title}}" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="bookprice" class="form-label">Price</label>
                    <input type="number" value="{{$book->price}}" class="form-control" name="price">
                </div>

                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
@endsection
