<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function postMail(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'mail' => 'required|min:5',
                'phone' => 'required|min:7',
                'subject' => 'required|min:5',
                'contentData' => 'required|min:3'
            ],
            [
                'name.required' => 'isim alanı zorunlu!',
                'name.min' => 'isim en az 3 karakter olmalı!',
                'mail.required' => 'e-posta alanı zorunlu!',
                'mail.min' => 'e-posta en az 5 karakter olmalı!',
                'phone.required' => 'telefon alanı zorunlu!',
                'phone.min' => 'telefon en az 7 karakter olmalı!',
                'subject.required' => 'konu alanı zorunlu',
                'subject.min' => 'konu en az 5 karakter olmalı!',
                'contentData.required' => 'Mesaj alanı zorunlu!',
                'contentData.min' => 'Mesaj içeriliği en az 10 karakter olmalı!',
            ]
        );
        try {


            $data = [
                'name' => $request->name,
                'mail' => $request->mail,
                'phone' => $request->phone,
                'contentData' => $request->contentData,
                'subject' => $request->subject
            ];

            $email = "eticaret5@cw-enerji.com";

            Mail::send('frontend.pages.forms.mail-content', $data, function ($message) use ($email) {
                $message->subject('İletişim Bildirimi');
                $message->from('noreply@cw-defence.com', 'Cw Defence');
                $message->to($email);
            });
            return $response = response()->json(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Mail Gönderildi.']);
        } catch (\Exception $e) {
            return $response = response()->json(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Mail Gönderilemedi Hata: ' . $e->getMessage()]);
        }
    }
}
