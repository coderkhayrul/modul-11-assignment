<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $last7Days = date('Y-m-d', strtotime("-7 days"));
        $last30Days = date('Y-m-d', strtotime("-30 days"));
        $thisMonth = date('Y-m-01');
        $lastMonth = date('Y-m-01', strtotime("-1 months"));
        $thisYear = date('Y-01-01');

        // Today Sell Report
        $data['todaySell'] = Sell::whereDate('created_at', $today)->sum('total_price');
        // Yesterday Sell Report
        $data['yesterdaySell'] = Sell::whereDate('created_at', $yesterday)->sum('total_price');
        // Last 7 Days Sell Report
        $data['last7DaysSell'] = Sell::whereDate('created_at', '>=', $last7Days)->sum('total_price');
        // Last 30 Days Sell Report
        $data['last30DaysSell'] = Sell::whereDate('created_at', '>=', $last30Days)->sum('total_price');
        // This Month Sell Report
        $data['thisMonthSell'] = Sell::whereDate('created_at', '>=', $thisMonth)->sum('total_price');
        // Last Month Sell Report
        $data['lastMonthSell'] = Sell::whereDate('created_at', '>=', $lastMonth)->sum('total_price');
        // This Year Sell Report
        $data['thisYearSell'] = Sell::whereDate('created_at', '>=', $thisYear)->sum('total_price');
        // All Time Sell Report
        $data['allTimeSell'] = Sell::sum('total_price');
        return view('home', $data);
    }

    public function salesReport()
    {
        $sales = Sell::with('product')->get();
        return view('sales-report', compact('sales'));
    }
}
