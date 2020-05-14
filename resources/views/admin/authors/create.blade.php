@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add New Author</div>
                    <div class="card-body">
                        <form action="{{route('author.store')}}" method="post">
                            @csrf
                            <div class="box-header with-border">
                                @include('errors')
                            </div>
                            <div class="form-group row">
                                <label for="first-name" class="col-md-3 col-form-label text-md-right">First name: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="first-name" placeholder="" name="first_name" value="{{old('first_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last-name" class="col-md-3 col-form-label text-md-right">Last name: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="last-name" placeholder="" name="last_name" value="{{old('last_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="books" class="col-md-3 col-form-label text-md-right">Select books</label>
                                <div class="col-md-6">
                                    <select name="books[]" multiple="multiple" class="form-control select2">
                                        @foreach($books as $book)
                                            <option value="{{$book->id}}">{{$book->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{route('admin.index')}}" class="btn btn-light">Back</a>
                                    <button class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0" style="padding-top: 5px">
                            <div class="col-md-6 offset-md-3">
                                <a href="{{route('book.create')}}">
                                    <button class="btn btn-success">Add new book</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

