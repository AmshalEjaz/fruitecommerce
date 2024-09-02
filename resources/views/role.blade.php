<x-header/>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><b>Role</b></h2>
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
                            <a href="adminprofile.html" class="nav-link second-text fw-bold" role="button"
                                aria-expanded="false">
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
                        <h2 class="text-center display-6 text-primary">Create Role</h2><br>
                        <div class="card-body">
                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf
                                <input type="text" name="name" id="" class="form-control my-4 py-2"
                                    required placeholder="Name">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                                <label>Permissions:</label>
                                <select name="permissions[]" multiple class="form-control my-4 py-2">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                                @error('permissions.*')
                                    <div>{{ $message }}</div>
                                @enderror
                                <div class="text-center">
                                    <button
                                        class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100"
                                        type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




           <x-footer/>