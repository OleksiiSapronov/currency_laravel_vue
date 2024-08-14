<?php

namespace App\Http\Controllers;

use App\Models\Country;
use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CsvController extends Controller
{
    public function index() {
        return Inertia::render('UploadCSV');
    }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        // Handle the uploaded file
        $file = $request->file('csv_file');
        $path = $file->store('csv_files');

        // Process the CSV file
        $this->parseCsv(storage_path('app/' . $path));

        return redirect()->back()->with('success', 'CSV file processed successfully!');
    }

    private function parseCsv($filePath)
    {
        if (($handle = fopen($filePath, 'r')) !== false) {
            $rows = array();
            while (($data = fgetcsv($handle)) !== false) {
                $row = array();
                if(count($data) == 4) {
                    $row['code'] = substr($data[0], 3);
                    $dataString = $data[2] . ',' . $data[3];
                    $date = DateTime::createFromFormat('m/d/Y,H:i:s', $dataString);
                    $row['date'] = $date->format('Y-m-d H:i:s');
                    $row['value'] = $data[1];
                    $rows[] = $row;
                    Country::where('currency_code', $row['code'])->update([
                        'value' => $row['value'],
                        'date' => $row['date']
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
