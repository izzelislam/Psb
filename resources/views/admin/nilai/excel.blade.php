<div>
  <table>
      <thead>
          <tr>
              <td>Nama</td>
              <td>Nilai Tes iq</td>
              <td>Nilai Tes Kepribadian</td>
              <td>No wa</td>
          </tr>
      </thead>
      <tbody>
          @foreach ($nilai as $item)
              <tr>
                  <td>{{ $item->user->biodata1->nama }}</td>
                  <td>{{ $item->user->quis->nilai_tes_iq }}</td>
                  <td>{{ $item->user->quis->nilai_tes_kepribadian }}</td>
                  <td>{{ $item->user->biodata1->no_wa }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>