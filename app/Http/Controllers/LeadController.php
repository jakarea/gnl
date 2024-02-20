<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Customer;
use App\Models\LeadType;
use App\Process\LeadProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Lead\LeadStoreRequest;

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

        $allLeads = $allLeads->paginate(20);
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

        $pageTitle = "Hosting Leads";

        return view('lead/lead',compact('lead_types','leads','pageTitle'));
    }

    public function marketing()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as marketing lead is = 2
        $leadType = 2;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
        ];

        $pageTitle = "Marketing Leads";

        return view('lead/lead',compact('lead_types','leads','pageTitle'));
    }

    public function project()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as project lead is = 3
        $leadType = 3;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
        ];

        $pageTitle = "Project Leads";

        return view('lead/lead',compact('lead_types','leads','pageTitle'));
    }

    public function website()
    {
        // all leads
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();

        // as website lead is = 4
        $leadType = 4;

        $leads = [
            'new_leads'         => Lead::where('state', 'new')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'in_progress_leads' => Lead::where('state', 'in_progress')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'no_ans_leads'      => Lead::where('state', 'no_ans')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'completed_leads'   => Lead::where('state', 'completed')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
            'lost_leads'        => Lead::where('state', 'lost')->where('lead_type_id', $leadType)->orderBy('lead_order')->get(),
        ];

        $pageTitle = "Website Leads";

        return view('lead/lead',compact('lead_types','leads','pageTitle'));
    }

    public function lost(){

        $lostLeads = Lead::orderByDesc('lead_id')->where('state','lost')->paginate(20);
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



    public function leadStateUpdate( Request $request ){

        // dd( $request->all() );
        if( $request->leadId ){
            $lead = Lead::find($request->leadId);
            $oldState = $lead->state;
            $lead->state = $request->newState;
            $lead->save();

            if ($oldState == 'completed' && $request->newState !== 'completed') {

                $existingCustomer = Customer::where('email', $lead->email)->first();
                if ($existingCustomer) {
                    $existingCustomer->lead = -1;
                    $existingCustomer->save();
                }
                $lead->completed = 0;
                $lead->save();

            } else if( $lead->state == 'completed' ){

                $existingCustomer = Customer::where('email', $lead->email)->first();
                if ($existingCustomer) {
                    $existingCustomer->lead = 1;
                    $existingCustomer->save();
                } else {
                    $customer = new Customer;
                    $customer->lead_type_id = $lead->lead_type_id;
                    $customer->service_type_id = null;
                    $customer->name = $lead->name;
                    $customer->designation = $lead->name;
                    $customer->email = $lead->email;
                    $customer->phone = $lead->phone;
                    $customer->status = 'active';
                    $customer->lead = 1;
                    $customer->kvk = $lead->kvk;
                    $customer->company = $lead->company;
                    $customer->website = $lead->website;
                    $customer->details = $lead->note;
                    $customer->save();
                }

                $lead->completed = 1;
                $lead->save();
            }
        }

        if( $request->input('leadOrder') ){
            $leads = $request->input('leadOrder');
            foreach ($leads as $index => $leadId) {
                $lead = Lead::find($leadId);

                if ($lead) {
                    $lead->lead_order = $index + 1;
                    $lead->save();
                }
            }
        }

    }


    // public function leadSortable( Request $request ){
    //     $leads = $request->input('leadOrder');
    //     foreach ($leads as $index => $leadId) {
    //         $lead = Lead::find($leadId);

    //         if ($lead) {
    //             $lead->lead_order = $index + 1;
    //             $lead->save();
    //         }
    //     }
    //     return response()->json(['success' => true]);
    // }



}
