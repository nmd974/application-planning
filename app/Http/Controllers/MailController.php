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
            "message" => ""
        ];
        Mail::to('jha.payet@gmail.com')->send(new Email($data, "student"));
        return back();
   }

}
// <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token)) }} ">
