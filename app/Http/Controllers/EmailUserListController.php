<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailUserRequest;
use App\Models\EmailUserList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Storage;

class EmailUserListController extends Controller
{

    public static function csv_formater($file): array
    {
        if(($handle = fopen($file->getRealPath(), 'r')) !== false)
        {
            $head = fgetcsv($handle, 1000, ',');

            $customers = [];

            while (($line = fgetcsv($handle, 1000, ',')) !== false) {
                $datas = array_combine($head, $line);
                $customers[] = $datas;
            }

            fclose($handle);

            return $customers;
        }

        return [
            "error" => "Não foi possível ler o arquivo."
        ];

    }

    public function index(Request $request): View
    {

        $list_id = $request->query('email_list_id', $request->query('list_id'));

        if($request->search == null)
        {
            $customers = EmailUserList::usersByList($list_id)->paginate(6);

            return view('email-customers.users-email', compact('customers', 'list_id'));
        }

        $customers = EmailUserList::customersSearch($request->search, $list_id)->paginate(6);

        return view('email-customers.users-email', compact('customers', 'list_id'));

    }


    public function store(EmailUserRequest $request): RedirectResponse
    {
        try {

            $customer = EmailUserList::query()->create( $request->all());

            return redirect()->route('customer-email.index', ["email_list_id" =>$request['email_list_id'], "message" => "Sucesso ao cadastrar email do cliente", "status" => "success"]);

        } catch (\Throwable $th) {

            return redirect()->route('customer-email.index', ["email_list_id" =>$request['email_list_id'], "message" => "Erro ao cadastrar email do cliente", "status" => "error"]);

        }

    }


    public function show(int $id): JsonResponse
    {

        try {
            $customer = EmailUserList::findOrFail($id);

            return response()->json($customer);
        } catch (\Throwable $th) {

            return response()->json(['status' => 'error','message' => 'Não foi possível localizar o cliente']);

        }



    }

    public function update(EmailUserRequest $request): RedirectResponse
    {
        try {
            $customer = EmailUserList::where('id','=',$request->user_id)->update($request->only(['name','email','email_list_id']));

            return redirect()->route('customer-email.index', ["email_list_id" =>$request['email_list_id'], "message" => "Sucesso ao atualizar cliente", "status" => "success"]);

        } catch (\Throwable $th) {

            return redirect()->route('customer-email.index', ["email_list_id" =>request('email_list_id'), "message" => "erro ao atualizar cliente", "status" => "error"]);

        }



    }

    public function destroy(int $id)
    {
        try {
            $customer = EmailUserList::destroy($id);

            return redirect()->route('customer-email.index', ["email_list_id" =>request('email_list_id'), "message" => "Sucesso ao excluir cliente", "status" => "success"]);

        } catch (\Throwable $th) {
            return redirect()->route('customer-email.index', ["email_list_id" =>request('email_list_id'), "message" => "Erro ao excluir cliente", "status" => "error"]);
        }

    }

}
