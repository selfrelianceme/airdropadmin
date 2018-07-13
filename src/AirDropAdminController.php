<?php

namespace Selfreliance\AirDropAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users_AirDrop;
class AirDropAdminController extends Controller
{
	public function index(){
		// $shares = Shares::get_list_user_shares_buy();
		// // dd($shares);
		$airdrops = Users_AirDrop::with(['user', 'user.upline'])->paginate(1);
		return view('airdropadmin::table')->with(compact('airdrops'));
	}
}