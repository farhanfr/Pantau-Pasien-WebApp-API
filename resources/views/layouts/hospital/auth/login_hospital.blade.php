@extends('layouts.hospital.auth.main_auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block" style="background-color: #54C5F8;padding: 20% 0 20% 0 ">
                        <center><h2 class="text-white"><b>Login Rumah Sakit</b></h2></center>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                            </div>
                            <hr>
                            @if($msg=Session::get('msgFailLogin'))
                                <div class="alert alert-danger">
                                    {{ $msg }}
                                </div>
                            @endif
                            <form class="user" method="post" action="{{ url('loginhospital') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" required class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password Address">
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ url('registerhospital') }}">Buat Akun Rumah Sakit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection