<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function listRoles()
    {
        return view('admin.settings.list-roles');
    }
    public function listUsers()
    {
        return view('admin.settings.list-users');
    }
    public function listSources()
    {
        return view('admin.settings.list-sources');
    }
    public function listTypes()
    {
        return view('admin.settings.list-types');
    }
    public function listEmailTemplates()
    {
        return view('admin.settings.list-email-templates');
    }
    public function listWorkflows()
    {
        return view('admin.settings.list-workflows');
    }
//    public function listGroups()
//    {
//        return view('admin.settings.list-groups');
//    }
    public function langSettings()
    {
        return view('admin.settings.site-language');
    }


}
