<?php $classes = implode(' ', [ 'form-control form-control-lg', $errors->has($name) ? 'is-invalid' : '', ]); ?>

<div class="form-group">
    {{ Form::email($name, $value, array_merge([ 'class' => $classes, ], $attributes)) }}
    {{ Form::error($name) }}
</div>
