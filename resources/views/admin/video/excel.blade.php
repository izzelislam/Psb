<div>
  <table>
      <thead>
          <tr>
              <td>Nama</td>
              <td>Nilai Tes iq</td>
              <td>No wa</td>
          </tr>
      </thead>
      <tbody>
          @foreach ($video as $item)
              <tr>
                  <td>{{ $item->user->biodata1->nama }}</td>
                  <td>{{ $item->user->video->link }}</td>
                  <td>{{ $item->user->biodata1->no_wa }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>