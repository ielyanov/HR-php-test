<option value="">---</option>
@foreach ($partners as $partner)

  <option value="{{$partner->id or ""}}"

    @isset($partner->id)
        @if ($partner->id == $order->partner_id)
          selected="selected"
        @endif
    @endisset
    >
    {{$partner->name or ""}}
  </option>

@endforeach
