<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lead\LeadStoreRequest;
use App\Models\Lead;
use App\Models\LeadType;
use App\Process\LeadProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{

    public function allLeads()
    {

        // all leads
        $status = isset($_GET['leadStatus']) ? $_GET['leadStatus'] : '';

        $allLeads = Lead::orderByDesc('lead_id');

        $selectedLead = '';
        if (!empty($status)) {
            $selectedLead = $status;

            if (in_array($status, ['in_progress', 'completed', 'new', 'no_ans', 'lost'])) {
                $allLeads->where('state', $status);
            } else {
                $allLeads->whereIn('state', ['in_progress', 'completed', 'new', 'no_ans', 'lost']);
            }
        }

        $allLeads = $allLeads->paginate(16);
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        return view('lead/common/all',compact('allLeads','lead_types','selectedLead'));
    }

    public function details($lead_id)
    {
        // try {
        //     $lead = Lead::findOrFail($lead_id);
        //     return response()->json($lead);
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
        //     return response()->json(['error' => 'No Lead found!'], 404);
        // }

        if ($lead_id) {
            $lead = Lead::findOrFail($lead_id);

            // return $lead;
            $lead_types = LeadType::orderByDesc('lead_type_id')->get();

            return view('lead/common/edit',compact('lead','lead_types'));

        } else{
            return response()->json(['error' => 'No Lead found!'], 404);
        }

    }

    public function store(LeadStoreRequest $request)
    {
        $data = $request->all();
        if (!LeadType::where('lead_type_id', $data['lead_type_id'])->exists()) {
            return redirect()->back()->with('error','No Leads type found!');
        }

        LeadProcess::create($request);

        return redirect()->back()->with('success','Leads added successfuly!');
    }

    public function update(LeadStoreRequest $request)
    {
        if ($request->lead_id) {
            $lead = Lead::findOrFail($request->lead_id);
        }else{
            return redirect()->back()->with('error','No Leads found!');
        }

        if ($request->has('lead_type_id') && !LeadType::where('lead_type_id', $request->input('lead_type_id'))->exists()) {
            return redirect()->back()->with('error','No Leads type found!');
        }

        $request->except(['avatar']);
        $lead->update($request->validated());

        if ($request->hasFile('avatar')) {
            if ($lead->avatar) {
                Storage::disk('public')->delete($lead->avatar);
            }
            $file = $request->file('avatar');
            $filename = substr(md5(time()), 0 , 10) .'.' . $file->getClientOriginalExtension();
            $avatarPath = $file->storeAs('leads', $filename, 'public');
            $lead->update(['avatar' => 'storage/'.$avatarPath]);
        }

        return redirect()->back()->with('success','Leads updated successfuly!');
    }

    public function hosting()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as hosting lead is = 1
        $leadType = 1;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
        ];

        return view('lead/hosting',compact('lead_types','leads'));
    }

    public function marketing()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as marketing lead is = 2
        $leadType = 2;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->get(),
        ];

        return view('lead/marketing',compact('lead_types','leads'));
    }

    public function project()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as project lead is = 3
        $leadType = 3;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->get(),
        ];

        return view('lead/project',compact('lead_types','leads'));
    }

    public function website()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as website lead is = 4
        $leadType = 4;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->get(),
        ];

        return view('lead/website',compact('lead_types','leads'));
    }

    public function lost(){

         $lostLeads = Lead::orderByDesc('lead_id')->where('state','lost')->paginate(16);
         $lead_types = LeadType::orderByDesc('lead_type_id')->get();

         return view('lead/lost',compact('lostLeads','lead_types'));
    }

    public function destroy($lead_id)
    {
        $lead = Lead::findOrFail($lead_id);

        if ($lead->avatar) {
            Storage::disk('public')->delete($lead->avatar);
        }

        $lead->delete();

        return redirect()->back()->with('success','Leads deleted successfuly!');
    }


    // New lead sortable

    public function newLeadsSortable( Request $request ){

        // dd( $request->all() );

        $leads = $request->input('leadOrder');
        $newState = $request->input('newState');

        foreach ($leads as $index => $leadId) {
            $lead = Lead::find($leadId);

            if ($lead) {
                $lead->lead_order = $index + 1;
                $lead->state = $newState;
                $lead->save();
            }
        }


        return response()->json(['success' => true]);

    }
    // New lead sortable

    public function stateLeadsSortable( Request $request ){

        $stateLeads = $request->input('stateOrder');
        foreach ($stateLeads as $index => $leadId) {
            $lead = Lead::find($leadId);

            if ($lead) {
                $lead->lead_order = $index + 1;
                $lead->save();
            }
        }

        return response()->json(['success' => true]);

    }



}
