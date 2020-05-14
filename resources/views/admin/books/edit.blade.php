@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Book</div>
                    <div class="card-body">
                        <form action="{{route('book.update', $book->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="box-header with-border">
                                @include('errors')
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Title: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="" name="title" value="{{$book->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="isbn" class="col-md-3 col-form-label text-md-right">ISBN: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="isbn" placeholder="" name="isbn" value="{{$book->isbn}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="books" class="col-md-3 col-form-label text-md-right">Select authors</label>
                                <div class="col-md-6">
                                    <select name="authors[]" multiple="multiple" class="form-control select2">
                                        @foreach($authors as $author)
                                            <option
                                                {{in_array($author->id, $book->authors->pluck('id')->toArray())? 'selected' : ''}} value="{{$author->id}}">
                                                {{$author->first_name}} {{$author->last_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{route('admin.index')}}" class="btn btn-light">Back</a>
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

