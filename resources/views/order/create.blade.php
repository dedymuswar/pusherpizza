@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="costumer"
                                class="col-md-4 col-form-label text-md-right">{{ __('Costumer') }}</label>

                        <div class="col-md-6">
                            <input id="costumer" type="text"
                                class="form-control @error('costumer') is-invalid @enderror" name="costumer"
                                value="{{ old('costumer') }}" required autocomplete="costumer" autofocus>

                            @error('costumer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div> --}}

                <div class="form-group row">
                    <label for="topping" class="col-md-4 col-form-label text-md-right">{{ __('Topping') }}</label>

                    <div class="col-md-6">
                        <input id="topping" type="topping" class="form-control @error('topping') is-invalid @enderror"
                            name="topping" value="{{ old('topping') }}" required autocomplete="topping">

                        @error('topping')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="status" value="buck">
                <div class="form-group row">
                    <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

                    <div class="col-md-6">
                        <select name="size" id="size" class="form-control">
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                            {{-- <option value="delivered">delivered</option> --}}
                        </select>

                        @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection