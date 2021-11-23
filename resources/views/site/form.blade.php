@extends('layouts.site-layout')

@section('content')
<div class="row justify-content-md-center">
        <div class="col-6">
            <div class="mb-3">
                <h2>Pendaftaran Konser X</h2>
            </div>
            @if (session('message'))
             <div class="alert alert-success">
             {{ session('message') }}
              </div>
            @endif
            @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                 </ul>
             </div>
            @endif
            <form action="{{route('register')}}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telp</label>
                    <input type="text" name="phone" class="form-control" placeholder="089XXXXX">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Daftar">
                </div>
            </form>
        </div>
    </div>
@endsection