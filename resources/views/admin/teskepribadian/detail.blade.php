<div class="container">
    <div class="row">
        <div class="col">
        <table cellspacing="2" cellpadding="10">
            <tr>
                <td>
                    <div><h6>Soal</h6></div>
                    {{ $soal->soal }}
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Jawaban</h6>
                </td>
            </tr>
             <tr>
                <td>
                    A .{{ $soal->a }}
                </td>
            </tr>
            <tr>
                <td>
                    B. {{ $soal->b }}
                </td>
            </tr>
            <tr>
                <td>
                    C. {{ $soal->c }}
                </td>
            </tr>
            <tr>
                <td>
                    D. {{ $soal->d }}
                </td>
            </tr>
            <tr>
                <td>
                    E. {{ $soal->e }}
                </td>
            </tr>
            <tr>
                <td>
                    poin : <span class="mx-4">a :{{ $soal->poin_a }}</span>
                           <span class="mx-4">b :{{ $soal->poin_b }}</span>
                           <span class="mx-4">c :{{ $soal->poin_c }}</span>
                           <span class="mx-4">d :{{ $soal->poin_d }}</span>
                           <span class="mx-4">e :{{ $soal->poin_e }}</span>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>