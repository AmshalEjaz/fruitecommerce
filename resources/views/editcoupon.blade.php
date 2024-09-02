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

                <li class="nav-item dropdown">
                    <a href="adminprofile.html" class="nav-link second-text fw-bold"
                        role="button" aria-expanded="false">
                        <i class="fas fa-user me-2"></i> Admin
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" class="p-4 bg-white shadow rounded">
            @csrf
            @method('PUT')

            <!-- Coupon Code Input -->
            <div class="mb-3">
                <label for="code" class="form-label">Coupon Code</label>
                <input type="text" name="code" id="code" class="form-control" required placeholder="Coupon Code" value="{{ old('code', $coupon->code) }}">
            </div>

            <!-- Discount Input -->
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" name="discount" id="discount" class="form-control" required placeholder="Discount" value="{{ old('discount', $coupon->discount) }}">
            </div>

            <!-- Start Date Input -->
            <div class="mb-3">
                <label for="start-date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start-date" class="form-control" required value="{{ old('start_date', $coupon->start_date ? $coupon->start_date->format('Y-m-d') : '') }}">
            </div>

            <!-- End Date Input -->
            <div class="mb-3">
                <label for="end-date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end-date" class="form-control" required value="{{ old('end_date', $coupon->end_date ? $coupon->end_date->format('Y-m-d') : '') }}">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
        </form>
    </div>
</div>

<x-footer/>
