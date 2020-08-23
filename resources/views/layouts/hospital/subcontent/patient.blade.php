@extends('layouts.hospital.index_hospital')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pasien</h1>
    </div>

    <button class="btn btn-success" data-toggle="modal" data-target="#addDoctorModal">Tambah Pasien</button>

    <hr>

    @if($msg=Session::get('msgSuccessDelPat'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    @if($msg=Session::get('msgSuccessAddPat'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    @if($msg=Session::get('msgFailedAddPat'))
        <div class="alert alert-danger">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Dokter</th>
                        <th>Perawat</th>
                        <th>Tgl Masuk RS</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    @php $no=1; @endphp
                    @foreach($getPatient as $getPatients)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $getPatients->name }}</td>
                            <td>{{ $getPatients->age }} Tahun</td>
                            <td>{{ $getPatients->name_doctor }}</td>
                            <td>{{ $getPatients->name_nurse }}</td>
                            <td>{{ $getPatients->date_inpatient }}</td>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-info">Backup</a>
                                <a href="{{ url('deletedoctor/'.$getPatients->id) }}" class="btn btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('addpatient') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" required name="address">
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="number" class="form-control" required name="age">
                        </div>
                        <div class="form-group">
                            <label>Dokter</label>
                            <select class="form-control" required name="doctor_id">
                                @foreach($getDoctor as $getDoctors)
                                    <option value="{{ $getDoctors->id }}">{{ $getDoctors->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Perawat</label>
                            <select class="form-control" required name="nurse_id">
                                @foreach($getNurse as $getNurses)
                                <option value="{{ $getNurses->id }}">{{ $getNurses->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" required name="nik">
                        </div>
                        <div class="form-group">
                            <label>Tgl Masuk RS</label>
                            <input type="date" class="form-control" required name="date_inpatient">
                        </div>
                        <input type="submit" name="submit" value="Tambah" class="btn btn-primary" onclick="return confirm('Tambah Data?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
