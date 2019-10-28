<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    if(User::count()==0){ // only create a user if one is not defined
      User::create([
        'name'     => 'Demo Account',
        'email'    => 'demo@vault.com',
        'password' => bcrypt('Vault19'),
      ]);
      $this->call(VaultItemsTableSeeder::class);
    }
  }
}
