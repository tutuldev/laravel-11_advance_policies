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
                            {{-- @if (Auth::user()->can('update',$book))
                             Hello
                             @endif --}}
                             {{-- it is op off if  --}}
                             @unless (Auth::user()->can('update',$book))
                             Hello
                             @endunless

                            <div class="d-flex gap-2">
                                {{-- @can('update',$book)
                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Update</a>
                                @else
                                <h6>Not Authorize</h6>
                                @endcan --}}

                                {{-- check multiple condiction  with array--}}
                                {{-- update and view if acces only one then not show  --}}
                                @canany(['update','view'],$book)
                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Update</a>
                                @else
                                <h6>Not Authorize</h6>
                                @endcanany


                                @can('delete',$book)
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endcan



                            </div>
                        </td>

                  </tr>
                @endforeach
            </table>
            <div class="mt-4">
                {{$books->links()}}
            </div>
@endsection
