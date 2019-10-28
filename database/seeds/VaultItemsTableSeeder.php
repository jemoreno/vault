<?php

use Illuminate\Database\Seeder;
use App\VaultItems;

class VaultItemsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    $vaultItems = [
      [
        'title'      => 'My First Vault',
        'users_id'   => 1,
        'vault_type' => 'password',
        'data'       => [
          'name'        => '',
          'site'        => '',
          'password'    => '',
          'description' => '',
        ]
      ],
      [
        'title'      => 'My Second Vault',
        'users_id'   => 1,
        'vault_type' => 'credit_card',
        'data'       => [
          'card_number'  => '',
          'name_on_card' => '',
          'card_exp_mm'  => '',
          'card_exp_yy'  => '',
          'card_cvc'     => '',
          'description'  => '',
        ]
      ]
    ];

    foreach($vaultItems as $item){
      VaultItems::create($item);
    }
  }
}
