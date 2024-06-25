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
    <title>contact</title>
</head>
<body>
    <div class="container-fluid fill">
        <div class="row fill">
            <div class="col-8">
                <header class="px-2">
                    <div class="row d-flex justify-content-between align-items-center flex-wrap">
                        <div class="col-3 d-flex justify-content-start text-sm-start "><img src="/assets/photo-output.PNG" alt="logo" style="width: 70px;"></div>
                        <nav class="col-6 d-none d-lg-flex align-items-center justify-content-lg-center justify-content-sm-end ">
                            <a href="/">HOME</a>
                            <a href="/services" class="btn-servs btn btn-outline-info border-bottom-0 border-top-0 btn-rounded" >SERVICES</a>
                            <a href="/contact">CONTACT</a>
                            <a href="#!">ABOUT</a>
                        </nav>
                            <button class="col-1 btn d-lg-none" style="background-color: #e76c75;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-three-dots"></i></button>
                            <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                              <div class="offcanvas-header">
                                <h4 class="offcanvas-title" id="offcanvasRightLabel">menu</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body ">
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
                <div class="row justify-content-center my-5">
                    <div class="col-11 px-4 py-5 rounded-4" style="background-color: #f8f7f1; ">
                        <div class="row">
                            <div class="col-9 py-3">
                                <h1 style="color:#452f54;">contact us</h1>
                            </div>
                        </div>
                        <form action="/send-message" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="nameinput" class="form-lable"></label>
                                    <input name="fullName" type="name" id="nameinput" class="form-control input1 " placeholder="name" >
                                </div>
                                <div class="col-6">
                                    <label for="inputemail" class="form-lable" ></label>
                                <input name="email" type="email" id="inputemail" class="form-control input1" placeholder="email" aria-describedby="emailHelp"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="topicinput" class="form-lable"></label>
                                    <input name="topic" type="text" id="topicinput" class="form-control input1" placeholder="topic">
                                </div>
                                <div class="col-12">
                                    <label for="messageinput" class="form-lable"></label>
                                    <textarea name="message" type="text" id="messageinput" class="form-control input1" placeholder="message" rows="3"></textarea>
                                </div>
                                <div class="col-12 py-2">
                                    <input class="input-submit" type="submit" value="submit" />
                                </div>
                                <div class="col-8 pt-3">
                                    <input class="form-check-input" id="chek" type="checkbox" value="checkbox">
                                    <label for="check" class="form-check-lable "><small class="text-muted">filled</small></label>
                                </div>
                            </div>
                            </form>
                            <div class="col-9 justify-content-center pt-3 border-bottom"  id="messageArea">
                              
                                @foreach ($messages as $message)
                                {{$message->fullName }}<br>
                                {{-- {{$message->email}}<br> --}}
                                {{$message->topic}}<br>
                                {{$message->message}}
                                <div class="float-end"><form  method="post" action="/delete-messages/{{$message->id}}" >
                                @csrf
                                @method('delete')
                                <input class="btn btn-outline-danger" type="submit" value="delete">
                                </form>
                                </div>
                                <div class="border-bottom pt-3"></div>
                                @endforeach
                            </div>
                    </div>
                    
                </div>
                {{-- <div class="row">
                    <div class="col">
                        <img src="/assets/bitmap.svg" alt="">
                    </div>
                </div> --}}
            </div>
            <div class="col-4 split" style="padding: 0; "   >
                {{-- <img src="./assets/amiro.webp" alt="" style="width: 100%;" > --}}
            </div>
        </div>
     </div>
     <!-- <div class="footer " style="position: relative;">
        <div style="position: absolute; bottom: 0;  z-index: 999; margin-top: -196px;" >
            <img src="/assets/bitmap.svg" alt="" style="width: 100%;">
        </div>
    </div> -->


 <!--<div class="d-flex">
    <div class="section-1" style="width: 66.66%;">
        <header>
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center flex-wrap">
                    <div class="col-3 d-flex justify-content-start text-sm-start "><img src="/assets/photo-output.PNG" alt="logo" style="width: 70px;"></div>
                    <nav class="col-6 d-none d-lg-flex align-items-center justify-content-lg-center justify-content-sm-end ">
                        <a href="./index.html">HOME</a>
                        <a href="./services.html" class="btn-servs btn btn-outline-info border-bottom-0 border-top-0 btn-rounded" >SERVICES</a>
                        <a href="/contact.html">CONTACT</a>
                        <a href="#!">ABOUT</a>
    
                    </nav>
                        <button class="col-1 btn d-lg-none" style="background-color: #e76c75;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-three-dots"></i></button>
    
                        <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                          <div class="offcanvas-header">
                            <h4 class="offcanvas-title" id="offcanvasRightLabel">menu</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body">
                            <a class="text-decoration-none d-block" href=/index.html>home</a>
                            <a class="text-decoration-none d-block" href=/services.html>services</a>
                            <a class="text-decoration-none d-block" href=/contact.html>contact</a>
                            <a class="text-decoration-none d-block" href=/about.html>about</a>
                          </div>
                        </div>
                    <div class="col justify-content-lg-end align-items-center flex-wrap d-none d-lg-flex" style="font-size: 10px; text-align: center;">
                    09115388720<a href="tel:+989115388729" class="ms-3 icon-header text-center"><i class="bi bi-telephone-outbound text-center"></i></a>
                    </div>
            </div>
        </div>
        </header>
        <main class="py-5">
            <div class="container px-3">
                <div style="background-color: #f8f7f1;" class="py-5 px-4 rounded-4">
                    <div class="row ">
                        <div class="col-9">
                            <h1 style="color: #4e3a6d;">contact us</h1>
                            <p>get in touch and let us know how we can help</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="nameinput" class="form-lable"></label>
                            <input type="name" id="nameinput" class="form-control input1 " placeholder="name" >
                        </div>
                        <div class="col">
                            <label for="inputemail" class="form-lable" ></label>
                            <input type="email" id="inputemail" class="form-control input1" placeholder="email" aria-describedby="emailHelp"/>
                        </div>
                    </div>
                </div>
            </div>

            
        </main>
        <footer>
            <div class="container-fluid">
               <div style=" position: relative; top: 206px;">
                <img src="/assets/wave (1).svg" alt="">
               </div> 
               <div>
                <img src="/assets/wave (3).svg" alt="">
               </div>

            </div>
        </footer>
       
 </div>
 <div style="width: 33.34%;">
    <img src="/assets/amiro.webp" alt="" style="width: 100%;">

</div>
 </div>-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>