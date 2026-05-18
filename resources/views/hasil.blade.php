<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>

@if($student)

    <h1>Data Siswa Ditemukan</h1>

    <p>Nama: {{ $student->nama }}</p>
    <p>Kelas: {{ $student->kelas }}</p>

@else

    <h1>Siswa Tidak Ditemukan</h1>

@endif

<a href="/">Kembali</a>

</body>
</html>