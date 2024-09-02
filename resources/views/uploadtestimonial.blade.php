<x-header/>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><b>Testimonial</b></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search">
                            <button class="btn btn-primary" type="button">Search</button>
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


            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow"><br>
                            <h2 class="text-center display-6 text-primary">Clients Details</h2><br>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/api/testimonials') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="text" name="client_name" class="form-control my-4 py-2" placeholder="Client Name">
                                    <input type="text" name="profession" class="form-control my-4 py-2" placeholder="Profession">
                                    <textarea name="details" class="form-control my-4 py-2" rows="4" placeholder="Enter details here"></textarea>
                                    <input type="file" name="image" class="form-control custom-file-input">
                                    <div class="d-flex pe-5">
                                        <input type="hidden" name="rating" value="5">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br><br><br>




