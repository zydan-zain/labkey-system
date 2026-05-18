<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Kunci Lab</title>
</head>
<body>

    <h1>Scan Kartu Pelajar</h1>

    <form method="GET" action="/">

        <input
            type="text"
            name="rfid_uid"
            placeholder="Scan kartu di sini"
            autofocus
        >

        <button type="submit">
            Cari
        </button>

    </form>

    <hr>

    @if($student)

        <h2>Data Siswa</h2>

        <p>Nama: {{ $student->nama }}</p>
        <p>Kelas: {{ $student->kelas }}</p>

        @if($transaction)

            <h2>Pengembalian Kunci</h2>

            <video
                id="camera"
                width="300"
                autoplay
            ></video>

            <br><br>

            <button
                type="button"
                onclick="ambilFoto()"
            >
                Ambil Foto
            </button>

            <br><br>

            <canvas
                id="canvas"
                width="300"
                height="200"
                style="display:none;"
            ></canvas>

            <img
                id="hasilFoto"
                width="300"
            >

            <form
                method="POST"
                action="/kembalikan"
            >

                @csrf

                <input
                    type="hidden"
                    name="transaction_id"
                    value="{{ $transaction->id }}"
                >

                <input
                    type="hidden"
                    name="foto"
                    id="fotoInput"
                >

                <br><br>

                <button type="submit">
                    Kembalikan Kunci
                </button>

            </form>

        @else

            <h2>Pilih Kunci Lab</h2>

            <form
                method="POST"
                action="/pinjam"
            >

                @csrf

                <input
                    type="hidden"
                    name="student_id"
                    value="{{ $student->id }}"
                >

                <select name="key_lab_id">

                    @foreach($keys as $key)

                        <option value="{{ $key->id }}">
                            {{ $key->nama_lab }}
                        </option>

                    @endforeach

                </select>

                <br><br>

                <video
                    id="camera"
                    width="300"
                    autoplay
                ></video>

                <br><br>

                <button
                    type="button"
                    onclick="ambilFoto()"
                >
                    Ambil Foto
                </button>

                <br><br>

                <canvas
                    id="canvas"
                    width="300"
                    height="200"
                    style="display:none;"
                ></canvas>

                <img
                    id="hasilFoto"
                    width="300"
                >

                <input
                    type="hidden"
                    name="foto"
                    id="fotoInput"
                >

                <br><br>

                <button type="submit">
                    Pinjam Kunci
                </button>

            </form>

        @endif

    @elseif(request('rfid_uid'))

        <h2>Siswa Tidak Ditemukan</h2>

    @endif

    <script>

        const camera =
            document.getElementById('camera');

        if(camera) {

            navigator.mediaDevices
                .getUserMedia({
                    video: true
                })
                .then(function(stream) {

                    camera.srcObject = stream;

                });

        }

        function ambilFoto() {

            const canvas =
                document.getElementById('canvas');

            const context =
                canvas.getContext('2d');

            context.drawImage(
                camera,
                0,
                0,
                300,
                200
            );

            const image =
                canvas.toDataURL('image/png');

            document.getElementById(
                'hasilFoto'
            ).src = image;

            document.getElementById(
                'fotoInput'
            ).value = image;

        }

    </script>

</body>
</html>