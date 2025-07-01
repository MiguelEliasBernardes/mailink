<?php

namespace App\Http\Controllers;

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


    public function store(int $id)
    {

    }



}
