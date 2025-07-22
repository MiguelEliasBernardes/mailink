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

        $campaign = Campaigns::create($request->only('name','subject','email_list_id','template_id'));

        return view('campaigns.template',
        ['status' => 'success',
        'message' => 'Campanha criada com sucesso!',
        'templates' => Template::findOrFail($request->template_id),
        'campaign_id' => $campaign->id
    ]);

    }

    public function campaignDelivery(int $id)
    {
        $campaign = Campaigns::with('emailList.email_users')->findOrFail($id);

        return view('campaigns.delivery',['campaign_id' => $id,
        'campaign' => $campaign
    ]);
    }

    public function update(CampaignsRequest $request, int $id)
    {

        try {

            $campaign = Campaigns::where('id','=', $id)->update($request->only([ 'name','subject','email_list_id','template_id']));

            return redirect()->route('campaigns.index', ['status' => 'success', 'message' => 'Campanha Editada com Sucesso']);
        } catch (\Throwable $th) {
            return redirect()->route('campaigns.index', ['status' => 'error', 'message' => 'Campanha não editada.']);
        }
    }



    public function edit(int $id)
    {
        try {
            $campaign = Campaigns::findOrFail($id);

            return view('campaigns.edit', [
            'campaign' => $campaign,
            'templates' => Template::select('id','name')->get()->toArray(),
            'email_lists' => EmailList::select('id','name')->get()->toArray()
        ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Não foi possível localizar a campanha.']);
        }
    }

    public function destroy(int $id)
    {
        try {

            $campaign = Template::destroy($id);

            return redirect()->route('campaigns.index', ['status' => 'success', 'message' => 'Campanha deletada com sucesso.']);

        } catch (\Throwable $th) {
            return redirect()->route('campaigns.index', ['status' => 'error', 'message' => 'Campanha não deletada.']);
        }

    }


}
