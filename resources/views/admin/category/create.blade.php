@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Category
                </span>
                <span>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nama Kategori" class="form-control">
                    </div>
                    @error('name')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection