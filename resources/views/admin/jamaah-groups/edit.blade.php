@extends('layouts.app')

@section('content')
<div class="container">

<h4>Edit Group</h4>

<form method="POST"
action="{{ route('jamaah-groups.update',$jamaahGroup) }}">

@csrf
@method('PUT')

@include('admin.jamaah-groups.form')

<button class="btn btn-primary">
Update
</button>

</form>

</div>
@endsection