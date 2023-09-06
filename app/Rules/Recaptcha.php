<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{
    public function passes($attribute, $value)
    {
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$value");
        $responseKeys = json_decode($response, true);

        return intval($responseKeys["success"]) === 1;
    }

    public function message()
    {
        return 'ReCAPTCHA validation failed.';
    }
}
