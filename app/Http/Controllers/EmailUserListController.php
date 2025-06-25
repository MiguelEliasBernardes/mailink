<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


}
