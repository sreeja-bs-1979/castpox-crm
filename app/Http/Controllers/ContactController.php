<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Person;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function person_contact()
    {
        $persons = Person::with('organization')->get();
        return view('admin.contacts.persons-contact',compact('persons'));
    }

    public function editPerson(Person $person)
    {
        return view('admin.contacts.edit-person',compact('person'));
    }
    public function updatePerson(Request $request, Person $person)
    {
        $person ->update($request->all());
        toastr()->success('Updated Successfully');
        return back();
    }
    public function deletePerson(Person $person)
    {
        $person ->delete();
        toastr()->success('Deleted Successfully');
        return back();
    }

    public function organizations_contact()
    {
        $organizations = Organization::all();
        return view('admin.contacts.organizations-contact',compact('organizations'));
    }

    public function createOrganization()
    {
        return view('admin.contacts.add-organizations');
    }
    public function storeOrganization(Request $request)
    {
        $org = Organization::create($request->all());
        toastr()->success('Created Successfully');
        return back();
    }
    public function editOrganization(Organization $organization)
    {
        return view('admin.contacts.add-organization',compact('organization'));
    }
    public function updateOrganization(Request $request, Organization $organization)
    {
        $organization ->update($request->all());
        toastr()->success('Updated Successfully');
        return back();
    }
    public function deleteOrganization(Organization $organization)
    {
        $organization ->delete();
        toastr()->success('Deleted Successfully');
        return back();
    }



}
