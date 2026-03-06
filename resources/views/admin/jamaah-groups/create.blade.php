@extends('layouts.app')

@section('content')
<div class="container">

<h4>Create Group</h4>

<form method="POST" action="{{ route('jamaah-groups.store') }}">
@csrf

@include('admin.jamaah-groups.form')

<button class="btn btn-primary">
Save
</button>

</form>

</div>
@endsection