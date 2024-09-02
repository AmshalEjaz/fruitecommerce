@extends('components.frontend-master')

@section('body')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Forget Password</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Forget Password</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow"><br>
                        <h2 class="text-center display-6 text-primary">Forget Password</h2><br>
                        <div class="card-body">
                            <form action="">
                                <p>Please enter your Mobile no to verify.</p>
                                <input type="text" name="" id="" class="form-control my-4 py-2" placeholder="Mobile no" >
                                <div class="text-center">
                                    <a href="{{URL::to('entercode')}}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Send Verification Code</a><br><br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    @endsection