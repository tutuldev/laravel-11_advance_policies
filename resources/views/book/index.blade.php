@extends('book.layout')
@section('title')
My Book
@endsection

@section('content')
<h4>Hello, {{ Auth::user()->name }}
     <span class="badge bg-warning" style="font-size: 0.75rem;">{{ strtoupper(Auth::user()->role) }}</span>

</h4>

<a href="{{route('book.create')}}" class="btn btn-success btn-sm mb-3">Add New</a>
<a href="{{route('logout')}}" class="btn btn-danger btn-sm mb-3">Logout</a>

            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Creator</th>
                    <th>Actions</th>

                </tr>
                @foreach ( $books as $book)
                <tr>
                    <td class="px-5">{{$book->title}}</td>
                    <td class="px-5">{{$book->price}}</td>
                    <td class="px-5">{{$book->user->name}}</td>


                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>

                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </div>
                        </td>

                  </tr>
                @endforeach
            </table>
            <div class="mt-4">
                {{$books->links()}}
            </div>
@endsection
