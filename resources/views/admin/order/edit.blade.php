@extends('layouts.app')
@section('title', 'Редактирование заказа № '.$order->id)
@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Редактирование заказа @endslot
    @slot('parent') Список заказов @endslot
    @slot('active') Заказ № {{$order->id}} @endslot
  @endcomponent

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#default_panel">Main info</a></li>
	<li><a data-toggle="tab" href="#products_panel">Products</a></li>
  </ul>

  <form class="form-horizontal" action="{{route('order.update', $order)}}" method="post" >
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.order.partials.form')

    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
