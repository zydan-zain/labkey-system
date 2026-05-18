<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <style>

        body{
            margin:0;
            font-family:Arial;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#222;
            color:white;
            position:fixed;
            padding:20px;
        }

        .sidebar h2{
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            margin-bottom:15px;
        }

        .content{
            margin-left:270px;
            padding:20px;
        }

        table{
            border-collapse:collapse;
            width:100%;
        }

        table,
        th,
        td{
            border:1px solid black;
        }

        th,
        td{
            padding:10px;
            text-align:left;
        }

    </style>

</head>
<body>

    <div class="sidebar">

        <h2>LABKEY</h2>

        <a href="/dashboard">
            Histori Peminjaman
        </a>

        <a href="/students">
            Data Siswa
        </a>

        <a href="/keys">
            Data Kunci Lab
        </a>

        <a href="/logout">
            Logout
        </a>

    </div>

    <div class="content">

        <h1>Histori Peminjaman</h1>

        <table>

            <tr>
                <th>Nama Siswa</th>
                <th>Lab Dipinjam</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Foto</th>
            </tr>

            @foreach($transactions as $transaction)

            <tr>

                <td>
                    {{ $transaction->student->nama ?? '-' }}
                </td>

                <td>
                    {{ $transaction->keyLab->nama_lab ?? '-' }}
                </td>

                <td>
                    {{ $transaction->status }}
                </td>

                <td>
                    {{ $transaction->created_at }}
                </td>

                <td>

                    @if($transaction->foto)

                        <img
                            src="/uploads/{{ $transaction->foto }}"
                            width="100"
                        >

                    @endif

                </td>

            </tr>

            @endforeach

        </table>

    </div>

</body>
</html>