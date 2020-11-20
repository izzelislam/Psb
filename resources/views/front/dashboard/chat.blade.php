@extends('front.dashboard.pages.app')

@section('title','Pesan')
@push('end-style')
     <link rel="stylesheet" href="{{ asset('front/style/style.css') }}" />
@endpush
@section('page-title','Pesan')
    
@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Pesan</a></div>
        <div class="breadcrumb-item">Home</div>
    </div>
@endsection

@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12">
          <!-- content -->
          <div class="row mt-3 social">
          </div>
          <div class="row mt-4 social">
            <div class="col">
              <div class="container">
                <!-- For demo purpose-->
                <div class="row rounded-lg overflow-hidden shadow">
                  <!-- Chat Box-->
                  <div class="col px-0">
                    <div class="px-4 py-5 chat-box bg-white overflow-auto">
                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Sender Message-->
                      <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                          <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                      <!-- Reciever Message-->
                      <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                          <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                          </div>
                          <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                      </div>

                    </div>

                    <!-- Typing area -->
                    <form action="#" class="bg-light">
                      <div class="input-group">
                        <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                        <div class="input-group-append">
                          <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <!-- end chat -->
            </div>
          </div>
        </div>
</div>
@endsection