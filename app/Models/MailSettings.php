<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSettings extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable=["mail_mailer","smtp_mail_host","smtp_mail_port","mail_address","mail_name","mail_password","smtp_encryption","mail_from_address","mail_from_name"];
}
