@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>Author</td>
                            <td>Books</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$author->first_name}} {{$author->last_name}}</td>
                                <td>{{$author->books->pluck('title')->join(', ')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
