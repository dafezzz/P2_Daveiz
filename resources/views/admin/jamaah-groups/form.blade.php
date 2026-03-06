<div class="mb-3">

<label>Group Name</label>

<input type="text"
name="name"
value="{{ old('name',$jamaahGroup->name ?? '') }}"
class="form-control">

</div>

<div class="mb-3">

<label>Package</label>

<select name="package_id" class="form-control">

@foreach($packages as $id=>$name)

<option value="{{ $id }}"
{{ (old('package_id',$jamaahGroup->package_id ?? '')==$id)?'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Departure Date</label>

<input type="date"
name="departure_date"
value="{{ old('departure_date',$jamaahGroup->departure_date ?? '') }}"
class="form-control">

</div>

<div class="mb-3">

<label>Leader Name</label>

<input type="text"
name="leader_name"
value="{{ old('leader_name',$jamaahGroup->leader_name ?? '') }}"
class="form-control">

</div>

<div class="mb-3">

<label>Notes</label>

<textarea name="notes"
class="form-control">{{ old('notes',$jamaahGroup->notes ?? '') }}</textarea>

</div>