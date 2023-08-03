@extends('admin.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Booking</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Booking</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Booker</th>
                                <th>No. Telp Booker</th>
                                <th>Alamat Booker</th>
                                <th>Status Booking</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Booker</th>
                                <th>No. Telp Booker</th>
                                <th>Alamat Booker</th>
                                <th>Status Booking</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <span>List Booking Kosong</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kd_booking }}</td>
                                        <td>{{ $item->nama_booking }}</td>
                                        <td>{{ $item->nomor_hp_booking }}</td>
                                        <td>{{ $item->email_booking }}</td>
                                        <td>
                                            @if ($item->status == 'Belum Selesai')
                                                <span class="badge badge-danger">Belum Selesai</span>
                                            @elseif ($item->status == 'On Progress')
                                                <span class="badge badge-warning">On Progress</span>
                                            @elseif ($item->status == 'Selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Button See Details --}}
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                                data-toggle="modal" data-target="#detail-booking-{{ $item->kd_booking }}"
                                                data-bs-placement="bottom" title="Lihat Detail">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="detail-booking-{{ $item->kd_booking }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ 'Detail ' . $item->kd_booking }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <dl class="row">
                                                                <dt class="col-sm-4">Tanggal Booking</dt>
                                                                <dd class="col-sm-8">{{ $item->created_at }}</dd>

                                                                <dt class="col-sm-4">Nama Booker</dt>
                                                                <dd class="col-sm-8">{{ $item->nama_booking }}</dd>

                                                                <dt class="col-sm-4">Daftar Belanja</dt>
                                                                <dd class="col-sm-8">
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($item->bookingDetail as $detail)
                                                                            <li>{{ $detail->jasa->nama_jasa }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </dd>

                                                                <dt class="col-sm-4">Status</dt>
                                                                @if ($item->status == 'Belum Selesai')
                                                                    <dd class="col-sm-8 text-danger">Belum Selesai</dd>
                                                                @elseif ($item->status == 'On Progress')
                                                                    <dd class="col-sm-8 text-warning">On Progress</dd>
                                                                @elseif ($item->status == 'Selesai')
                                                                    <dd class="col-sm-8 text-success">Selesai</dd>
                                                                @endif

                                                                <dt class="col-sm-4">Warna</dt>
                                                                <dd class="col-sm-8">
                                                                    {{ $item->warna_booking !== null ? $item->warna_booking : '-' }}
                                                                </dd>

                                                                <dt class="col-sm-4">Kategori</dt>
                                                                <dd class="col-sm-8">
                                                                    {{ $item->kategori_booking !== null ? $item->kategori_booking : '-' }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Button Tandai OnProgress --}}
                                            @if ($item->status == 'Belum Selesai')
                                                <form
                                                    action="{{ route('patch.book', ['kd_booking' => $item->kd_booking, 'status' => 'on-progress']) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="Tandai On Progress">
                                                        <i class="fa fa-wrench"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($item->status == 'On Progress')
                                                {{-- Button Tandai Selesai --}}
                                                <form
                                                    action="{{ route('patch.book', ['kd_booking' => $item->kd_booking, 'status' => 'selesai']) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="Tandai Selesai">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Button Hapus Booking --}}
                                            @if (Auth::user()->hasRole(['owner']))
                                                <form
                                                    action="{{ route('delete.book', ['kd_booking' => $item->kd_booking]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
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
