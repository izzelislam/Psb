@extends('front.dashboard.pages.app')

@section('title','Tes Yang Anda Ikuti')

@section('page-title','Tes Yang Anda Ikuti')
    
@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Tes Yg Di ikuti</a></div>
        <div class="breadcrumb-item">Home</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Tes Yang Anda Ikuti</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Tes</th>
                            <th>Status</th>
                            <th>Status pengerjaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- tahap pertama --}}
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>tes tahap Pertama</td>
                            <td>
                              @if ($tahap1 == 0)
                                  <div class="badge badge-warning">
                                    Belum mengikuti tes ini
                                  </div>
                              @else
                                  <div class="badge badge-success">
                                    Lolos
                                  </div>
                              @endif
                            </td>
                            <td>
                              @if ($tahap1 == 0)
                                  <a href="{{ route('tahap-pertama') }}" class="btn btn-primary">Ikuti Tes</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr>
                          {{-- tahapp ke dua --}}
                          @if ($tahap1 > 0 )
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>tes tahap kedua</td>
                            <td>
                              {{-- @php
                                  dd($tahap2->status)
                              @endphp --}}
                              @if (empty($tahap2))
                                <div class="badge badge-warning">
                                  Belum mengikuti tes
                                </div>
                              @elseif($tahap2->status == "tidak")
                                <div class="badge badge-danger">
                                  Tidak Lolos
                                </div>
                              @elseif($tahap2->status == "lolos")
                                <div class="badge badge-success">
                                   Lolos
                                </div>
                              @else
                                 <div class="badge badge-info">
                                   Sudah Mengikuti Tes
                                </div>
                              @endif

                            </td>
                            <td>
                              @if (empty($tahap2))
                                  <a href="{{ route('tahap-kedua') }}" class="btn btn-primary">Ikuti Tes</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr> 
                          @endif
                          {{-- tahap ke tiga --}}
                          @if (!empty($tahap2) && $tahap2->status == "lolos")
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>tes tahap Ketiga</td>
                            <td>
                              {{-- @if (!empty($tahap2))
                                  <div class="badge badge-warning">
                                    Sudah mengikuti tes ini
                                  </div>
                              @elseif($tahap2->status == 'lolos')
                                  <div class="badge badge-success">
                                    Lolos
                                  </div>
                              @else
                              @endif --}}
                              <div class="badge badge-warning">
                                Belum mengikuti tes
                              </div>
                            </td>
                            <td>
                              @if (empty($tahap3))
                                  <a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-primary">Ikuti Tes</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr> 
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
</div>
@endsection