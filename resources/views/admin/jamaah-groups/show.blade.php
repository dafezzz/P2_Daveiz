@extends('layouts.app')

@section('content')

<div class="container">

<h4>{{ $jamaahGroup->name }}</h4>

<p>
Package: {{ $jamaahGroup->package->name }}
</p>

<p>
Departure: {{ $jamaahGroup->departure_date->format('d M Y') }}
</p>

<hr>

<h5>Jamaah List</h5>

<table class="table">

<tr>
<th>Name</th>
<th>Status</th>
</tr>

@foreach($jamaahGroup->jamaahs as $j)

<tr>

<td>{{ $j->full_name }}</td>

<td>{{ $j->status }}</td>

</tr>

@endforeach

</table>

</div>

@endsection