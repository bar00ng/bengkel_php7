@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Testimoni</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <Strong>Berhasil!</Strong> {{ session('success') }}
            </div>
        @elseif (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                <strong>Gagal!</strong> {{ session('failed') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Testimoni</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Booker</th>
                                <th>Rating</th>
                                <th>Testimoni</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Booker</th>
                                <th>Rating</th>
                                <th>Testimoni</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <span>List Testimoni Kosong</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kd_booking }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->rating_testimoni }}</td>
                                        <td>{{ $item->deskripsi_testimoni }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/sb-admin/js/demo/datatables-demo.js"></script>
@endsection

@section('styles')
    <!-- Custom styles for this page -->
    <link href="/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
