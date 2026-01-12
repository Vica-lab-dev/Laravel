
<form method="POST" action="/products/create">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" maxlength="64" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea>

    <label for="price">Price</label>
    <input type="number" id="price" name="price" step="1" required>

    <button type="submit">Submit</button>
</form>
