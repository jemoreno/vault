<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register(){
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot(){
    //Label
    Form::component('bsLabel','components.form.label',['name','labelOverride'=>null,'attributes'=>[]]);
    //Text
    Form::component('bsText','components.form.text',['name','value'=>null,'attributes'=>[],'labelOverride'=>null,'help'=>null]);
    Form::component('bsPassword','components.form.password',['name','value'=>null,'attributes'=>[],'labelOverride'=>null,'help'=>null]);
    //Number
    Form::component('bsNumber','components.form.number',['name','value'=>null,'attributes'=>[],'labelOverride'=>null,'help'=>null]);
    //File
    Form::component('bsFile','components.form.file',['name','inputLabel'=>null,'labelOverride'=>null,'attributes'=>[],'help'=>null]);
    //TextArea
    Form::component('bsTextArea','components.form.textArea',['name','value'=>null,'attributes'=>[],'labelOverride'=>null,'help'=>null]);

    //Radio
    Form::component('bsRadioGroup','components.form.radioGroup',['name','options'=>[],'checked'=>false,'attributes'=>[],'labelOverride'=>null,'help'=>null]);
    Form::component('bsRadio','components.form.radio',['name','value'=>null,'checked'=>false,'attributes'=>[],'labelOverride'=>null,'help'=>null]);
    //Select
    Form::component('bsSelect','components.form.select',['name','options'=>[],'default'=>null,'attributes'=>[],'labelOverride'=>null,'help'=>null,'skipGroup'=>false]);

    // range
    Form::component('bsRange', 'components.form.range', ['name', 'value' => null, 'min', 'max', 'step', 'attributes' => [], 'labelOverride' => null, 'useValueLabel' => false]);
    //Buttons
    Form::component('bsSubmit','components.form.submit',['value','attributes'=>[]]);
    Form::component('bsButton','components.form.button',['value','attributes'=>[],'help'=>null]);
    Form::component('bsDropdownButton','components.form.dropdownButton',['value','attributes'=>[],'links'=>[]]);
  }
}
