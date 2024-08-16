<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CsvController extends Controller
{
    public function index() {
        return Inertia::render('UploadCSV');
    }

    private function parseRate($data) {
        $time = date('Y-m-d H:i:s', $data['timestamp']);
        $res = array(['currency_code' => 'GBP', 'balance' => 1, 'date' => $time]);
        foreach($data['quotes'] as $key => $value) {
            $res[] = array('currency_code' => substr($key, 3), 'balance' => $value, 'date' => $time);
        }
        Currency::insert($res);
    }

    public function uploadApi(Request $request) {
        if($request->get('month') != null) {
            $day = date("Y-m-d");
            $date = new Carbon($day);
            for($i = 30; $i >= 0; $i --) {
                $day = $date->subDays(1)->format('Y-m-d');
                $ch = curl_init('https://apilayer.net/api/historical?access_key=1b557473e8cc9b2747c6037df7a993c8&currencies=&source=GBP&format=1&date='.$day);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
                $json = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curlError = curl_error($ch);
                curl_close($ch);
                if ($curlError) {
                    // Handle cURL error
                    return response()->json(['error' => 'cURL Error: ' . $curlError], 500);
                }
                if ($httpCode >= 200 && $httpCode < 300) {
                    // Successful response
                    $exchangeRates = json_decode($json, true);
                    $this->parseRate($exchangeRates);
                } else {
                    // Handle HTTP error
                    return response()->json(['error' => 'HTTP Error: ' . $httpCode, 'response' => $json], $httpCode);
                }
            }
            return response()->json(['success' => true]);
        } else {
            $day = date("Y-m-d");
            // $date = new Carbon($day);
            // $day = $date->subMonth()->format('Y-m-d');
            $ch = curl_init('https://apilayer.net/api/historical?access_key=1b557473e8cc9b2747c6037df7a993c8&currencies=&source=GBP&format=1&date='.$day);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);
            if ($curlError) {
                // Handle cURL error
                return response()->json(['error' => 'cURL Error: ' . $curlError], 500);
            }
            if ($httpCode >= 200 && $httpCode < 300) {
                // Successful response
                $exchangeRates = json_decode($json, true);
                $this->parseRate($exchangeRates);
                return response()->json(['success' => true]);
            } else {
                // Handle HTTP error
                return response()->json(['error' => 'HTTP Error: ' . $httpCode, 'response' => $json], $httpCode);
            }
        }
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
