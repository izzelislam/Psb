@extends('admin.pages.app')

@section('title','Data Soal tes Kepribadian')

@section('title-page','Data Soal tes Kepribadian')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Soal tes Kepribadian</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">

                {{-- feedback message --}}
                @if (session('sukses-buat'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-buat') }}
                      </div>
                    </div>
                @elseif (session('hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('hapus') }}
                      </div>
                    </div>
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Soal tes Kepribadian</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                       <div class="col">
                           <div class="btn-group">
                                <button id="del1" class="btn btn-primary ml-2"> Hapus Semua</button>
                              </div>
                              <div class="btn-group dropleft d-inline float-right">
                                <a href="#mymodal"
                                   data-toggle="modal"
                                   data-target="#mymodal"
                                   data-remote="{{ route('soal-tes-kepribadian.create') }}" 
                                   class="btn .btn-icon .icon-left btn-info ml-2"> <i class="fas fa-plus"></i> Buat Data</a>
                                <a href="#mymodal" 
                                   data-remote="{{ route('modal-import') }}"
                                   data-toggle="modal"
                                   data-target="#mymodal"
                                class="btn btn-primary" >
                                Import File
                                </a>
                            </div>
                       </div>
                    </div>
                    <form action="" method="POST">
                      @csrf
                      <button class="d-none" formaction="{{ route('kepribadian-hapus.all') }}" id="del2"></button>
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
                              <th>Soal</th>
                              <th style="width:200px;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($kepribadian as $item)
                            <tr>
                              <td width="10">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}" name="ids[{{ $item->id }}]" value="{{ $item->id }}">
                                  <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td width="10">{{ $loop->iteration }}</td>
                              <td>
                                {{ $item->soal }}
                              </td>                      
                              <td>
                                <a
                                  href="#mymodal"
                                  data-remote="{{ route('soal-tes-kepribadian.show', $item->id) }}"
                                  data-toggle="modal"
                                  data-target="#mymodal"
                                  class="btn btn-success  btn-icon icon-left btn-sm"> 
                                  <i class="fas fa-eye"></i> Detail
                                </a>
                                <a
                                  href="#mymodal"
                                  data-remote="{{ route('soal-tes-kepribadian.edit', $item->id) }}"
                                  data-target="#mymodal"
                                  data-toggle="modal"
                                  class="btn btn-info btn-icon icon-left btn-sm"> 
                                  <i class="fas fa-edit"></i> Edit
                                </a>

                                  <button formaction="{{ route('kepribadian.hapus',$item->id) }}" class="btn btn-danger btn-icon icon-left btn-sm"> <i class="fas fa-times"></i> Hapus</button>
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
  $('#del1').click(function(){
    $('#del2').click();
  });
</script>
<script>
  $("#edit-data").fireModal({
    title:'Filter Data',
    body: `
      <h1>hello</h1>   
    `});
</script>
<script>
  jQuery(document).ready(function($){
    $('#mymodal').on('show.bs.modal',function(e){
      var button=$(e.relatedTarget);
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
