<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VaultItems;
use Auth;
use Log;

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
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function save(Request $request){
     $this->validate(request(),[
      'title'      => 'required',
      'vault_type' => 'required'
    ],[
      'title.required'      => 'We need a title so you know what this item is called.',
      'vault_type.requried' => 'We have to know what type of item we are storing'
    ]);
    $data = $request->only(array_keys($this->defaultDataForm($request->vault_type)));
    VaultItems::create([
      'title'      => $request->title,
      'vault_type' => $request->vault_type,
      'users_id'   => Auth::id(),
      'data'       => $data
    ]);
    return redirect()->route('vaults.index')->with(['success'=>'your data has been upated']);
  }
  /**
   * Show the vault data in the form
   * @param  VaultItems $vault [description]
   * @return [type]            [description]
   */
  public function show(VaultItems $vault){
    $this->authorize('show',$vault);
    $types = $this->types;
    return view('vaults.form',compact('vault','types'));
  }
  /**
   * Update the vault data from the form
   * @param  VaultItems $vault [description]
   * @return [type]            [description]
   */
  public function update(Request $request, VaultItems $vault){
    $this->authorize('update',$vault);
    $this->validate(request(),[
      'title'      => 'required',
      'vault_type' => 'required'
    ],[
      'title.required'      => 'We need a title so you know what this item is called.',
      'vault_type.requried' => 'We have to know what type of item we are storing'
    ]);
    $data = $request->only(array_keys($this->defaultDataForm($request->vault_type)));
    $vault->update([
      'title'      => $request->title,
      'vault_type' => $request->vault_type,
      'data'       => $data
    ]);
    return redirect()->back()->with(['success'=>'your data has been upated']);
  }
  public function destroy(VaultItems $vault){
    $this->authorize('destroy',$vault);
    $vault->delete();
    return redirect()->route('vaults.index')->with(['success'=>'your item has been removed.']);
  }
  /**
   * Load the ajaxDataForm for the object type
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function ajaxDataForm(Request $request){
    if(isset($request->id))
      $data = array_merge($this->defaultDataForm($request->type),VaultItems::find($request->id)->_data());
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
          'name'        => '',
          'site'        => '',
          'password'    => '',
          'description' => '',
        ];
        break;
      case 'credit_card':
        return [
          'card_number'  => '',
          'name_on_card' => '',
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
