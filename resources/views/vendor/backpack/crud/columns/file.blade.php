@php
    $value = data_get($entry, $column['name']);
@endphp
<a href="{{ asset($value) }}" target="_blank">
   {{ ($value) }}
</a>
