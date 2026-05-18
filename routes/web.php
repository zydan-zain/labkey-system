<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\KeyLab;
use App\Models\Transaction;

Route::get('/', function () {

    $student = null;
    $transaction = null;

    if(request('rfid_uid')) {

        $rfid = trim(
            request('rfid_uid')
        );

        $student = Student::all()->firstWhere(
            'rfid_uid',
            $rfid
        );

        if($student) {

            $transaction = Transaction::query()
                ->where(
                    'student_id',
                    $student->id
                )
                ->where(
                    'status',
                    'dipinjam'
                )
                ->first();

        }

    }

    $keys = KeyLab::all();

    return view('scan', [
        'student' => $student,
        'transaction' => $transaction,
        'keys' => $keys
    ]);

});

Route::post('/pinjam', function(Request $request) {

    $imageName = null;

    if($request->foto) {

        $image = str_replace(
            'data:image/png;base64,',
            '',
            $request->foto
        );

        $image = str_replace(
            ' ',
            '+',
            $image
        );

        $imageName =
            time() . '.png';

        file_put_contents(
            public_path('uploads/') . $imageName,
            base64_decode($image)
        );

    }

    Transaction::create([

        'student_id' =>
            $request->student_id,

        'key_lab_id' =>
            $request->key_lab_id,

        'status' =>
            'dipinjam',

        'foto' =>
            $imageName

    ]);

    return redirect('/');

});

Route::post('/kembalikan', function(Request $request) {

    $transaction = Transaction::find(
        $request->transaction_id
    );

    if($transaction) {

        $transaction->status =
            'dikembalikan';

        $transaction->save();

    }

    return redirect('/');

});

Route::get('/dashboard', function () {

    $transactions =
        Transaction::latest()->get();

    return view(
        'dashboard',
        compact('transactions')
    );

});

Route::get('/students', function () {

    $students = Student::all();

    return view(
        'students',
        compact('students')
    );

});

Route::get('/keys', function () {

    $keys = KeyLab::all();

    return view(
        'keys',
        compact('keys')
    );

});

Route::post('/students/add', function(Request $request){

    $cek = Student::where(
        'rfid_uid',
        $request->rfid_uid
    )->first();

    if($cek){

        return redirect('/students')
            ->with(
                'error',
                'RFID UID sudah digunakan!'
            );

    }

    Student::create([

        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'rfid_uid' => $request->rfid_uid

    ]);

    return redirect('/students');

});

Route::post('/students/delete/{id}', function($id){

    Student::find($id)?->delete();

    return redirect('/students');

});

Route::post('/keys/add', function(Request $request){

    KeyLab::create([

        'nama_lab' => $request->nama_lab

    ]);

    return redirect('/keys');

});

Route::post('/keys/delete/{id}', function($id){

    KeyLab::find($id)?->delete();

    return redirect('/keys');

});