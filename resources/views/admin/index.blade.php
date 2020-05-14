@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin Panel</div>
                    <a href="{{ route('author.create') }}" class="btn btn-secondary">Add Author</a>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Author Name</td>
                                <td>Books amount</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$author->first_name}} {{$author->last_name}}</td>
                                <td>{{count($author->books)}}</td>
                                <td>
                                    <a href="{{route('author.edit', $author->id)}}" class="btn btn-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('author.destroy',  $author->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <a href="{{ route('book.create') }}" class="btn btn-secondary">Add Book</a>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>ISBN</td>
                                <td>Authors</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->isbn}}</td>
                                <td>
                                    {{$book->authors->pluck('full_name')->join(', ')}}
                                </td>
                                <td>
                                    <a href="{{route('book.edit', $book->id)}}" class="btn btn-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('book.destroy',  $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
