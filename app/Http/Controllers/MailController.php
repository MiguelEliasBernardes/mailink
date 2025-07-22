<?php

namespace App\Http\Controllers;

use App\Mail\EmailCampaign;
use App\Models\Campaigns;

use App\Models\Email;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

    public function SendMail($campaign_id){
        $campaign = Campaigns::with(['emailList.email_users', 'template'])->findOrFail($campaign_id);

        try {
            foreach ($campaign->emailList->email_users as $subscriber) {
            Mail::to($subscriber->email)->send(new EmailCampaign(($campaign)));
        }

        return redirect()->route('campaigns.index',[
            'status' => 'success',
            'message' => 'Emails enviados com sucesso'
        ]);


        } catch (\Throwable $th) {

        return redirect()->route('campaigns.index',[
            'status' => 'error',
            'message' => 'Erro ao enviar emails, tente novamente'
        ]);

        }

    }

    public function SendSingleMail(Request $request, $campaign_id)
    {
        $campaign = Campaigns::with(['emailList.email_users', 'template'])->findOrFail($campaign_id);

        try {
            Mail::to($request->emailTest)->send(new EmailCampaign(($campaign)));

            return redirect()->route('campaignDelivery', [$campaign_id]);

        } catch (\Throwable $th) {
            return redirect()->route('campaignDelivery', [$campaign_id]);
        }
    }



}
