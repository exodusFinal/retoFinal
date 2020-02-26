<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    public function cerrarSesion(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function contactar()
    {

        $user = User::find(request()->all()['idUsu']);



        $mail = new PHPMailer();
        $mail->isSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML(true);
        $mail->Username = 'final.retodaw@gmail.com';
        $mail->Password = '12345Abcde';
        $mail->SetFrom('final.retodaw@gmail.com');
        $mail->Subject = 'Te han contactado de la empresa';
        $mail->Body = request()->all()['mensaje'];
        $mail->AddAddress($user->email);
        $mail->Send();
        return $user->email;
    }

    public function show()
    {
        //

        $usuario  = Auth::id();
        $users = User::find($usuario);


        return view('perfil',compact('users'));

    }

    public function update(Request $request, $id){

        $usuario = User::find($id);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $adj = $request->file('image');
            $input['imageName'] = $usuario->email . '.' . $adj->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $adj->move($destinationPath, $input['imageName']);
            $usuario->foto = $input['imageName'];
        }
    $usuario->save();

        return redirect()->route('index');
    }
}
