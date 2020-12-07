<div>
    <table class="table table-striped display nowrap" id="status-pendaftar">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Wa</th>
                <th>Umur</th>
                <th>Pendidikan</th>
                <th>Keluarga</th>
                <th>Orang Tua</th>
                <th>Penghasilan Ortu</th>
                <th>status</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($biodata2 as $item)
                <tr class="
                    {{ $item->status == 'lolos' ? 'text-success' : '' }}
                    {{ $item->status == 'tidak' ? 'text-danger' : '' }}
                    " 
                    
                    style="{{ $item->status == 'tidak' || $item->status == 'lolos' ? 'font-weight:bold;' : '' }}">
                    <td width="10">{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->user->biodata1->nama }}
                    </td>
                    <td>
                        @php
                            $no=str_split( $item->user->biodata1->no_wa);
                        @endphp
                        {{ $item->user->biodata1->no_wa }}
                    </td>
                    <td>
                    {{ $item->user->biodata1->umur }} &nbsp; Tahun
                    </td>
                    <td>{{ $item->pendidikan_terakhir }}</td>
                    <td>{{ $item->user->biodata1->keluarga }}</td>
                    <td>{{ $item->orang_tua }}</td>
                    <td> <strong>Rp.</strong>{{ $item->penghasilan_ortu }}</td>
                    <td> {{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>