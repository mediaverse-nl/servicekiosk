<?php

namespace App\Http\Controllers;

class RulesController extends Controller
{
    public static function ContactStore()
    {
        return [
            'Naam' => 'required|min:4',
            'mail' => 'required|email',
            'Bericht' => 'required|min:50'
        ];
    }

    public static function AccountAuthUpdate()
    {
        return [
            'email' => 'required|email',
            'firstname' => 'required|string|min:4',
            'lastname' => 'required|string|min:4',
            'phonenumber' => 'required|digits_between:10,12',
            'adress' => 'required',
            'zipcode' => 'required|max:6',
            'city' => 'required',
            'companyname' => 'required',
            'kvk' => 'required',
            'vatnumber' => 'required'
        ];
    }

    public static function TicketAuthSave()
    {
        return [
            'onderwerp' => 'required|min:3',
            'probleem' => 'required|min:10',
            'prioriteit' => 'required'
        ];
    }

    public static function TicketAuthStore()
    {
        return [
            'antwoord' => 'required',
        ];
    }

    public static function BlogAdminStore()
    {
        return [
            'titel' => 'required',
            'tekst' => 'required|min:10'
        ];
    }

    public static function BlogAdminUpdate()
    {
        return [
            'titel' => 'required',
            'tekst' => 'required|min:10'
        ];
    }

    public static function ClientAdminUpdate()
    {
        return [
            'adress' => 'required|max:120',
            'zipcode' => 'required|min:6|max:6',
            'city' => 'required|max:80',
            'companyname' => 'required',
            'kvk' => 'required|max:30',
            'vatnumber' => 'required|max:30',
        ];
    }

    public static function ProductAdminStore()
    {
        return [
            'name' => 'required|min:4',
            'description' => 'required|min:50',
            'status' => 'required'
        ];
    }

    public static function ProductAdminUpdate()
    {
        return [
            'name' => 'required|min:4',
            'description' => 'required|min:50',
            'status' => 'required'
        ];
    }

    public static function ServiceAdminStore()
    {
        return [
            'name' => 'required|min:4',
            'description' => 'required|min:50'
        ];
    }

    public static function ServiceAdminUpdate()
    {
        return [
            'name' => 'required|min:4',
            'description' => 'required|min:50'
        ];
    }

    public static function TicketAdminStore()
    {
        return [
            'antwoord' => 'required|min:10'
        ];
    }

    public static function SubscriptionAdminStore()
    {
        return [
            'name' => 'required',
            'duration' => 'required|int',
            'price' => 'required|int'
        ];
    }

    public static function SubscriptionAdminUpdate()
    {
        return [
            'name' => 'required',
            'duration' => 'required|int',
            'price' => 'required'
        ];
    }
}
