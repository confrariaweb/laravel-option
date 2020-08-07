{{ Form::select2(
    $name,
    $list?? [],
    $value?? [],
    $attributes?? ['class' => 'form-control'],
    ['server_side' => ['route' => $route?? 'api.tasks.types.select2']]
) }}