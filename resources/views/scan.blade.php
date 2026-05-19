<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Kunci Lab - LABKEY SYSTEM</title>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #0f0f0f;
            background-image: radial-gradient(circle at 50% 50%, rgba(255, 122, 0, 0.05) 0%, #0f0f0f 70%);
            color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 122, 0, 0.15);
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .camera-card {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 122, 0, 0.2);
            border-radius: 16px;
            padding: 20px;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.5);
            position: relative;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .camera-label {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #0f0f0f;
            color: #ffb000;
            padding: 4px 18px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid rgba(255, 122, 0, 0.4);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            z-index: 2;
        }

        video, img#hasilFoto {
            border-radius: 12px;
            max-width: 100%;
            width: 320px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            background: #000;
        }

        .info-card {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .scanner-ring {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 122, 0, 0.2) 0%, rgba(255, 122, 0, 0) 70%);
        }

        .scanner-ring::before, .scanner-ring::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid #ffb000;
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        .scanner-ring::after {
            animation-delay: 1s;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.6); opacity: 1; }
            100% { transform: scale(1.6); opacity: 0; }
        }

        .scanner-icon {
            font-size: 4rem;
            color: #ffb000;
            z-index: 10;
        }

        .page-title {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-align: center;
            margin-bottom: 35px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.8rem;
        }

        .form-control-rfid {
            background: rgba(0, 0, 0, 0.4);
            border: none;
            border-bottom: 2px solid rgba(255, 122, 0, 0.3);
            color: #f5f5f5;
            padding: 15px 20px;
            font-size: 1.2rem;
            border-radius: 8px 8px 0 0;
            text-align: center;
            transition: all 0.3s;
            font-weight: 300;
            letter-spacing: 2px;
        }

        .form-control-rfid:focus {
            background: rgba(0, 0, 0, 0.6);
            border-bottom-color: #ffb000;
            box-shadow: none;
            color: #fff;
        }

        .btn-orange {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            color: #0f0f0f;
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-orange:hover {
            background: linear-gradient(135deg, #ff8c00, #ffc100);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 122, 0, 0.3);
            color: #0f0f0f;
        }

        .badge-borrow {
            background: linear-gradient(135deg, rgba(255, 122, 0, 0.2), rgba(255, 176, 0, 0.1));
            color: #ffb000;
            border: 1px solid rgba(255, 176, 0, 0.3);
            font-weight: 500;
        }

        .badge-return {
            background: linear-gradient(135deg, rgba(176, 176, 176, 0.15), rgba(100, 100, 100, 0.1));
            color: #d0d0d0;
            border: 1px solid rgba(176, 176, 176, 0.3);
            font-weight: 500;
        }
        
        .data-label {
            color: #888;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        
        .data-value {
            color: #f5f5f5;
            font-size: 1.15rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .data-value.highlight {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
        }

        .custom-select {
            background-color: rgba(0, 0, 0, 0.3);
            color: #f5f5f5;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 300;
        }

        .custom-select:focus {
            border-color: #ffb000;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 176, 0, 0.25);
        }
    </style>
</head>
<body>

    <div class="main-card">
        <h2 class="page-title"><i class="bi bi-fingerprint me-2"></i>Sistem Peminjaman Kunci Lab</h2>

        @if(!$student)
            <!-- Form RFID Centered -->
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="info-card" style="padding: 20px 40px 40px; background: transparent; border: none;">
                        
                        <div class="scanner-ring" style="margin-top: 20px;">
                            <i class="bi bi-nfc scanner-icon"></i>
                        </div>
                        
                        <h4 class="mb-2 fw-bold" style="letter-spacing: 1px; color: #f5f5f5;">Sistem Menunggu</h4>
                        <p class="text-secondary mb-5" style="font-size: 1.1rem;">Silakan tempelkan kartu pelajar Anda pada perangkat RFID</p>
                        
                        <form method="GET" action="/">
                            <div class="mb-4 position-relative mx-auto" style="max-width: 350px;">
                                <i class="bi bi-upc-scan position-absolute top-50 start-0 translate-middle-y ms-3 text-warning" style="font-size: 1.2rem;"></i>
                                <input type="text" name="rfid_uid" class="form-control form-control-rfid w-100 ps-5" placeholder="Scanning..." autofocus>
                            </div>
                            <button type="submit" class="btn btn-orange btn-lg px-5 rounded-pill shadow">
                                Proses Verifikasi <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>
                        
                        @if(request('rfid_uid'))
                            <div class="alert alert-danger mt-4 bg-transparent border-danger text-danger mx-auto" style="max-width: 400px;">
                                <i class="bi bi-x-circle me-2"></i>Siswa Tidak Ditemukan
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <!-- 2 Column Layout for Borrow/Return -->
            <div class="row">
                <!-- Sisi Kiri: Webcam -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="camera-card">
                        <div class="camera-label">Deteksi Kamera</div>
                        
                        <video id="camera" width="300" autoplay class="mb-4"></video>
                        
                        <canvas id="canvas" width="300" height="200" style="display:none;"></canvas>
                        
                        <img id="hasilFoto" width="300" class="mb-4" style="display:none;">
                        
                        <button type="button" class="btn btn-outline-light btn-sm px-4 rounded-pill" onclick="ambilFoto()">
                            <i class="bi bi-camera me-2"></i>Ambil Foto
                        </button>
                    </div>
                </div>

                <!-- Sisi Kanan: Info & Action -->
                <div class="col-md-6">
                    <div class="info-card h-100">
                        <h6 class="mb-4 text-secondary border-bottom border-secondary pb-2 text-uppercase letter-spacing-1">Data Siswa</h6>
                        
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="data-label">Nama</div>
                                <div class="data-value">{{ $student->nama }}</div>
                            </div>
                            <div class="col-6">
                                <div class="data-label">Kelas</div>
                                <div class="data-value">{{ $student->kelas }}</div>
                            </div>
                        </div>

                        @if($transaction)
                            <div class="mb-4">
                                <span class="badge badge-return px-3 py-2 fs-6 rounded-pill">
                                    <i class="bi bi-arrow-left-right me-1"></i> Proses Pengembalian
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="data-label">Kunci Dipinjam</div>
                                <div class="data-value highlight fs-5">{{ $transaction->keyLab->nama_lab ?? 'Unknown' }}</div>
                            </div>

                            <form method="POST" action="/kembalikan" onsubmit="return validasiFoto(event)">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                <input type="hidden" name="foto" id="fotoInput">
                                
                                <button type="submit" class="btn btn-orange w-100 mt-2">
                                    <i class="bi bi-check2-circle me-2"></i>Konfirmasi Pengembalian
                                </button>
                            </form>
                        @else
                            <div class="mb-4">
                                <span class="badge badge-borrow px-3 py-2 fs-6 rounded-pill">
                                    <i class="bi bi-key me-1"></i> Proses Peminjaman
                                </span>
                            </div>

                            <form method="POST" action="/pinjam" onsubmit="return validasiFoto(event)">
                                @csrf
                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                <input type="hidden" name="foto" id="fotoInput">
                                
                                <div class="mb-4">
                                    <label class="data-label mb-2">Pilih Kunci</label>
                                    <select name="key_lab_id" class="custom-select form-select">
                                        @foreach($keys as $key)
                                            <option value="{{ $key->id }}">{{ $key->nama_lab }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-orange w-100 mt-3">
                                    <i class="bi bi-check2-circle me-2"></i>Konfirmasi Peminjaman
                                </button>
                            </form>
                        @endif
                        
                        <div class="text-center mt-4">
                            <a href="/" class="text-secondary text-decoration-none" style="font-size: 0.85rem;">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        const camera = document.getElementById('camera');

        if(camera) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    camera.srcObject = stream;
                })
                .catch(function(err) {
                    console.error("Camera error:", err);
                });
        }

        function ambilFoto() {
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            
            // Draw image on canvas
            context.drawImage(camera, 0, 0, 300, 200);
            
            // Get base64 string
            const image = canvas.toDataURL('image/png');
            
            // Update UI elements
            const imgEl = document.getElementById('hasilFoto');
            imgEl.src = image;
            imgEl.style.display = 'block';
            camera.style.display = 'none'; // hide video once captured
            
            // Set hidden input
            document.getElementById('fotoInput').value = image;
        }

        function validasiFoto(event) {
            const fotoInput = document.getElementById('fotoInput').value;
            if (fotoInput === "") {
                event.preventDefault(); // Mencegah form dikirim
                alert("Wajib ambil foto terlebih dahulu sebelum mengirim!");
                return false;
            }
            return true;
        }
    </script>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>