@extends('components.frontend-master')

@section('body')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Profile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow"><br>
                            <h2 class="text-center display-6 text-primary">Profile</h2><br>
                            <div class="card-body">
                                <form action="">
                                    <div class="row align-items-center">
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="fw-bold">Name</p>
                                                <h6 class="">{{$user->name}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="fw-bold">Email</p>
                                                <h6 class="">{{$user->email}}</h6>
                                            </div>
                                            <div class="col-6">
                                                <p class="fw-bold">Password</p>
                                                <h6 class="">{{$user->password}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    </div><br>
                                        <a href="{{URL::to('updateprofile')}}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Update Profile?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
