<x-header/>

<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0"><b>Coupon Code</b></h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <form class="d-flex" method="GET" action="{{ route('coupon.index') }}">
            <input class="form-control me-2" type="text" name="code" placeholder="Search by code" value="{{ request('code') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

                <li class="nav-item-dropdown">
                    <a href="adminprofile.html" class="nav-link second-text fw-bold"
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
            <div class="card border-0 shadow"><br>
                <h2 class="text-center display-6 text-primary">Coupon</h2><br>
                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf
                        <input type="text" name="code" class="form-control my-4 py-2" required placeholder="Coupon Code">
                        <input type="number" name="discount" class="form-control my-4 py-2" required placeholder="Discount">
                        <div class="mb-3">
                            <label for="start-date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start-date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end-date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end-date" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Add</button>
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
                            <th scope="col">Code</th>
                            <th scope="col">Validity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->start_date }} - {{ $coupon->end_date }}</td>
                            <td>{{ $coupon->discount }}%</td>
                            <td>
                                <a href="{{ route('coupon.edit', $coupon->id) }}" class="fw-bold">Update</a>
                            </td>
                            <td>
                                <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fw-bold btn btn-link p-0 m-0">Delete</button>
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
