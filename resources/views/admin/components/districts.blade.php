{{-- store city --}}
<form action="{{ route('districts.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="city_name">district Name KA:</label>
        <input type="text" class="form-control"  name="name_ka" required>
    </div>
    <div class="form-group">
        <label for="city_name">district Name EN:</label>
        <input type="text" class="form-control"  name="name_en" required>
    </div>
    <div class="form-group">
        <label for="city_id">Select City:</label>
        <select class="form-control" id="city_id" name="city_id" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add District</button>
</form>

{{-- update city --}}
<form action="{{ route('districts.update', $district->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="city_name">district Name KA:</label>
        <input type="text" class="form-control"  name="name_ka" required>
    </div>
    <div class="form-group">
        <label for="city_name">district Name EN:</label>
        <input type="text" class="form-control"  name="name_en" required>
    </div>
    <div class="form-group">
        <label for="city_id">Select City:</label>
        <select class="form-control" id="city_id" name="city_id" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @if($city->id == $district->city_id) selected @endif>{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update District</button>
</form>

{{-- delete city --}}
<form action="{{ route('districts.destroy', $district->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete District</button>
    <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
