@extends('layouts.app')

@section('title', 'Заказ № '.$order->id)

@section('content')

    <div class="container">
		<div class="row">
			<div class="col-sm-12">
	          <h1>Заказ № {{$order->id}}</h1>
	        </div>
		</div>
	</div>
	
	<div class="container">
		@forelse ($products as $product)
			<div class="row">
				<div class="col-sm-12">
                   {{$product->name}}
				</div>
			</div>
		@empty
			<h2 class="text-center">Пусто</h2>
		@endforelse

		{{$products->links()}}
	</div>

@endsection