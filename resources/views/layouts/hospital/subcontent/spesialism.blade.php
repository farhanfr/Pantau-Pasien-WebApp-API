@extends('layouts.hospital.index_hospital')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Spesialisasi</h1>
    </div>

    <button class="btn btn-success" data-toggle="modal" data-target="#addDoctorModal">Tambah Spesialisasi</button>

    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Spesialisasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Spesialisasi</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Spesialisasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Nama Spesialisasi</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection