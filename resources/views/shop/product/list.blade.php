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
				<th>Название товара</th>
				<th>Цена</th>
			</tr>
			</thead>
			<tbody>
		    @forelse ($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->price}}</td>
				</tr>
		    @empty
			    <tr>
				   <td colspan="3">Пусто</td>
			    </tr>
		    @endforelse
			</tbody>
		</table>
		{{$products->links()}}
		</div>
	</div>

@endsection