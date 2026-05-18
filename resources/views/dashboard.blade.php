<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>

    <h1>Dashboard Peminjaman</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Lab</th>
            <th>Status</th>
            <th>Waktu Pinjam</th>
            <th>Foto</th>
        </tr>

        @foreach($transactions as $transaction)

            <tr>

                <td>
                    {{ $transaction->student->nama }}
                </td>

                <td>
                    {{ $transaction->student->kelas }}
                </td>

                <td>
                    {{ $transaction->keyLab->nama_lab }}
                </td>

                <td>
                    {{ $transaction->status }}
                </td>

                <td>
                    {{ $transaction->created_at }}
                </td>

                <td>

                    <img
                        src="/uploads/{{ $transaction->foto }}"
                        width="150"
                    >

                </td>

            </tr>

        @endforeach

    </table>

</body>
</html>