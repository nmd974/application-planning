<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\User;
use App\Models\Promotion;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MailController extends Controller {

   public function sendMailforStudents() {
        $students = Promotion::where(["archived" => 0, "role" => 1])->get();
        foreach($students as $s){
            $data = ['message' => 'Bonjour, '];
            Mail::to('jha.payet@gmail.com')->send(new Email($data, "student"));
        }
        return back()->with(["messageSuccess" => "Email envoyé !"]);
   }
   public function sendMailByStudent($user_id) {
        $user = User::find($user_id);

        $token = $user->token;
        $data = [
            "token" => $token,
            "message" => "",
            "name" => ucfirst($user->first_name),
        ];
        $data_mail = explode("@", $user->email);
        $data_mail_two = explode(".", $data_mail[1]);
        if($data_mail_two[0] == "example"){
            $mail = "jha.payet@gmail.com";
        }else{
            $mail = $user->email;
        }
        dd($user);
        Mail::to($mail)->send(new Email($data, "student"));
        return back()->with(["messageSuccess" => "Email envoyé avec succès !"]);
   }
   public function sendMailByJury($user_id) {
        $user = User::find($user_id);
        $token = $user->token;
        $data = [
            "token" => $token,
            "message" => "",
            "name" => ucfirst($user->first_name),
        ];
        $data_mail = explode("@", $user->email);
        $data_mail_two = explode(".", $data_mail[1]);
        if($data_mail_two[0] == "example"){
            $mail = "jha.payet@gmail.com";
        }else{
            $mail = $user->email;
        }
        Mail::to($mail)->send(new Email($data, "jury"));
        return back()->with(["messageSuccess" => "Email envoyé avec succès !"]);
   }

}
// <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token)) }} ">
