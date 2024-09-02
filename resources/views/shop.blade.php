@extends('components.frontend-master')

@section('body')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <!-- Filtering options and categories go here -->
                            <div class="mb-3">
                                <h4>Categories</h4>
                               <ul class="list-unstyled fruite-categorie">
                                @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a href="{{ route('featuredproducts.filter', ['category_id' => $category->id]) }}">
                                            <i class="fas fa-apple-alt me-2"></i>{{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            </div>
                                    <div class="col-lg-12">
                                    <div class="mb-3">
                                    <form method="GET" action="{{ url('showPrice') }}">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="price" min="0" max="1000" value="{{ request('price', 0) }}" oninput="this.form.submit()">
                                        <output id="amount" name="amount" for="rangeInput">{{ request('price', 0) }}</output>
                                    </form>

                                        </div>
                                     </div>
                            <div class="position-relative mb-3">
                                <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                      

                </div>
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-center">
                        @foreach ($items as $shop)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{ asset('Storage/' . $shop->file_path) }}"
                                            class="img-fluid w-100  rounded-top" alt="{{ $shop->name }}"
                                            style="height:300px;width=100px;">
                                    </div>

                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
                                        {{ $shop->category->name }}
                                    </div>

                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4><a href="{{ URL::to('shop-detail') }}">{{ $shop->name }}</a></h4>
                                        <p>{{ $shop->details }}</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">RS {{ $shop->price }} / kg</p>
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="pagination d-flex justify-content-center mt-5">
                <a href="{{ URL::to('shop') }}" class="rounded">&laquo;</a>
                <a href="{{ URL::to('shop') }}" class="active rounded">1</a>
                <a href="{{ URL::to('shop') }}" class="rounded">2</a>
                <a href="{{ URL::to('shop') }}" class="rounded">3</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
