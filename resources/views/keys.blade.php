<!DOCTYPE html>
<html>
<head>
    <title>Data Kunci Lab</title>

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

        button{
            padding:6px 12px;
            cursor:pointer;
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

</div>

<div class="content">

    <h1>Data Kunci Lab</h1>

    <form method="POST" action="/keys/add">

        @csrf

        <input
            type="text"
            name="nama_lab"
            placeholder="Nama Lab"
            required
        >

        <button type="submit">
            Tambah
        </button>

    </form>

    <br>

    <table>

        <tr>
            <th>Nama Lab</th>
            <th></th>
        </tr>

        @foreach($keys as $key)

        <tr>

            <td>
                {{ $key->nama_lab }}
            </td>

            <td width="80">

                <form
                    method="POST"
                    action="/keys/delete/{{ $key->id }}"
                >

                    @csrf

                    <button type="submit">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</div>

</body>
</html>