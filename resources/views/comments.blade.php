@extends('components.frontend-master')

@section('body')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Comments</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Comments</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Write You Comment</h1>
                               <p class="mb-4">The comment section is currently inactive. Get a functional and working comment system with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code, and you're done.</p>

                            </div>
                        </div>
                         @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                        @endif
                        <div class="col-lg-12">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <textarea name="comments" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Comment"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Submit</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


     