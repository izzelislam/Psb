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
                              @if (empty($tahap3))
                                  <div class="badge badge-warning">
                                    Belum mengikuti tes 
                                  </div>
                              @elseif ($tahap3->nilai_tes_iq != null && $tahap3->nilai_tes_kepribadian != null && $tahap3->status == null)
                                  <div class="badge badge-info">
                                    Sudah mengikuti tes 
                                  </div>
                              @elseif($tahap3->status == 'lolos')
                                  <div class="badge badge-success">
                                    Lolos
                                  </div>
                              @elseif($tahap3->status == 'tidak')
                                  <div class="badge badge-danger">
                                    tidak
                                  </div>
                              @else
                              @endif
                            </td>
                            <td>
                              @if (empty($tahap3))
                                  <a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-primary">Ikuti Tes</a>
                              @elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
                                  <a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr> 
                          @endif
                          {{-- tahap 4 --}}
                          @if (!empty($tahap3) && $tahap3->status == "lolos")
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>tes tahap Ke Empat</td>
                            <td>
                              @if (empty($tahap4))
                                  <div class="badge badge-warning">
                                    Belum mengikuti tes 
                                  </div>
                              @elseif($tahap4->status == null && $tahap4->link != null)
                                  <div class="badge badge-info">
                                    Sudah Kirim Link Video
                                  </div>
                              @elseif($tahap4->status == 'lolos')
                                  <div class="badge badge-success">
                                    Lolos
                                  </div>
                              @elseif($tahap4->status == 'tidak')
                                  <div class="badge badge-danger">
                                    tidak
                                  </div>
                              @else
                              @endif
                            </td>
                            <td>
                              @if (empty($tahap4))
                                  <a href="{{ route('tahap-empat-video') }}" class="btn btn-primary">Ikuti Tes</a>
                              @elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
                                  <a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr> 
                          @endif
                          {{-- tahap 5 --}}
                          @if (!empty($tahap4) && $tahap4->status == "lolos")
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>tes tahap Ke Lima</td>
                            <td>
                              @if ($tahap5->status == null)
                                  <div class="badge badge-info">
                                    Menunggu Di Hubunggi
                                  </div>
                              @elseif($tahap5->status == 'lolos')
                                  <div class="badge badge-success">
                                    Lolos
                                  </div>
                              @elseif($tahap5->status == 'tidak')
                                  <div class="badge badge-danger">
                                    tidak
                                  </div>
                              @else
                              @endif
                            </td>
                            <td>
                              @if ($tahap5->status == null)
                                  <a href="{{ route('tahap-lima-wawancara') }}" class="btn btn-primary">Info Wawancara</a>
                              @else
                                  <span class="btn btn-success">Sudah Di Ikuti</span>
                              @endif
                            </td>
                          </tr> 
                          @endif
                          {{-- selamat --}}
                          @if (!empty($tahap5) && $tahap5->status == "lolos")
                          <tr>
                            <td rowspan="3" class="text-success">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td colspan="3" class="text-success">
                              <smal><strong><i>Selamat Anda Lolos Seleksi, Unuk Info Selanjutnya Akan Diasampaikan Melalui WhatsApp</i></strong></smal>
                            </td> 
                          </tr> 
                          @elseif(!empty($tahap5) && $tahap5->status == "tidak")
                          <tr>
                            <td rowspan="3" class="text-danger">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td colspan="3" class="text-danger">
                              <smal><strong><i>Mohon Maaf Anda Tidak Lolos Seleksi</i></strong></smal>
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