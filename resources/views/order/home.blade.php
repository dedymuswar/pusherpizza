@extends('layouts.app')
@section('scripku')
<style>
    .ati {
        display: inline-block;
        background-color: aqua;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card ">
                <div class="card-header">Daftar Order</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Costumer</th>
                                <th scope="col">Topping</th>
                                <th scope="col">Size</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($orders) > 0)
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->topping}}</td>
                                <td>{{$item->size}}</td>
                                <td>{{$item->progress->name}}</td>
                                <td class="btn-group">
                                    <a href="{{route('order.show', $item->id)}}" style="margin-right:5px">
                                        <button class="btn btn-success btn-sm">Detail</button></a>
                                    <a href="{{route('order.edit', $item->id)}}" style="margin-right:5px">
                                        <button class="btn btn-warning btn-sm">Edit</button></a>
                                    {!! Form::open(['action' => ['OrderController@destroy',$item->id], 'method' =>
                                    'POST'])!!}
                                    {{ form::hidden('_method', 'POST')}}
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                    {!! Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" align="center">Maaf belum ada data</td>
                            </tr>
                            @endif
                            <order-alert user_id={{auth()->user()->id}}></order-alert>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection