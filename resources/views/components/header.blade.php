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
   <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.15.4/css/all.css')}}" />
   <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
   <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


   <!-- Customized Bootstrap Stylesheet -->
   <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div id="logofix" class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Fruitables
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="{{URL::to('admin')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="{{('uploadshop')}}" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-project-diagram me-2"></i> Shop
                </a>
                <a href="{{('featuredproducts')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Featured Products
                </a>
                <a href="{{URL::to('categories')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Category
                </a>
                <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Role
                </a>
                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Access Control
                </a>

                <a href="{{URL::to('admincomments')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Comments
                </a>
                <a href="{{URL::to('coupon')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Coupon
                </a>
                <a href="{{URL::to('/logout')}}" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Logout
                </a>
            </div>
        </div>
