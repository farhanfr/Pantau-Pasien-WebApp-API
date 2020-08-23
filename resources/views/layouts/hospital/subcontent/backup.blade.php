@extends('layouts.hospital.index_hospital')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Backup Data Pasien</h1>
    </div>

    <hr>

    @if($msg=Session::get('msgSuccessDelBac'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Backup Data Pasien</h6>
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
                    @foreach($getBackup as $getBackups)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $getBackups->name }}</td>
                            <td>{{ $getBackups->age }} Tahun</td>
                            <td>{{ $getBackups->name_doctor }}</td>
                            <td>{{ $getBackups->name_nurse }}</td>
                            <td>{{ $getBackups->date_inpatient }}</td>
                            <td>
                                <a href="{{ url('deletebackuppatient/'.$getBackups->id) }}" class="btn btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
