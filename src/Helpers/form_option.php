<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

if (!function_exists('form_option')) {
    function form_option($option, $obj, $default = null, $attributes = ['class' => 'form-control'])
    {
        try {
            if(is_array($option)){
                $option = (object) $option;
            }
            $option_type = is_string($option) ? $option : $option->type;
            $option_name = is_string($option) ? $option : $option->name;
            $multiple = !isset($option->multiple) ? false : true;
            $form = 'Form::' . $option_type;
            $name = $attributes['name'] ?? $option_name;
            $name = 'options[' . $name . ']';
            $name = (!$multiple) ? $name : $name . '[]';
            $value = option($obj, $option->name, NULL);
            $list = $option->value ?? [];
            $service = Str::ucfirst($option_type);
            if($multiple){
                $attributes['multiple'] = $multiple;
            }

            if(
                is_object($value) &&
                "Illuminate\Database\Eloquent\Collection" == get_class($value) &&
                in_array(Str::ucfirst($option_type), config('cw_option.models'))
            ){
                $value = $value->pluck('id');
                $list = resolve($service . 'Service')->whereIn('id', $value)->pluck()?? [];
            }

            if (
                'select' == $option_type ||
                in_array(Str::ucfirst($option_type), config('cw_option.models'))
            ) {
                return $form($name, $list, $value, $attributes);
            }

            return $form($name, $value, $attributes);
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error($e->getMessage());
        }
    }
}