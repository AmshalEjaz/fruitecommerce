@extends('components.frontend-master')

@section('body')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Update Profile</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Update Profile</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center display-6 text-primary">Update Profile</h2>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="customerName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="customerName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="customerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="customerPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="customerPhone" placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="customerAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="customerAddress" rows="3" placeholder="Enter your address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="customerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="customerPassword" placeholder="Enter your password">
                    </div>
                    <div class="text-center">
                        <a href="verificationCode.html" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-50">Done</a><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

   

   @endsection