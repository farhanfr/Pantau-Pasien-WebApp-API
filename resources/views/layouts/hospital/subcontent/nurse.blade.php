@extends('layouts.hospital.index_hospital')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perawat</h1>
    </div>

    <button class="btn btn-success" data-toggle="modal" data-target="#addDoctorModal">Tambah Perawat</button>

    <hr>

    @if($msg=Session::get('msgSuccessAddNur'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    @if($msg=Session::get('msgSuccessDelNur'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    @if($msg=Session::get('msgFailedAddNur'))
        <div class="alert alert-danger">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perawat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    @php $no=1; @endphp
                    @foreach($getNurse as $getNurses)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $getNurses->name }}</td>
                            <td>{{ $getNurses->address }}</td>
                            <td>{{ $getNurses->number_phone }}</td>
                            <td><img src="{{asset('img/'.$getNurses->photo)}}" class="img-fluid" style="width: 100px;height: 80px"></td>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="{{ url('deletenurse/'.$getNurses->id) }}" class="btn btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Perawat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('addnurse') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Perawat</label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" required name="address">
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="number" class="form-control" required name="number_phone">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" required name="password">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <input type="submit" name="submit" value="Tambah" class="btn btn-primary" onclick="return confirm('Tambah perawat?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection