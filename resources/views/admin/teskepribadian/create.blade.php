@php
    $action='';
    if (isset($data)) {
      $action="/admin/soal-tes-kepribadian/{$data->id} ";
    }else{
      $action="/admin/soal-tes-kepribadian";
    }

    $cek=isset($data);;
@endphp


<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="container">
      <h6>{{ $cek ? 'Edit' :'Buat' }} data tahun ajaran</h6>
    </div>
    <form action={{ $action }} method="POST" x-data="selectform()">
      @csrf
      @if ($cek)
          @method('PUT')
      @endif
      <div class="card-body">

        <div class="form-group">
          <h6>Soal</h6>
          <div class="input-group">
            <textarea style="height: 100px;" name="soal" class="form-control">
              {{ $cek ? $data->soal :'' }}
            </textarea>
          </div>
        </div>
        
        <table class="w-100" cellpadding="10" cellspacing="10">
          <tr>
            <th colspan="2">
              <h6>Jawaban</h6>
            </th>
            <th>
              <h6>Poin Jawaban</h6>
            </th>
          </tr>
          {{-- A --}}
          <tr>
            <td>
              <strong> A .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="a" class="form-control"  value="{{ $cek ? $data->a :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <select name="poin_a" id="">
                @if ($cek)
                    <option value="{{ $data->poin_a }}">{{ $data->poin_a }}</option>
                @else
                  <option value="">-- scrore --</option>
                @endif
                <template x-for="poin in poins" index="poin.id">
                  <option :value="poin" x-text="poin" ></option>
                </template>
              </select>
            </td>
          </tr>
          {{-- B --}}
          <tr>
            <td>
              <strong> B .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="b" class="form-control"  value="{{ $cek ? $data->b :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <select name="poin_b" id="">
                @if ($cek)
                    <option value="{{ $data->poin_b }}">{{ $data->poin_b }}</option>
                @else
                  <option value="">-- scrore --</option>
                @endif
                <template x-for="poin in poins" index="poin.id">
                  <option :value="poin" x-text="poin" ></option>
                </template>
              </select>
            </td>
          </tr>
          {{-- c --}}
          <tr>
            <td>
              <strong> C .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="c" class="form-control"  value="{{ $cek ? $data->c :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <select name="poin_c" id="">
                @if ($cek)
                    <option value="{{ $data->poin_c }}">{{ $data->poin_c }}</option>
                @else
                  <option value="">-- scrore --</option>
                @endif
                <template x-for="poin in poins" index="poin.id">
                  <option :value="poin" x-text="poin" ></option>
                </template>
              </select>
            </td>
          </tr>
          {{-- d --}}
          <tr>
            <td>
              <strong> D .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="d" class="form-control"  value="{{ $cek ? $data->d :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <select name="poin_d" id="" >
                @if ($cek)
                    <option value="{{ $data->poin_d }}">{{ $data->poin_d }}</option>
                @else
                  <option value="">-- scrore --</option>
                @endif
                <template x-for="poin in poins" index="poin.id">
                  <option :value="poin" x-text="poin" x-on:change="coba(poin)"></option>
                </template>
              </select>
            </td>
          </tr>
          {{-- e --}}
          <tr>
            <td>
              <strong> E .</strong>
            </td>
            <td>
              <input  type="text" style="height: 50px;" name="e" class="form-control"  value="{{ $cek ? $data->e :''}}">
              </input>
            </td>
            <td class="pl-5">
            <select name="poin_e" id="">
              @if ($cek)
                  <option value="{{ $data->poin_e }}" >{{ $data->poin_e }}</option>
              @else
                <option value="">-- scrore --</option>
              @endif
              <template x-for="poin in poins" index="poin.id">
                <option :value="poin" x-text="poin"></option>
              </template>
            </select>
            </td>
          </tr>
        </table>
        
        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left my-5"> <i class="fas fa-save"></i> Kirimkan</button>
      </div>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

  <script>
    function selectform(){
      return{
        a:null,
        b:null,
        c:null,
        d:null,
        e:null,
        poins:[1, 2, 3, 4, 5],

        coba(param){
          var data = this.poins
           for ( var i = 0; i < data.length; i++ ){
             if ( data[i] === param ){
               data.splice(i,1)
             }
           }

           this.poins=data
          console.log(this.e)
        }
      }
    }
  </script>

