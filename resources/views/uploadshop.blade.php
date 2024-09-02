<x-header/>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><b>Shop</b></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <form class="d-flex" action="{{ route('uploadshop.index') }}" method="GET">
    <input class="form-control me-2" type="text" name="name" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
</form>

                        <li class="nav-item-dropdown">
                            <a href="{{URL::to('profile')}}" class="nav-link second-text fw-bold"
                                role="button" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Fruits Shop Start-->
       <!-- Fruits Shop Start -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="tabs">
                <!-- Nav Tabs -->
              

                <div class="tab-content">
                    <!-- Tab 3: Fruits -->
                    <div id="tab-3" class="tab-pane fade show active p-0">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-6 m-auto">
                                <div class="card border-0 shadow"><br>
                                    <h2 class="text-center display-6 text-primary">Upload Fruit</h2><br>
                                    <div class="card-body">
                                        <form action="{{ url('uploadshop') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="name" id="name" class="form-control my-4 py-2" required placeholder="Product Name">
                                            <textarea class="form-control my-4 py-2" id="details" name="details" rows="4" placeholder="Enter details here"></textarea>
                                            <input type="number" name="price" id="price" class="form-control my-4 py-2" placeholder="Price/kg">
                                            <div class="mb-3">
                                                <select class="form-select" id="dropdownSelect" name="category_id">
                                                    <option selected disabled>Categories</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="file" class="form-control custom-file-input" id="file-input" name="file" required><br>
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
                                            @foreach($shops as $shop)
                                                <tr>
                                                    <td>{{ $shop->name }}</td>
                                                    <td>{{ $shop->category->name }}</td>
                                                    <td>{{ $shop->price }}/kg</td>
                                                    <td>
                                                        <a href="{{ route('uploadshop.edit', $shop->id) }}" class="fw-bold" role="button" aria-expanded="false">Update</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('uploadshop.destroy', $shop->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="fw-bold btn btn-link" role="button" aria-expanded="false">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 4: Bread -->
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <!-- Repeat the form and table structure as in Tab 3 but for Bread products -->
                    </div>

                    <!-- Tab 5: Meat -->
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <!-- Repeat the form and table structure as in Tab 3 but for Meat products -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End -->
