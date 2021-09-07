<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\stock_market_data;

class editTable extends Controller
{
	public function updateintable(Request $request) {
		$row = $request->input('cellrow');
		$col = $request->input('cellcol');
		$val = $request->input('updatecell');

		DB::update('update stock_market_datas SET '.$col.' = '.$val.' where id='.$row.'');

		echo "Record Updated successfully.<br/>";
		return view('Cellupdated');
		
	}
	public function destroy(Request $request) {
		$row = $request->input('cellrow');
		DB::delete('delete from stock_market_datas where id = ?',[$row]);
		echo "Record deleted successfully.";
		
		return view('deletedrow');
	}
	public function deleterowtable(Request $request) {
      $row = $request->input('cellrow');
      DB::update('update stock_market_datas SET '.$col.' = '.$val.' where id='.$row.'');
      echo "Record inserted successfully.<br/>";
	}
	function viewT(){
	  $data = stock_market_data::paginate(10);
	  $data3 = DB::table('stock_market_datas')->get();
	  $data2 = stock_market_data::all();
	  
	  $a1=array();
		foreach ($data2 as $d1){
		  array_push($a1,$d1['trade_code']);
		}
	  
	  $data2 = array_unique($a1);
      return view('welcome',['data'=>$data, 'tcdata'=>$data2, 'graphdata'=>$data3]);
	}
}
