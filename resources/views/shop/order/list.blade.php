@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')

    <div class="container">
		<div class="row">
			<div class="col-sm-12">
	          <h1>Список заказов</h1>
	        </div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>ID</th>
				<th>Название партнера</th>
				<th>Стоим-ть заказа</th>
				<th>Состав заказа</th>
				<th>Статус заказа</th>
			</tr>
			</thead>
			<tbody>
		    @forelse ($orders as $order)
				<tr>
					<td>
						<a href="{{route('order.edit', $order)}}" target="_blank">
						   {{$order->id}}
					    </a>
					</td>
					<td>{{$order->getPartnerName()}}</td>
					<td>{{$order->getOrderCosts()}}</td>
					<td>
						@foreach($order->getOrderProducts() as $product)
							{{$product->name}}({{$product->quantity}} шт.)
						@endforeach
					</td>
					<td>{{$order->getOrderStatus()}}</td>
				</tr>
		    @empty
			    <tr>
				   <td colspan="5">Пусто</td>
			    </tr>
		    @endforelse
			</tbody>
		</table>
		{{$orders->links()}}
		</div>
	</div>

@endsection