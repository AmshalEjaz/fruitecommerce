<x-header/>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0"><b>Featured Products</b></h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form class="d-flex" action="{{ route('featuredproducts.index') }}" method="GET">
                    
                    <input class="form-control me-2" type="text" name="name" placeholder="Search" value="{{ request('name') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                    <li class="nav-item-dropdown">
                        <a href="{{ url('adminprofile') }}" class="nav-link second-text fw-bold"
                           role="button" aria-expanded="false">
                            <i class="fas fa-user me-2"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <br>

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

                <div class="card border-0 shadow"><br>
                    <h2 class="text-center display-6 text-primary">Upload Featured Products</h2><br>
                    <div class="card-body">
                        <form action="{{ route('featuredproducts.store') }}" method="POST" enctype="multipart/form-data">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <input type="text" name="name" class="form-control my-4 py-2" required placeholder="Product Name">
                            <textarea class="form-control my-4 py-2" name="details" rows="4" required placeholder="Enter details here"></textarea>
                            <input type="number" name="actual_price" class="form-control my-4 py-2" required placeholder="Actual Price/kg">
                            <input type="number" name="discounted_price" class="form-control my-4 py-2" required placeholder="Discounted Price/kg">
                           
                            <select id="category_id" name="category_id" class="form-control my-4 py-2" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="file" class="form-control custom-file-input" name="file" required><br>
                            <div class="text-center">
                                <button type="submit" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Upload</button><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center display-6 text-primary">Details</h2>
                </div>
                <div class="card-body">
                    @if(isset($message))
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    @endif
                    <table class="table bg-white rounded shadow-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->actual_price }}/kg</td>
                                    <td>
                                        <a href="{{ route('featuredproducts.edit', $product->id) }}" class="fw-bold">Update</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('featuredproducts.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="fw-bold btn btn-link" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <br><br>
    </div>

   <x-footer/>