<div>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Kabupaten/Kota</td>
                <td>Provinsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($lolos as $item)
                <tr>
                    <td>{{ $item->user->biodata1->nama }}</td>
                    <td>{{ $item->user->biodata2->kabupaten->name }}</td>
                    <td>{{ $item->user->biodata2->provinsi->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>