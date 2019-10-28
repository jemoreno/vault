<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VaultItemsPolicy
{
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct(){
    //
  }
  /**
   * Determine whether the user can view the vault item.
   *
   * @param  \App\Models\Core\User  $user
   * @param  \App\VaultItems        $vault
   * @return mixed
   */
  public function show(User $user, VaultItems $vault){
    return ($vault->users_id == $user->id);
  }
  /**
   * Determine whether the user can update the vault item.
   *
   * @param  \App\Models\Core\User  $user
   * @param  \App\VaultItems        $vault
   * @return mixed
   */
  public function update(User $user, VaultItems $vault){
    return ($vault->users_id == $user->id);
  }
  /**
   * Determine whether the user can destroy the vault item.
   *
   * @param  \App\Models\Core\User  $user
   * @param  \App\VaultItems        $vault
   * @return mixed
   */
  public function destroy(User $user, VaultItems $vault){
    return ($vault->users_id == $user->id);
  }
}
