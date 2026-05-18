<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Student;
use App\Models\KeyLab;
use App\Models\Transaction;
use App\Models\Admin;

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

Route::get('/login', function () {

    return view('login');

});

Route::post('/login', function(Request $request){

    $admin = Admin::where(
        'username',
        $request->username
    )->first();

    if(
        $admin &&
        $admin->password == $request->password
    ){

        Session::put(
            'admin_login',
            true
        );

        return redirect('/dashboard');

    }

    return redirect('/login')
        ->with(
            'error',
            'Username atau Password salah'
        );

});

Route::get('/logout', function(){

    Session::forget(
        'admin_login'
    );

    return redirect('/login');

});

Route::get('/dashboard', function () {

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    $transactions =
        Transaction::latest()->get();

    return view(
        'dashboard',
        compact('transactions')
    );

});

Route::get('/students', function () {

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    $students = Student::all();

    return view(
        'students',
        compact('students')
    );

});

Route::get('/keys', function () {

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    $keys = KeyLab::all();

    return view(
        'keys',
        compact('keys')
    );

});

Route::post('/students/add', function(Request $request){

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

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

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    Student::find($id)?->delete();

    return redirect('/students');

});

Route::post('/keys/add', function(Request $request){

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    KeyLab::create([

        'nama_lab' => $request->nama_lab

    ]);

    return redirect('/keys');

});

Route::post('/keys/delete/{id}', function($id){

    if(!Session::has('admin_login')){

        return redirect('/login');

    }

    KeyLab::find($id)?->delete();

    return redirect('/keys');

});