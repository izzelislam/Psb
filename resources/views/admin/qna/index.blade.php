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
                @if (session('sukses-buat'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-buat') }}
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
                           <div class="btn-group dropleft">
                                <a href="{{ route('qna.create') }}" class="btn .btn-icon .icon-left btn-info ml-2"> <i class="fas fa-plus"></i> Buat Data</a>
                            </div>
                           <div class="btn-group dropleft d-inline float-right">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export
                                </button>
                                <div class="dropdown-menu dropleft">
                                    <a class="dropdown-item has-icon" href="#"><i class="far fa-heart"></i>pdf</a>
                                    <a class="dropdown-item has-icon" href="#"><i class="far fa-heart"></i>xlsx</a>
                                    <a class="dropdown-item has-icon" href="#"><i class="far fa-heart"></i>csv</a>
                                </div>
                                <button class="btn btn-info ml-2">Filter</button>
                            </div>
                       </div>
                    </div>
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
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th class="w-30">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($qna as $item)
                          <tr>
                            <td width="10">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}">
                                <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td width="10">{{ $loop->iteration }}</td>
                            <td>
                              {{ $item->pertanyaan }}
                            </td>
                            <td>{{ $item->jawaban }}</td>
                            
                            <td width="100">
                              
                              <a 
                              href="{{ route('qna.edit', $item->id) }}"
                                 id="edit-data"
                                class="btn btn-info btn-icon icon-left btn-sm"> 
                                <i class="fas fa-edit"></i> Edit
                              </a>

                              <form action="{{ route('qna.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-icon icon-left btn-sm"> <i class="fas fa-times"></i> Hapus</button>
                              </form>
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
@endsection

@if (isset($data))
    @push('end-script')
    <script>
      $("#edit-data").fireModal({
        title:'Filter Data',
        body: `
         <h1>hello</h1>   
        `});
    </script>
@endpush
@endif
