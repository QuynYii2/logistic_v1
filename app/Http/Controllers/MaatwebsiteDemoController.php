<?php

namespace App\Http\Controllers;
use App\Interfaces\ShipmentInterface;
use App\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPExcel_IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class MaatwebsiteDemoController extends Controller
{
    private $shipment;

    public function __construct(ShipmentInterface $shipment){
        $this->shipment = $shipment;
    }

    public function importExport()
    {
        return view('importExport');
    }


    public function importExcel(Request $request)
    {
        $targetPath = 'uploads/' . $_FILES['import_file']['name'];
        $test1 = $request->file('import_file');
        $path = $test1->store('uploads');
        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadSheet = $Reader->load(storage_path($path));
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        array_shift($spreadSheetAry);
        foreach ($spreadSheetAry as $key => $value) {
            $data[] = [
                'name_reminiscent_take' => $value[0],
                'contact_name_take' => $value[1],
                'phone_take' => $value[2],
                'add_take' => $value[3],
                'name_reminiscent_send' => $value[4],
                'contact_name_send' => $value[5],
                'phone_send' => $value[6],
                'add_send' => $value[7],
                'payment_methods' => $value[8],
                'commodities' => $value[9],
                'quantity' => $value[10],
                'mass' => $value[11],
                'longs' => $value[12],
                'wide' => $value[13],
                'high' => $value[14],
                'value_goods' => $value[15],
                'collection_fee' => $value[16],
                'vehicle' => $value[17],
                'date' => $value[18] ,
                'hours' => $value[19],
                'minute' => $value[20],
                'content_goods' =>$value[21],
                'note' => $value[22],
                'status' => 1
            ];
        }
        $shipment = Shipments::insert($data);
        if($shipment){
            return redirect()->route('shipments.list');
        }
    }

}
