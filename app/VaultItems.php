<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Str;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;


class VaultItems extends Model {
  use UsesUuid,SoftDeletes;
  protected $guarded          = ['id'];
  public $__data              = [];
  private $decrypted          = false;

  public static function boot(){
    parent::boot();

    self::saving(function($model){
      if(! empty($model->__data))
        $obj = $model->__data;
      else
        $obj = $model->data;

      if(! is_array($obj)) return;
      $keys = array_keys($obj);
      shuffle($keys);
      foreach($keys as $key)
          $new[$key] = $obj[$key];

      $obj = $new;
      $new = [];
      foreach($obj as $k => $v)
        $new[encrypt($k)] = encrypt($v);

      $model->data = encrypt(json_encode($new));
    });
  }
  /**
   * Pull a key from the data
   * @param  [string] $key   [the key we're looking for in the json]
   * @param  [string] $value [the value we're looking to set it to]
   * @return [array]         [the decrypted data object]
   */
  public function _data($key = null, $value = null){

    // Find our matching key...
    if(! $this->decrypted){
      $this->unpackData();
    }

    if($key == null)
      return $this->__data;

    if(in_array($key,$this->__data)){
      if($value == null)
        return $this->__data[$key];
    }else{
      if($value == null)
        return null;
    }
    $this->__data[$key] = $value;
    $this->setData($this->__data);
  }
  /**
   * sets the data from an array
   * @param array $data [the data you're saving]
   */
  public function setData($data = []){
    $this->__data = $data;
  }
  /**
   * unpack the encrypted array
   */
  public function unpackData(){
    $this->__data = []; // Make sure we're working with a clear canvas

    // Try to decrypt the block of data
    try {
      $data = decrypt($this->data);
    }catch(DecryptException $e){
      $this->decrypted = true;
      return;
    }
    // de-jsonify
    $data = json_decode($data, true);
    // Did we unpack a valid array?
    if(! is_array($data)){
      $this->decrypted = true;
      return;
    }

    // Iterate through our encrypted array
    foreach($data as $k => $v){
      try {
        $this->__data[decrypt($k)] = decrypt($v);
      }catch(DecryptException $e){
        $this->decrypted = true;
        return;
      }
    }
    $this->decrypted = true;
  }
}
