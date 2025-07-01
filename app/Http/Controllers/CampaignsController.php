<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
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






}
