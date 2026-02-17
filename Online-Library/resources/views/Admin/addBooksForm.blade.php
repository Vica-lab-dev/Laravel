@extends('bootstraplink')
<title>Add-Book</title>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Book Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter book name" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" name="author" id="author" class="form-control" placeholder="Enter author's name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter book description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Book Content</label>
                                <textarea name="content" id="content" rows="4" class="form-control" placeholder="Enter book content" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" placeholder="Enter price" required>
                            </div>

                            <div class="mb-3">
                                <label for="document">Image</label>
                                <input class="form-control" type="file" name="image" id="document" accept="image/*" required>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Add Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

