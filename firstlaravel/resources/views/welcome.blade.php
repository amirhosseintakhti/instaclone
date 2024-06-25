@extends('layouts.main')
@section('title','profile')
@section('bg','bg-color1')
@section('bg-f' ,'bg-color2')
@section('content')
{{-- @section('bg' , 'bg-color') --}}

            <div>
                <section class="container mt-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start ">
                        <h1 class="fw-bolder">HEY THERE,<br>i'm amir</h1>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <p class="align-self-center">i design beautifully simple<br>thing,and i love what i do</p>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-12 justify-content-center col-lg-4 justify-content-lg-start d-flex ">
                        <p class="y-exp align-self-center">2</p>
                        <p class="align-self-center">YEARS<br>EXPERIENCE</p>
                    </div>
                    <div class="col-12 justify-content-center col-lg-4 justify-content-lg-center d-flex order-2 order-lg-0" style="text-align: center;">
                        <img src="/assets/amir.PNG" alt="" style="width: 75%; display: inline-block;">
                    </div>
                    <div class="col-12 justify-content-center col-lg-4 justify-content-lg-end d-flex order-1 order-lg-0">
                        <p>PROFESSIONAL<br>UI/UX DESIGNER</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-color2">
            <section class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-12 col-lg-4 order-1 order-lg-0">
                        <div class="row ">
                            <div class="col-12 box shadow p-3 mb-2 bg-white rounded d-flex align-items-center animate__animated animate__fadeInLeft animate__delay-1s">
                                <i class="bi bi-pc-display-horizontal bg-success bg-opacity-75 text-white rounded-5 py-1 px-2"></i>
                                <p class="ms-3 fw-bolder " style="font-size: 12px;">website design</p>
                            </div>
                            <div class="col-12 box shadow p-3 mb-2 bg-white rounded d-flex align-items-center animate__animated animate__fadeInLeft animate__delay-2s">
                                <i class="bi bi-phone bg-warning text-white rounded-5 py-1 px-2"></i>
                                <P class="ms-3 fw-bolder" style="font-size: 12px;">mobile app design</P>
                            </div>
                            <div class="col-12 box shadow p-3 mb-2 bg-white rounded d-flex align-items-center animate__animated animate__fadeInLeft animate__delay-3s">
                                <i class="bi bi-code-slash bg-danger bg-opacity-75 text-white rounded-5 py-1 px-2"></i>
                                <p class="ms-3 fw-bolder " style="font-size:12px">full stack developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12  col-lg-7  animate__animated animate__fadeInLeft text-lg-end text-center ">
                        <h2 class="question" style="font-size: 50px;">what do i help?</h2>
                        <p>i will help you with finging a solution and solve<br>your problems,we use process design to create digital<br>
                          products.besids that also help their business.</p>
                    </div>
                </div>
            </section>
        </div>
            
            <div>
                <section class=" container">
                    <div class="row pt-5">
                        <div class="col-12 col-lg-8 text-center text-lg-start">
                            <p class="fw-bolder " style="font-size: 35px;">let's make something <br>amazing toghtether</p>
                        </div>
                        <div class="col-12 col-lg-4 text-center text-lg-end">
                            <p class="fw-bolder " style="font-size: 20px;">information</p>
                            <p style="font-size: 10px;">taleqani-1 gonbad,golestan,ir</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3 text-center text-lg-start">
                                <h3>start by <a href="/services.html" style="color:#e76c75 ;">saying hi</a></h3>
                        </div>
                    </div>
                </section>
            </div>
            

  
@endsection