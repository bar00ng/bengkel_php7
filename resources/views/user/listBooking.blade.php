@extends('user.master')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 w-75">
            <div class="card custom-card p-4">
                <h3>History Booking</h3>
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Status Booking</th>
                                <th>Total (Rp.)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Status Booking</th>
                                <th>Total (Rp.)</th>
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
                                        <td>
                                            @if ($item->status == 'Belum Selesai')
                                                <span class="badge text-bg-danger">Belum Selesai</span>
                                            @elseif ($item->status == 'On Progress')
                                                <span class="badge text-bg-warning">On Progress</span>
                                            @elseif ($item->status == 'Selesai')
                                                @if (!$item->payment->isPayed)
                                                    <span class="badge text-bg-secondary">Belum Dibayar</span>
                                                @elseif ($item->payment->isPayed)
                                                    <span class="badge text-bg-success">Selesai</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            {{ 'Rp. ' . number_format($item->total_booking) }}
                                        </td>
                                        <td>
                                        <a class="nav-link {{ request()->routeIs('*testimoni*') ? 'active' : '' }}" aria-current="page" href="{{ route('guest.form.testimoni', ['kd_booking' => $item->kd_booking]) }}">Test</a>
                                            {{-- Button See Details --}}
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detail-booking-{{ $item->kd_booking }}">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="detail-booking-{{ $item->kd_booking }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ 'Detail ' . $item->kd_booking }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                                            <li>{{ $detail->jasa->nama_jasa . ' - ' . number_format($detail->jasa->harga_jasa) }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </dd>

                                                                <dt class="col-sm-4">Status</dt>
                                                                @if ($item->status == 'Belum Selesai')
                                                                    <dd class="col-sm-8 text-danger">Belum Selesai</dd>
                                                                @elseif ($item->status == 'On Progress')
                                                                    <dd class="col-sm-8 text-warning">On Progress</dd>
                                                                @elseif ($item->status == 'Selesai')
                                                                    @if (!$item->payment->isPayed)
                                                                        <dd class="col-sm-8 text-secondary">Belum Bayar</dd>
                                                                    @elseif ($item->payment->isPayed)
                                                                        <dd class="col-sm-8 text-success">Selesai</dd>
                                                                    @endif
                                                                @endif
                    
                                                                <dt class="col-sm-4">Total Belanja</dt>
                                                                <dd class="col-sm-8">{{ 'Rp. ' . number_format($item->total_booking) }}</dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection