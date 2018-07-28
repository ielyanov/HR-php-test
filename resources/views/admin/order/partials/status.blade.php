<option value="">---</option>
<option value="0" @if ($order->status == 0) selected="" @endif>Новый</option>
<option value="10" @if ($order->status == 10) selected="" @endif>Подтвержден</option>
<option value="20" @if ($order->status == 20) selected="" @endif>Завершен</option>