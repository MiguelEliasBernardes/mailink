<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == null){
            return view('templates.index', [
                "templates" => Template::paginate(6)
            ]);
        }

        return view('templates.index', [
            "templates" => Template::where('name', 'like', '%' . $request->search . '%')->paginate(6)
        ]);

    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(TemplateRequest $request)
    {
        try {
            $template = Template::create($request->only('name','content'));
            return redirect()->route('templates.index', ['status' => 'success', 'message' => 'Template cadastrado com sucesso.'] );
        } catch (\Throwable $th) {
            return redirect()->route('templates.index', ['status' => 'error', 'message' => 'Template não cadastrado.'] );
        }


    }

    public function show(int $id)
    {
        try {
            $template = Template::findOrFail($id);

            return view('templates.edit', compact('id','template'));
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Não foi possível localizar o template.']);
        }


    }

    public function update(TemplateRequest $request, int $id)
    {

        try {

            $template = Template::where('id','=', $id)->update($request->only([ 'name','content']));

            return redirect()->route('templates.index', ['status' => 'success', 'message' => 'Template Editado com Sucesso']);
        } catch (\Throwable $th) {
            return redirect()->route('templates.index', ['status' => 'error', 'message' => 'Template não editado.']);
        }



    }

    public function destroy(int $id)
    {
        try {

            $template = Template::destroy($id);

            return redirect()->route('templates.index', ['status' => 'success', 'message' => 'Template deletado com sucesso.']);

        } catch (\Throwable $th) {
            return redirect()->route('templates.index', ['status' => 'error', 'message' => 'Template não deletado.']);
        }

    }



}
