<?php

namespace App\Http\Controllers;

use App\Models\EmailUserList;
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
        $list = $request->query('email_list_id', session('customers-id'));

        $customers = EmailUserList::usersByList($list)->paginate(6);

        return view('email-list.users-email', compact('customers', 'list'));
    }


}
