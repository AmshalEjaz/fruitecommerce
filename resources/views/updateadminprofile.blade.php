<x-header />

<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0"><b>Admin Profile</b></h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                <li class="nav-item-dropdown">
                    <a href="adminprofile.html" class="nav-link second-text fw-bold" role="button"
                        aria-expanded="false">
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
                    <h2 class="text-center display-6 text-primary">Update Profile</h2><br>
                    <div class="card-body">
                        <form action="adminupdatefunction" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="customerName" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    id="customerName" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="customerEmail" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="customerEmail" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="customerPassword" class="form-label">Password</label>
                                <input type="password" name="passord" class="form-control" id="customerPassword"
                                    placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="customerPassword" placeholder="Enter your password">
                            </div>
                            <div class="text-center">
                                <button class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100"
                                    type="submit">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <x-footer />
