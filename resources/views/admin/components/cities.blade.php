{{-- store city --}}
<form action="{{ route('cities.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="city_name">City Name KA:</label>
        <input type="text" class="form-control"  name="name_ka" required>
    </div>
    <div class="form-group">
        <label for="city_name">City Name EN:</label>
        <input type="text" class="form-control"  name="name_en" required>
    </div>
    <button type="submit" class="btn btn-primary">Add City</button>
</form>

{{-- update city --}}
<form action="{{ route('cities.update', $city->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="city_name">City Name KA:</label>
        <input type="text" class="form-control"  name="name_ka" required>
    </div>
    <div class="form-group">
        <label for="city_name">City Name EN:</label>
        <input type="text" class="form-control"  name="name_en" required>
    </div>
    <button type="submit" class="btn btn-primary">Update City</button>
</form>

{{-- delete city --}}
<form action="{{ route('cities.destroy', $city->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete City</button>
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Cancel</a>
</form>
