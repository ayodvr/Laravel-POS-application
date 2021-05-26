<?php

namespace App\Http\Controllers;

use App\User;
use App\Customers;
use App\Product;
use App\Sale;
use App\Supplier;
use App\Receiving;
use App\Expense;
use App\Staffs;
use Carbon;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function index()
    {
        $items = Product::where('type', 1)->count();
        $expenses = Expense::count();
        $customers = Customers::count();
        $suppliers = Supplier::count();
        $receivings = Receiving::count();
        $sales = Sale::count();
        $employees = Staffs::count();
        dd($employees);
        // $incomeexpensechart = $this->incomeExpenseChart();
        return view('adminprofile.dashboard')
            ->with('products', $products)
            ->with('expenses', $expenses)
            ->with('customers', $customers)
            ->with('suppliers', $suppliers)
            ->with('receivings', $receivings)
            ->with('sales', $sales)
            ->with('employees', $employees);
            
            // ->with('incomeexpensechart', $incomeexpensechart);
    }

    // private function getDatesOfWeek()
    // {
    //     $days = array();
    //     $days[] = date("Y-m-d", strtotime('-14 days'));
    //     $days[] = date("Y-m-d", strtotime('-13 days'));
    //     $days[] = date("Y-m-d", strtotime('-12 days'));
    //     $days[] = date("Y-m-d", strtotime('-11 days'));
    //     $days[] = date("Y-m-d", strtotime('-10 days'));
    //     $days[] = date("Y-m-d", strtotime('-9 days'));
    //     $days[] = date("Y-m-d", strtotime('-8 days'));
    //     $days[] = date("Y-m-d", strtotime('-7 days'));
    //     $days[] = date("Y-m-d", strtotime('-6 days'));
    //     $days[] = date("Y-m-d", strtotime('-5 days'));
    //     $days[] = date("Y-m-d", strtotime('-4 days'));
    //     $days[] = date("Y-m-d", strtotime('-3 days'));
    //     $days[] = date("Y-m-d", strtotime('-2 days'));
    //     $days[] = date("Y-m-d", strtotime('-1 days'));
    //     $days[] = date("Y-m-d", strtotime('0 days'));

    //     return $days;
    // }

    // public function getMonthListFromDate(Carbon $start)
    // {
    //     $start = $start->startOfMonth();
    //     $end = Carbon::today()->startOfMonth();
    //     do{
    //         $months[$start->format('m-Y')] = $start->format('F Y');
    //     }while ($start->addMonth() <= $end);
    //         dd($months);
    //         return $months;
    // }

    // public function incomeExpenseChart()
    // {
    //     $monthsOfYear = $this->getMonthListFromDate();
    //     $incomes = Sale::whereBetween('created_at', [ $monthsOfYear[0], $monthsOfYear[11]])->get();
    //     $expenses = Receiving::whereBetween('created_at', [ $monthsOfYear[0], $monthsOfYear[11]])->get();
    //     $chartArray = array();
    //     foreach ($monthsOfYear as $month) {
    //         $monthlyincome = "0";
    //         $monthlyexpense = "0";
    //         $monthlyincome = Sale::whereBetween('created_at', [ $month ])->count();
    //         $monthlyexpense = Receiving::whereBetween('created_at', [ $month ])->count();
    //         $chart = [
    //             'y' => $month,
    //             'a' => $monthlyexpense,
    //             'b'=>$monthlyincome,
    //         ];
    //         $chartArray[] =  $chart;
           
    //     }
    //     return $chartArray;
    // }
}
