{{-- Seleect Options --}}
<option value="" disabled @empty($selected) selected @endempty></option>
@foreach($items as $item)
    <option value="{{$item->$value}}" @if($item->$value == $selected) selected @endif>
        {{$item->$label}}
    </option>
@endforeach
