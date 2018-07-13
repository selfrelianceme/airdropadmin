<?php

namespace Selfreliance\AirDropAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users_AirDrop;
use Shares;
class AirDropAdminController extends Controller
{
	public function index(){
		$airdrops = Users_AirDrop::with(['user', 'user.upline'])->orderBy('status', 'asc')->paginate(20);
		return view('airdropadmin::table')->with(compact('airdrops'));
	}

	public function confirm($id){
		$find = Users_AirDrop::where('id', $id)->where('status', 0)->firstOrFail();
		Shares::addShares([
			'share_id'        => 1,
			'user_id'         => $find->user_id,
			'price_per_share' => 0,
			'stake_size'      => 10,
			'defrosted_at'    => Shares::get_defrost_next()
		]);
		$find->status = 1;
		$find->save();
		\Session::flash('success','Токены успешно зачислены пользователю ID AirDrop: '.$id);
        return redirect()->back();
	}

	public function cancel_app($id){
		$find = Users_AirDrop::where('id', $id)->firstOrFail();
		return view('airdropadmin::create')->with(compact('find'));
	}

	public function do_cancel_app(Request $request){
		$find = Users_AirDrop::where('id', $request->input('app_id'))->firstOrFail();
		$find->message_from_admin = $request['message_cancel_admin'];
		$find->status = 2;
		if($request->input('resend_app') != null){
			$find->status = 3;
		}
		$find->save();
		\Session::flash('success', 'Сообщение успешно отправлено: '.$request['app_id']);
        return redirect()->route('AirDropAdmin');
	}

	public function destroy($id){
		$find = Users_AirDrop::where('id', $id)->where('status', 0)->firstOrFail();
		$find->delete();
		\Session::flash('success','Заявка удалена ID AirDrop: '.$id);
        return redirect()->back();
	}
}