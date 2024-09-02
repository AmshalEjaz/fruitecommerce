<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Northern</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div id="logofix"
                class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Fruitables
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="admin.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="uploadshop.html"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-project-diagram me-2"></i> Shop
                </a>
                <a href="featuredproducts.html"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Featured Products
                </a>
                <a href="category.html"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Category
                </a>
                <a href="role.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Role
                </a>
                <a href="accesscontrol.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Access Control
                </a>
                <a href="admincomments.html"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Comments
                </a>
                <a href="cuopon.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Cuopon
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Logout
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><b>Category</b></h2>
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

            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow"><br>
                            <h2 class="text-center display-6 text-primary">Add Category</h2><br>
                            <div class="card-body">
                                <form action="">
                                    <input type="text" name="" id="" class="form-control my-4 py-2"
                                        placeholder="Category Name">
                                    <textarea class="form-control my-4 py-2" id="details" rows="4" type="text"
                                        placeholder="Enter description"></textarea>
                                    <div class="text-center">
                                        <a href="#"
                                            class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Upload</a><br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center display-6 text-primary">Categories Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Fruits</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Update
                                            </a>
                                    </td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Delete
                                            </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vegetables</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Update
                                            </a>
                                    </td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Delete
                                            </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Meat</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Update
                                            </a>
                                    </td>
                                    <td>
                                        <a href="#" class="fw-bold"
                                                role="button" aria-expanded="false">
                                                Delete
                                            </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <br><br>





            <!--Bootstrap JS link-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

            <script>
                var el = document.getElementById("wrapper")
                var toggleButton = document.getElementById("menu-toggle")

                toggleButton.onclick = function () {
                    el.classList.toggle("toggled")
                }
            </script>
</body>

</html>