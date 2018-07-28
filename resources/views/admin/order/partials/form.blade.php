<div class="tab-content">
<div id="default_panel" class="tab-pane fade in active">

<label for="">Email клиента</label>
<input type="email" class="form-control" name="client_email" value="{{$order->client_email or ""}}" required>

<label for="">Статус заказа</label>
<select class="form-control" name="status">
    @include('admin.order.partials.status', ['status' => $order->status])
</select>

<label for="">Партнер</label>
<select class="form-control" name="partner">
  @include('admin.order.partials.partners', ['partners' => $partners])
</select>

 <label for="">Стоимость заказа</label>
 <input class="form-control" type="text" name="total" value="{{$order->getOrderCosts()}}" readonly="">

</div>
<div id="products_panel" class="tab-pane fade">
    @include('admin.order.partials.products', ['products' => $products])
</div>

</div><!--tab-content-->
<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
