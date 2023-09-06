<?php

namespace App\Http\Controllers\MailSettings;

use App\Http\Controllers\Controller;
use App\Models\MailSettings;
use Illuminate\Http\Request;

class MailSettingsController extends Controller
{
    public function getMailSettingEdit($id)
    {
        $mailsettings = MailSettings::find($id);
        return view('backend.mailsettings.mail-setting-edit')->with('mailsettings', $mailsettings);
    }

    public function postMailSettingEdit(Request $request, $id)
    {
        try {
            MailSettings::find($id)->update([
                'smtp_mail_host' =>  $request->host,
                'smtp_mail_port' => $request->port,
                'smtp_encryption' => $request->secure,
                'mail_address' => $request->address,
                'mail_password' => $request->password
            ]);

            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Mail Ayarları Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Mail Ayarları Güncellenemedi ' . $e]);
        }
    }
}
