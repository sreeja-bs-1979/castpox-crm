<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\Activity;
use App\Models\ActivityFile;
use Illuminate\Http\Request;
use Response;
use App\Models\Lead;

class ActivityController extends Controller
{
    public function activitiesIndex()
    {
        return view('admin.activities.index');
    }
    public function activitiesStore(Request $request){
       // return Response::json($request);

        $this->validate(request(), [
            'type'          => 'required',
            'comment'       => 'required_if:type,note',
            'schedule_from' => 'required_unless:type,note',
            'schedule_to'   => 'required_unless:type,note',
        ]);
dd('hai');
        //Event::dispatch('activity.create.before');

        $activity = Activity::create([
            'is_done' => $request->type == 'note' ? 1 : 0,
            'user_id' => auth()->guard('user')->user()->id,
          ]+$request->all());

        if ($request->participants) {
            if (is_array($request->participants.users)) {
                foreach ($request->participants.users as $userId) {
                    $activity->participants()->create([
                        'user_id' => $userId
                    ]);
                }
            }

            if (is_array($request->participants.persons)) {
                foreach ($request->participants.persons as $personId) {
                    $activity->participants()->create([
                        'person_id' => $personId,
                    ]);
                }
            }
        }

        if ($request->lead_id) {
            $lead = Lead::find($request->lead_id);
            $lead->activities()->attach($activity->id);
        }

       // Event::dispatch('activity.create.after', $activity);
        $msg = "Created Successfully!";

       return  Response::json($msg);
        //return back();
    }
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        if($request->hasFile('upfile')){
            $fp = FileHelper::save($request->file('upfile'),'uploads/activity-files');
            $file = ActivityFile::create([
                'path' => $fp,
                ]+$request->all());

            if ($leadId = $request->lead_id) {
                $lead = Lead::find($leadId);
                $lead->activities()->attach($file->activity->id);
            }
            $msg = 'File Uploaded Successfully';
        } else {
            $msg = 'File Uploaded Failed. Try again';
        }

        return Response::json($msg);
    }
}
