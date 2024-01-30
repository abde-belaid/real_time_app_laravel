@extends('Master.layouts')
@section('content')
    <div class="container">
        @if (session('messagedanger'))
            <span class="alert alert-danger">{{session('messagedanger')}}</span>
        @endif

        <form action="{{route('loginA')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="border border-2 rounded-3 p-5 border-primary bg-info">
                <legend class="text-center fs-3 fw-bolder text-decoration-underline text-warning mb-5">Log in</legend>
                <div class="row">

                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <img src="https://cdn.pixabay.com/photo/2019/12/16/10/30/iphone-4699057_640.jpg" class="w-100 h-auto border border-info rounded-2 " alt="">
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
    
                        <div class="row m-2">
                            <div class="col-4 col-xs-12 col-sm-12">
                                <label for="">Email : </label>
                            </div>
                            <div class="col-8 col-xs-12 col-sm-12">
                                <input type="email" class="form-control" placeholder="email" name="email">
                            </div>
    
                        </div>
                        <div class="row m-2">
                            <div class="col-4 col-xs-12 col-sm-12">
                                <label for="">Mot de passe : </label>
                            </div>
                            <div class="col-8 col-xs-12 col-sm-12">
                                <input type="password" class="form-control" placeholder="***" name="pass">
                            </div>
    
                        </div>
                        <div class="">

                            <button class="btn btn-primary  ">Conncter</button>
                        </div>
                    </div>
                </div>
    
            </fieldset>
        </form>
    </div>
@endsection
