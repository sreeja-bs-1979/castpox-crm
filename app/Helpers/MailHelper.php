<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class MailHelper{
    public static function sendInvoice($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->email,$receiver->seller->email,$receiver->agent->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        $names=[$receiver->name,'Opasco'];
        Mail::send('mail.invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Property enquiry confirmation');
        });
    }

    public static function sendInvoiceToSeller($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->seller->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }
    public static function sendInvoiceToAgent($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->agent->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }
    public static function paidservicesubscriptoninvoice($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.unpaid_service_subscription_invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }
    public static function unpaidservicesubscriptoninvoice($receiver, $msg,$plan_name,$city){
        //dd($receiver);
        $data = ['msg' => $msg,
            'receiver' => $receiver,
            'plan_name' => $plan_name,
            'city' => $city];
        $emails=[$receiver->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.unpaid_service_subscription_invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }

    public static function paidsellersubscriptoninvoice($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.unpaid_service_subscription_invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }
    public static function unpaidsellersubscriptoninvoice($receiver, $msg,$plan_name,$city){
        $data = ['msg' => $msg,
            'receiver' => $receiver,
            'plan_name' => $plan_name,
            'city' => $city];
        $emails=[$receiver->email,'sreeja.bs@gmail.com','sales@opasco.com'];
        Mail::send('mail.unpaid_service_subscription_invoice', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Invoice');
        });
    }
    public static function welcome($receiver, $msg){
        $data = ['msg' => $msg];
        // dd($receiver);
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.welcome', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Welcome');
        });
    }
    public static function verify($receiver, $msg)
    {
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.verify', $data, function ($message) use ($emails) {
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Verify your email id');
        });
    }
    public static function verifySeller($receiver, $msg)
    {
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.verifyseller', $data, function ($message) use ($emails) {
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Verify your email id');
        });
    }
    public static function verifyService($receiver, $msg)
    {
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.verifyService', $data, function ($message) use ($emails) {
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Verify your email id');
        });
    }
    public static function newRegistration($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.notify', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Registration notification');
        });
    }
    public static function notify($receiver, $msg){
        $data = ['msg' => $msg];
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.notifyagent', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Registration notification');
        });
    }
    public static function resetPasswordLink($receiver, $msg)
    {
        $data = ['msg' => $msg];
        $emails=[$receiver,'sreeja.bs@gmail.com'];
        Mail::send('mail.reset-pass-link', $data, function ($message) use ($emails) {
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Reset your password');
        });
    }
    public static function sendListing($receiver, $msg)
    {
        $data = ['msg' => $msg];
        //dd($receiver);
        $emails=[$receiver['email'],'sreeja.bs@gmail.com'];
        Mail::send('mail.list-project-service', $data, function ($message) use ($emails) {
            $message->from($emails);
            $message->to('sales@opasco.com', 'Opasco')
                ->subject('Project service listing request');
        });
    }
    public static function agentcreated($receiver, $msg){
        $data = ['msg' => $msg];
        // dd($receiver->email);
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.property-agent', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Welcome');
        });
    }  //used to send login details for property agents and property admins created by main company registred admin
    public static function forwardEmail($msg,$msges,$receiver){
        $data = ['msg' => $msg,
            '$msges' => $msges];
        // dd($receiver);
        $emails=[$receiver['agent_mail'],$receiver['seller_mail'],'sreeja.bs@gmail.com'];
        Mail::send('mail.forward-email', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Forwarding Enquiry');
        });
    }
    public static function forwardServiceEnquiry($msg,$msges,$receiver){
        $data = ['msg' => $msg,
            '$msges' => $msges];
        // dd($receiver);
        $emails=[$receiver['service_mail'], 'sreeja.bs@gmail.com'];
        Mail::send('mail.forward-service-email', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Forwarding Enquiry');
        });
    }
    public static function laningPageContact($msg,$receiver){
        $data = ['msg' => $msg];
        // dd($receiver->email);
        $emails=[$receiver->email,'sreeja.bs@gmail.com'];
        Mail::send('mail.landing_contact', $data, function ($message) use ($emails){
            $message->from('support@opasco.com', 'Opasco');
            $message->to($emails)
                ->subject('Message from Customer');
        });
        if (Mail::failures()) {
            return 0;
        }else{
            return 1;
        }
    }


}
