<x-header />

       <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><b>Comments</b></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <form class="d-flex" method="POST" action="{{ url('admincomments') }}">
                            @csrf
                            <input class="form-control me-2" type="text" name="name" placeholder="Search" value="{{ request('name') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>

                        <li class="nav-item-dropdown">
                            <a href="{{URL::to('profile')}}l" class="nav-link second-text fw-bold"
                                role="button" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <br>


            <div class="container-fluid px-4">

                <div class="row my-5">

                    <div class="col">
                      @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                <table class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->comments }}</td>
                            <td>
                                <form action="{{ route('admincomments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                     </div>



                </div>

            </div>


        </div>

    </div>




