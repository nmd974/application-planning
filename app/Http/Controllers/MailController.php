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
        // $renderer = new \BaconQrCode\Renderer\Image\Png();
        // $renderer->setHeight(256);
        // $renderer->setWidth(256);
        // $writer = new \BaconQrCode\Writer($renderer);
        // $writer->writeFile('Hello World!', 'qrcode.png');
        $qr_code = QrCode::size(300)->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token);
        $data = [
            "token" => $token,
            "qr_code" => base64_encode($qr_code)
        ];
        // dd($data);
        Mail::to('jha.payet@gmail.com')->send(new Email($data, "student"));
        return back();
   }

}
