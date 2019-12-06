@extends('layouts.app')
@section('skripku')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-strap/1.1.40/vue-strap.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Order</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <div>Order Progress here</div> --}}
                    <order-progress status="{{$order->progress->name}}" initial="{{$order->progress->percent}}"
                        order_id="{{$order->id}}"></order-progress><br>
                    <order-alert user_id="{{auth()->user()->id}}"></order-alert><br>
                    {{-- {{ $order->progress->name}} --}}
                    <table class="table-borderless">
                        <tbody>
                            <tr>
                                <td width="60%">Costumer</td>
                                <td width="20%">:</td>
                                <td width="20%">{{$order->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Topping</td>
                                <td>:</td>
                                <td>{{$order->topping}}</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>:</td>
                                <td>{{$order->size}}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    {{-- <button href="{{URL::previous()}}" class="btn btn-success">Back to Orders</button> --}}
                    <a href="{{URL::previous()}}" class="btn btn-success">Back to Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jasa')
{{-- <script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(4000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
    });
</script> --}}
@endsection