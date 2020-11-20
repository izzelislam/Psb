<div>
    <table>
        <thead>
            <tr>
                <td>nama</td>
                <td>umur</td>
                <td>no whatsapp</td>
                <td>keluarga</td>
                <td>jenis kelamin</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($biodata as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->no_wa }}</td>
                    <td>{{ $item->keluarga }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>