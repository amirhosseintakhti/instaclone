<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css"/>
    <link rel="stylesheet" href="/css/mystyle.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>@yield('title')</title>
</head>
<body class="@yield('bg')">
    <div style="position: fixed; top: 0; bottom: 0; right: 0; left: 0; display: flex; justify-content: center; align-items: center;" id="loader">
        <div class="custom-loader"></div>
    </div>
    <div id="body" style="display: none;">
        <div class="@yield('bg-header')">
            <header class="container">
                <div class="row d-flex justify-content-between align-items-center flex-wrap">
                    <div class="col-3 d-flex justify-content-start text-sm-start "><img src="/assets/photo-output.PNG" alt="logo" style="width: 70px;"></div>
                    <nav class="col-6 d-none d-lg-flex align-items-center justify-content-lg-center justify-content-sm-end ">
                        <a href="/">HOME</a>
                        <a href="/services" class="btn-servs btn btn-outline-info border-bottom-0 border-top-0 btn-rounded" >SERVICES</a>
                        <a href="/contact">CONTACT</a>
                        <a href="#!">about</a>
                    </nav>
                        <button class="col-1 btn d-lg-none" style="background-color: #e76c75;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-three-dots"></i></button>
                        <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                          <div class="offcanvas-header">
                            <h4 class="offcanvas-title" id="offcanvasRightLabel">menu</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body">
                            <a class="text-decoration-none d-block" href='/'>home</a>
                            <a class="text-decoration-none d-block" href=/services>services</a>
                            <a class="text-decoration-none d-block" href=/contact>contact</a>
                            <a class="text-decoration-none d-block" href=/about>about</a>
                          </div>
                        </div>
                    <div class="col justify-content-lg-end align-items-center flex-wrap d-none d-lg-flex" style="font-size: 10px; text-align: center;">
                    09115388720<a href="tel:+989115388729" class="ms-3 icon-header text-center"><i class="bi bi-telephone-outbound text-center"></i></a>
                    </div>
                </div>
            </header>
        </div>

            @yield('content')
            <div class="@yield('bg-f')">
                <div class="footer container ">
                <div class="row border-top">
                    <div class="col pt-3">
                        <h5 style="font-family:caros italic; font-size: 14px;" class="d-inline">AT dev</h5>
                        <span class="border-start ms-3"></span>
                        <span class="ms-3" style="font-size: 12px;">all rights reserved</span>
                    </div>
                </div>
            </div>
            </div>
            

    </div>
            <script>
                setTimeout(() => {
                    document.getElementById('loader').style.display='none'
                }, 1000);
                setTimeout(() => {
                    document.getElementById('body').style.display='block'
                }, 1000);
            </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        </body>
        </html>
            
 