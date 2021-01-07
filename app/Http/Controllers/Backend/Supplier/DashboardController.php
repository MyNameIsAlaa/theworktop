<?php

namespace App\Http\Controllers\Backend\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Quote;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $latest_quotes = Quote::limit(10)->get();

        $quotes_chart = Quote::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as quotes'))
      //  ->where('created_at', '>=', Carbon::today()->subWeek()->toDateTimeString())
        ->groupBy('date')
        ->get();
        return view('backend.supplier.dashboard')->with(['quotes_chart'=>$quotes_chart, 'latest_quotes'=>$latest_quotes]);
    }


    public function Quotes(){
        $quotes = Quote::paginate(15);
        return view('backend.supplier.quotes')->with(['quotes' => $quotes]);
    }

    public function ViewQuote($id){
        $quote = Quote::findorfail($id)->load(array('Materials','Jobs','Catalogs', 'Dimensions', 'User'));
        return view('backend.supplier.quote')->with(['quote'=> $quote]);
    }

}
