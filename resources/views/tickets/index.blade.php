@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('tickets.create')}}" class="btn btn-primary">Tambah</a>
            @if (session('message'))
             <div class="alert alert-success">
             {{ session('message') }}
              </div>
            @endif
            <div class="mb-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Tiket ID</th>
                    <th scope="col">Status Checkin</th>
                    <th scope="col">Tgl dibuat</th>
                    <th scope="col">Tgl Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                    <th scope="row">{{$ticket->id}}</th>
                    <td>{{$ticket->name}}</td>
                    <td>{{$ticket->email}}</td>
                    <td>{{$ticket->telp}}</td>
                    <td>{{$ticket->ticket_id}}</td>
                    @if ($ticket->is_checkin == 0)
                    <td>{{'belum checkin'}}</td>
                    @else 
                    <td>{{' sudah checkin'}}</td>
                    @endif
                    
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->updated_at}}</td>
                    <td>
                        <a href="{{ route('tickets.edit', ['id'=>$ticket->id])}}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('tickets.destroy', ['id'=>$ticket->id])}}" onclick="return confirm ('yakin hapus?')" class="btn btn-danger">Delete</a>
                        
                    </td>
                    </tr>
                    @endforeach
                </tbody>
</table>
            {{$tickets->links()}}
            </div>
        </div>
    </div>
@endsection