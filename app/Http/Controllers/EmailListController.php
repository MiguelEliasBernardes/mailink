<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailListRequest;
use App\Models\EmailList;
use App\Models\EmailUserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\UploadedFile;
use function PHPUnit\Framework\isNull;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        if($request->search == null)
        {
            return view(view: 'email-list.index',data: [
                "emailLists" => EmailList::withCount('email_users')->paginate(6),
            ]);
        }

        return view(view: 'email-list.index',data: [
            "emailLists" => EmailList::withCount('email_users')
                            ->where('name', 'like', '%' . $request->search . '%')
                            ->paginate(6),
        ]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
            return view('email-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailListRequest $request)
    {
        $csv = $request->file('csv');

        if($csv){
            $emailList = null;

            $dataCsv = EmailUserListController::csv_formater($csv);

            try {
                DB::transaction(function () use($request, $dataCsv, &$emailList) {

                    $emailList = EmailList::create($request->only(['name', 'csv']) );

                    $emailList->email_users()->createMany($dataCsv);

                });

                return redirect()->route('customer-email.index', ["status" => "success", "message" => "Sucesso ao criar lista", "email_list_id" => $emailList->id]);

            } catch (\Throwable $th) {

                return redirect()->route('customer-email.index', ["status" => "error", "message" => "Erro ao salvar emails"]);
            }

        }

        $emailList = EmailList::create($request->only(['name']));

        return redirect()->route('customer-email.index', ["status" => "success", "message" => "Sucesso ao criar lista", "email_list_id" => $emailList->id]);

    }

    public function destroy(int $id)
    {
        try {
            $list = EmailList::destroy($id);

            return redirect()->route('email-list.index', ["status" => "success", "message" => "Lista deletada com sucesso."]);

        } catch (\Throwable $th) {

            return redirect()->route('email-list.index', ["status" => "error", "message" => "Falha ao deletar lista."]);
        }
    }

}
