<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailsController extends Controller
{
    public function inbox_mail()
    {
        return view('admin.mails.mailbox');
    }
    public function compose_mail()
    {
        return view('admin.mails.compose');
    }



}
