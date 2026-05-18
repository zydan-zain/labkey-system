<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>

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

        .notif{
            background:#ffdddd;
            color:red;
            padding:10px;
            margin-bottom:20px;
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

    <h1>Data Siswa</h1>

    @if(session('error'))

        <div class="notif">

            {{ session('error') }}

        </div>

    @endif

    <form method="POST" action="/students/add">

        @csrf

        <input
            type="text"
            name="nama"
            placeholder="Nama"
            required
        >

        <input
            type="text"
            name="kelas"
            placeholder="Kelas"
            required
        >

        <input
            type="text"
            name="rfid_uid"
            placeholder="RFID UID"
            required
        >

        <button type="submit">
            Tambah
        </button>

    </form>

    <br>

    <table>

        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>RFID UID</th>
            <th></th>
        </tr>

        @foreach($students as $student)

        <tr>

            <td>
                {{ $student->nama }}
            </td>

            <td>
                {{ $student->kelas }}
            </td>

            <td>
                {{ $student->rfid_uid }}
            </td>

            <td width="80">

                <form
                    method="POST"
                    action="/students/delete/{{ $student->id }}"
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