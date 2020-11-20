
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit data tahun ajaran</h4>
                  </div>
                    <form action="/admin/tahun-ajaran/{{ $data->id }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label>Tahun ajaran</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="number" name="tahun" class="form-control phone-number" placeholder="contoh : 2020" value="{{ old('tahun',$data->tahun) }}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Gelomabang</label>
                          <select class="form-control select2" name="gelombang">
                            <option value="{{ $data->gelombang }}" selected>{{ $data->gelombang }}</option>
                            <option value="gel-1" >Gelomabang 1</option>
                            <option value="gel-2">Gelomabang 2</option>
                            <option value="gel-3">Gelomabang 3</option>
                            <option value="gel-4" >Gelomabang 4</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                          <div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="aktif"
                              
                                  {{ $data->status == 'aktif' ? 'checked':'' }}
                              >
                              <label class="form-check-label" for="inlineRadio1"                           >Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="tidak-aktif"
                              
                                  {{ $data->status == 'tidak-aktif' ? 'checked':'' }}
                              >
                              <label class="form-check-label" for="inlineRadio2"
                              >Tidak Aktif</label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            