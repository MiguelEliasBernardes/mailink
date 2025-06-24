<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('email-list.index',[
            "emailLists" => EmailList::query()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($createStage): View
    {
        if(!$createStage){
            return view('email-list.create'
            );
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
