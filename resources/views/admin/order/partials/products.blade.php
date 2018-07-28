<table class="table table-hover">
  <thead>
  <tr>
    <th>Название</th>
    <th>Кол-во в заказе</th>
    <th>Цена товара в заказе</th>
  </tr>
  </thead>
  <tbody>
  @forelse ($products as $product)
    <tr>
      <td>{{$product->name}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->price}}</td>
    </tr>
  @empty
    <tr>
      <td colspan="3">Пусто</td>
    </tr>
  @endforelse
  </tbody>
</table>