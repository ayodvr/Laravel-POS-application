<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesReport = Sale::orderBy('id','desc')->paginate('10');
       //    dd($salesReport);

        return view('report.sale')->with('saleReport', $salesReport);
    }

    public function getSales(Request $request)
    {
        if ($request->ajax()) {
            $saleReport = Sale::whereBetween('created_at', [ $request->DateCreated.' 00:00:00', $request->EndDate.' 23:59:59'])->get();
            return view('report.listssale')->with('saleReport', $saleReport);
        }
    }

    public function Sale_PDF()
    {
        $sales_pdf = Sale::orderBy('id','desc')->get();
      
        $filename = 'sales_report.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin-left' => 10,
            'margin-left' => 10,
            'margin-left' => 15,
            'margin-left' => 20,
            'margin-left' => 10,
            'margin-left' => 10
        ]);

        $html = \View::make('sales.salesreportPDF')->with('sales_pdf',$sales_pdf);
        $html = $html->render();

        $mpdf->setHeader('xxxx|Sales-Report|{PAGENO}');
        $mpdf->setFooter('Copyright StockBase Inc');
        $stylesheet = file_get_contents(url('css/customer_pdf.css'));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'I');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
