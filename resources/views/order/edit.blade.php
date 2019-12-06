@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Order</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {!! Form::open(['action' => ['OrderController@update',$order->id], 'method' =>'POST','enctype' =>
                    'multipart/form-data']) !!}
                    @csrf

                    <div class="form-group row">
                        <label for="costumer" class="col-md-4 col-form-label text-md-right">{{ __('Costumer') }}</label>

                        <div class="col-md-6">
                            {{$order->user->name}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="topping" class="col-md-4 col-form-label text-md-right">{{ __('Topping') }}</label>

                        <div class="col-md-6">
                            {{$order->topping}}
                        </div>
                    </div>

                    <input type="hidden" name="status" value="buck">
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                @foreach ($progress as $item)
                                <option value="{{$item->id}}"
                                    {{ $order->progress_id == $item->id ? 'selected="selected"' : '' }}>{{$item->name}}
                                </option>
                                @endforeach
                            </select>

                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{ form::hidden('_method','PUT')}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update Status') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection