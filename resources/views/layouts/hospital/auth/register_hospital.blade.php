@extends('layouts.hospital.auth.main_auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background-color: #54C5F8;padding: 20% 0 20% 0 ">
                            <center><h2 class="text-white"><b>Register Rumah Sakit</b></h2></center>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                </div>
                                <hr>
                                @if($msg=Session::get('msgSuccessReg'))
                                    <div class="alert alert-success">
                                        {{ $msg }} , Silahkan <a href="{{ url('/') }}">Login</a>
                                    </div>
                                @endif
                                <form class="user" action="{{ url('addhospital') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user" required placeholder="Masukkan nama rumah sakit">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control form-control-user" required placeholder="Masukkan alamat rumah sakit">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" required  placeholder="Masukkan email rumah sakit">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" required placeholder="Masukkan password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Register" onclick="return confirm('Registerasi Data ?')">
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="{{ url('/') }}">Sudah punya akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection