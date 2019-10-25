<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VaultItems;
use Auth;

class VaultsController extends Controller {
  public $types;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(){
      $this->middleware('auth');
      $this->types = [
        'password'    => 'password',
        'credit_card' => 'credit card'
      ];
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(){
    $types = $this->types;
    $vaultItems = VaultItems::where('users_id',Auth::id())->get();
    return view('vaults.index',compact('vaultItems','types'));
  }
  /**
   * show the create form
   * @return [type] [description]
   */
  public function create(){
    $types = $this->types;
    return view('vaults.form',compact('types'));
  }
  /**
   * Save a new Vault
   * @return [type] [description]
   */
  public function save(){

  }
  /**
   * Show the vault data in the form
   * @param  VaultItems $vault [description]
   * @return [type]            [description]
   */
  public function show(VaultItems $vault){
    $types = $this->types;
    return view('vaults.form',compact('vault','types'));
  }
  /**
   * Load the ajaxDataForm for the object type
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function ajaxDataForm(Request $request){
    if(isset($request->id))
      $data = VaultItems::find($request->id)->_data();
    else
      $data = $this->defaultDataForm($request->type);
    return view('vaults.types.'.$request->type,compact('data'))->render();
  }
  /**
   * get the Default Data Form if one doesn't exist
   * @param  [string] $type [description]
   * @return [type]       [description]
   */
  public function defaultDataForm($type){
    switch ($type) {
      case 'password':
        return [
          'site'        => '',
          'password'    => '',
          'description' => '',
        ];
        break;
      case 'credit_card':
        return [
          'card_number'  => '',
          'card_type'    => '',
          'card_name'    => '',
          'card_exp_mm'  => '',
          'card_exp_yy'  => '',
          'card_cvc'     => '',
          'description'  => '',
        ];
        break;
      default:
        # code...
        break;
    }
  }
}
