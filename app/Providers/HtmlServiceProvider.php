<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Form::component('bsCheckbox', 'form.checkbox', [
            'name',
            'value' => true,
            'default' => false,
            'attributes' => [],
        ]);

        Form::component('bsTextarea', 'form.textarea', [ 'name', 'value' => null, 'attributes' => [], ]);
        Form::component('bsEmail', 'form.email', [ 'name', 'value' => null, 'attributes' => [], ]);
        Form::component('error', 'form.error', [ 'name', ]);
        Form::component('errors', 'form.errors', []);
    }
}
