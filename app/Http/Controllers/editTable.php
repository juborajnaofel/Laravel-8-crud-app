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
	}
	public function destroy(Request $request) {
		$row = $request->input('cellrow');
		DB::delete('delete from stock_market_datas where id = ?',[$row]);
		echo "Record deleted successfully.";
	}
	public function deleterowtable(Request $request) {
      $row = $request->input('cellrow');
      DB::update('update stock_market_datas SET '.$col.' = '.$val.' where id='.$row.'');
      echo "Record inserted successfully.<br/>";
	}
	function viewT(){
      //$users = DB::select("SELECT *FROM stock_market_data ORDER BY id LIMIT 10");
	  $data = stock_market_data::paginate(10);
      return view('welcome',['data'=>$data]);
	}
}
