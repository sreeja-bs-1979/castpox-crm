<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\LeadService;
use App\Models\LeadSource;
use App\Models\LeadType;
use App\Models\Organization;
use App\Models\Person;
use App\Models\Lead;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class LeadsController extends Controller
{
    public function getDashboardLeads(){
          $leads = Lead::all();
        return view('admin.leads.index',compact('leads'));
    }
    public function createLeads(){
        $sources = LeadSource::all();
        $types = LeadType::all();
        $users = User::where('status','!=',0)->where('role_id','!=',0)->get();
        $services = Service::all();
        return view('admin.leads.add-lead',compact('sources','types','users','services'));
    }
    public function storeLeads(Request $request)
    {
        if (isset($request->organization_name)) {
            $org = Organization::create([
                    'name' => $request->organization_name,
                ]+$request->all());
        }else {
            toastr()->error('No organization found');
            return back();
        }
        if (isset($request->person_name)) {
            $person = Person::create([
                    'name' => $request->person_name,
                    'emails' => $request->person_mail,
                    'contact_numbers' => $request->person_number,
                    'organization_id' => $org->id,        //$request->person_organization,
                ] + $request->all());
        } else {
            toastr()->error('No contact person found');
            return back();
        }
        if (isset($request->status_follow)){
            $status_follow = implode(',', $request->status_follow);
        }else{
            $status_follow = 'not given';
        }
        $lead = Lead::create([
            'lost_reason' => $status_follow,
            'lead_source_id' => $request->source,
            'lead_type_id' => $request->type,
            'user_id' =>  $request->sales_owner,
            'person_id'        => $person->id,
            'lead_pipeline_id' => 1,
            'lead_stage_id'    => $data['lead_stage_id'] ?? 1,
            ]+$request->all());

        if (isset($request->service_id)) {
           foreach($request->service_id as $services) {
               $leadservice = LeadService::create([
                       'lead_id' => $lead->id,
                       'amount' => 0,
                       'price' => 0,
                       'quantity' => 0,
                       'service_id' => (int)$services,
                   ] + $request->all());
           }
        }
        toastr()->success('Lead Created Successfully');
        return back();
    }
    public function editLeads(Lead $lead){
        return view('admin.leads.add-lead',compact('lead'));
    }
    public function updateLeads(Request $request, Lead $lead){
        $person = Person::where('id',$lead->person_id);
            $person -> update([
                    'name' => $request->person_name,
                    'emails' => person_mail,
                    'contact_numbers' => person_number,
                    'organization_id' => person_organization,
                ] + $request->all());
            $org = Organization::where('id',$person->organization_id)->get();
            $org->update([
                    'name' => $request->organization_name,
                ]+$request->all());

        if (isset($request->closed_at) && ! $request->closed_at) {
            $request->closed_at = Carbon::now();
        }
        $lead->update($request->all());
        if (isset($request->service_id)) {
            $services = implode(',', $request->service_id);
            $leadservice = LeadService::update([
                    'service_id' => $services,
                ]+ $request->all());
        }
        return back();
    }
//    public function deleteLeads(Lead $lead){
//        return back();
//    }

    public function changeLeadsStage(Request $request){

        $lead = Lead::find($request->lead_id);
        $lead->update([
            'lead_stage_id' => $request->stage,
        ]);
        $msg = "Lead Status changed Successfully!";
        return Response::json($msg);
    }

    public function viewLeadDetail($id)
    {
        $lead = Lead::with('user')->with('person')->with('type')->with('source')->with('pipeline')->with('stage')->with('activities')->with('tags')->with('services')->where('id',$id)->first();
       //dd($lead);
       return view('admin.leads.lead-details',compact('lead'));
    }
    public function createLeadsbyCategory($id)
    {
            //
    }

    public function notesStore(Request $request)
    {
        $activity = Activity::create([
                'is_done' => 1,
                'user_id' => auth()->user()->id,
            ]+$request->all());
        if ($request->lead_id) {
            $lead = Lead::find($request->lead_id);
            $lead->activities()->attach($activity->id);
        }
        $msg = "Created Successfully!";

        return  Response::json($msg);

    }
    public function activitiesStore(Request $request){
         $this->validate(request(), [
            'type'          => 'required',
            'comment'       => 'required_if:type,note',
            'schedule_from' => 'required_unless:type,note',
            'schedule_to'   => 'required_unless:type,note',
        ]);
         $activity = Activity::create([
                'is_done' => 0,
                'user_id' => auth()->user()->id,
            ]+$request->all());

//        if ($request->participants) {
//            if (is_array($request->participants.users)) {
//                foreach ($request->participants.users as $userId) {
//                    $activity->participants()->create([
//                        'user_id' => $userId
//                    ]);
//                }
//            }
//
//            if (is_array($request->participants.persons)) {
//                foreach ($request->participants.persons as $personId) {
//                    $activity->participants()->create([
//                        'person_id' => $personId,
//                    ]);
//                }
//            }
//        }

        if ($request->lead_id) {
            $lead = Lead::find($request->lead_id);
            $lead->activities()->attach($activity->id);
        }
        $msg = "Created Successfully!";

        return  Response::json($msg);
        //return back();
    }



}
