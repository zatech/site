<?php $classes = implode(' ', [ 'form-check-input', $errors->has($name) ? 'is-invalid' : '', ]); ?>

<div class="form-check">
    {{ Form::checkbox($name, 1, $default, array_merge([ 'id' => $name, 'class' => $classes, ], $attributes)) }}
    <label class="form-check-label" for="{{ $name }}">{{ data_get($attributes, 'labelValue', $name) }}</label>
    {{ Form::error($name) }}
</div>
