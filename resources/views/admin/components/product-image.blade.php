<form action="{{ route('product_images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="product_id">Product ID:</label>
    <input type="text" name="product_id" required>

    <label for="images">Images:</label>
    <input type="file" name="images[]" accept="image/*" multiple required>

    <button type="submit">Add Product Images</button>
</form>