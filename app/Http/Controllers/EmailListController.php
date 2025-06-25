<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailListRequest;
use App\Models\EmailList;
use App\Models\EmailUserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\UploadedFile;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view(view: 'email-list.index',data: [
            "emailLists" => EmailList::query()->paginate(10),
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

        $dataCsv = EmailUserListController::csv_formater($csv);

        try {
                DB::transaction(function () use($request, $dataCsv) {

                    $emailList = EmailList::create($request->only(['name', 'csv']) );

                    $emailList->email_users()->createMany($dataCsv);

                });

                return redirect()->route('email-list.index', ["status" => "sucess", "message" => "Sucesso ao criar lista", "process" => "created"]);

        } catch (\Throwable $th) {

            return redirect()->route('email-list.index', ["status" => "error", "message" => "Erro ao salvar emails"]);
        }





    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        //
    }
}
