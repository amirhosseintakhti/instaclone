@extends('layouts.main')


@section('title' ,'services')
@section('bg ' , 'bg-color2')
{{-- @section('') --}}
@section('content')

            <main class="py-5">
                <div class="container px-3">
                    <div style="background-color:#f8f7f1;" class="rounded-4 py-5 px-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-12 d-flex justify-content-center col-lg-6">
                                <img src="img/amirhossein1.png" alt="my image" style="width: 75%;">
                            </div>
                            <div class="col-12 col-lg-6">
                                <h1>how can i help you?</h1>
                                <label for="text" class="form-lable"></label>
                                <textarea id="text" class="form-control input1" rows="3" placeholder="talk to me"></textarea>
                                <div class="my-3 text-end">
                                    <input type="submit" value="sumbit" class=" btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
@endsection