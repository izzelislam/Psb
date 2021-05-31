@extends('admin.pages.app')

@section('title','Data Question & Answer')

@section('title-page','Data Question & Answer')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Q&A</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">

                {{-- feedback message --}}
                @if (session('sukses-kirim'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-kirim') }}
                      </div>
                    </div>
                @elseif(session('sukses-hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-hapus') }}
                      </div>
                    </div>
                @elseif(session('sukses-edit'))
                    <div class="alert alert-info alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-edit') }}
                      </div>
                    </div>
                @else
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Question & Answer</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                       <div class="col"> 
                            <button class="btn btn-primary" type="submit" id="del1">
                              Hapus Semua
                            </button>
                       </div>
                    </div>
                    <form method="POST">
                      @csrf
                      <button class="d-none" formaction="{{ route('pesan-hapus.all') }}" id="del2"> wlcome</button>
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                          <thead>
                            <tr>
                              <th>
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                              </th>
                              <th>No</th>
                              <th>Pengirim</th>
                              <th>Tanggal</th>
                              <th class="w-30">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($pesan as $item)
                            <tr>
                              <td width="10">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}" name="ids[{{ $item->id }}]" value="{{ $item->id }}">
                                  <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td width="10">{{ $loop->iteration }}</i></td>
                              <td>
                                @if ($item->user->biodata1 != null)
                                {{ $item->user->biodata1->nama }}
                                @else
                                {{ $item->user->name }}
                                @endif
                                
                                @php
                                    $data=App\Models\Chat::where('teman_id','=',$item->id)->whereHas('user',function($query){
                                      $query->where('role','=','pendaftar');
                                    })->where('read','=',null)->get();
                                @endphp

                                @if ($data->count() != null)
                                <span class="float-right mr-5">
                                  <i class="fas fa-envelope text-primary" style="font-size:1.8em;z-index:1;"></i>
                                  <h6 class="d-inline" style="margin-left:-14px;">
                                    <span class="badge badge-danger "> {{ $data->count() }}</span>
                                  </h6>
                                </span>
                                @endif
                              </td>
                              <td>{{ $item->created_at->format('Y-M-D') }}</td>
                              
                              <td  style="width: 250px;">
                                
                                <a
                                  href="#mymodal"
                                  data-toggle="modal" 
                                  data-target="#mymodal"
                                  data-remote="{{ route('isi-chat.index', $item->id) }}"
                                  id="edit-data"
                                  class="btn btn-info btn-icon icon-left btn-sm"> 
                                  <i class="fas fa-eye"></i> Lihat Pesan
                                </a>
  
                                  <button formaction="{{ route('pesan.hapus', $item->id) }}" class="btn btn-danger btn-icon icon-left btn-sm"> <i class="fas fa-trash"></i> Hapus Pesan</button>
                              </td>
                            </tr>
          
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection
@push('end-script')
    <script>
      $("#del1").click(function(){
        $("#del2").click();
      });
    </script>
    <script>
      jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
          var button = $(e.relatedTarget);
          var modal =$(this);

          modal.find('.modal-body').load(button.data('remote'));
          modal.find('.modal-title').html(button.data('title'));
        });
      });
    </script>
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <i class="fas fa-spiner fa-spin"></i>
          </div>
        </div>
      </div>
    </div>
@endpush  