@extends('layouts.app')

@section('content')
<div class="container-fluid">

<h4 class="mb-4">Jamaah Groups</h4>

<a href="{{ route('jamaah-groups.create') }}" class="btn btn-primary mb-3">
Tambah Group
</a>

<div class="card shadow-sm">
<div class="table-responsive">

<table class="table table-hover">

<thead>
<tr>
<th>Group</th>
<th>Package</th>
<th>Departure</th>
<th>Jamaah</th>
<th width="150">Action</th>
</tr>
</thead>

<tbody>

@foreach($groups as $group)

<tr>

<td>{{ $group->name }}</td>

<td>{{ $group->package->name ?? '-' }}</td>

<td>
{{ $group->departure_date?->format('d M Y') }}
</td>

<td>
{{ $group->jamaahs_count }}
</td>

<td>

<a href="{{ route('jamaah-groups.show',$group) }}"
class="btn btn-sm btn-info">
View
</a>

<a href="{{ route('jamaah-groups.edit',$group) }}"
class="btn btn-sm btn-warning">
Edit
</a>

<form action="{{ route('jamaah-groups.destroy',$group) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-sm btn-danger">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>

{{ $groups->links() }}

</div>
@endsection