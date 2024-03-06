@extends('layout.layout')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Berita</h4>
                            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                            <a class="btn btn-primary btn-round ml-auto" href="/lap_jenis" target="_blank">
                                <i class="fa fa-print"></i>
                                Cetak Data
                            </a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data_jenis as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->nama_jenis }}</td>
                                                <td>
                                                    <button href="#modalEdit{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button>

                                                    <button href="#modalHapus{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/jenisbarang/store">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" class="form-control" name="nama_jenis" placeholder="Jenis Barang..."
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($data_jenis as $u)
        <div class="modal fade" id="modalEdit{{ $u->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/jenisbarang/update/{{ $u->id }}">
                        @csrf
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" value="{{ $u->jenis_barang }}" class="form-control" name="nama_Jenis"
                                placeholder="Jenis Barang..." required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($data_jenis as $d)
        <div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/jenisbarang/destroy/{{ $d->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah Anda Ingin menghapus Data Ini ?</h5>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i></button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
