{{
    Form::label(
        $name,
        data_get(
            $attributes,
            'labelValue',
            sprintf('%s%s', ucwords($name), data_get($attributes, 'required') ? ' *' : '')
        )
    )
}}
