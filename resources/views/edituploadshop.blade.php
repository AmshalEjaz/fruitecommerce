<x-header/>

<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0"><b>Edit Product</b></h2>
        </div>
    </nav>

    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif   

            <div class="card border-0 shadow"><br>
                <h2 class="text-center display-6 text-primary">Edit Product</h2><br>
                <div class="card-body">
                    <form action="{{ route('uploadshop.update', $shops->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" name="name" class="form-control my-4 py-2" value="{{ $shops->name }}" required placeholder="Product Name">
                        <textarea class="form-control my-4 py-2" name="details" rows="4" required placeholder="Enter details here">{{ $shops->details }}</textarea>
                        <input type="number" name="price" class="form-control my-4 py-2" value="{{ $shops->price }}" required placeholder="Price/kg">
                        
                        <select class="form-select" name="category_id" required>
                            <option selected disabled>Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $shops->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        
                        <input type="file" class="form-control custom-file-input" name="file"><br>

                        <div class="text-center">
                            <button type="submit" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Update</button><br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer/>
