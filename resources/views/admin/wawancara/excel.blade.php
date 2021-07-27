<div>
    <table>
        <thead>
            <tr>
                <td>nama</td>
                <td>no wa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($wawancara as $item)
                <tr>
                    <td>{{ $item->user->biodata1->nama }}</td>
                    <td>{{ $item->user->biodata1->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>