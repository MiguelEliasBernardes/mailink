<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignsRequest;
use App\Models\Campaigns;
use App\Models\EmailList;
use App\Models\Template;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{

    public function index($search = null)
    {
        if($search == null){
            return view('campaigns.index', [
                'campaigns' => Campaigns::paginate(6)
            ]);
        }

        return view('campaigns.index', [
            'campaigns' => Campaigns::where('name', 'like', '%' . $search . '%')
        ]);
    }


    public function create()
    {
        return view('campaigns.create', [
            'templates' => Template::select('id','name')->get()->toArray(),
            'email_lists' => EmailList::select('id','name')->get()->toArray()
        ]);
    }


    public function store(CampaignsRequest $request)
    {

        Campaigns::create($request->only('name','subject','email_list_id','template_id'));

        return view('campaigns.template',['status' => 'success', 'message' => 'Campanha criada com sucesso!', 'templates' => Template::findOrFail($request->template_id) ]);

    }

    public function campaignDelivery(int $id)
    {
        return view('campaigns.delivery',['template_id' => $id]);
    }

}
