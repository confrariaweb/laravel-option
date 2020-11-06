<?php

namespace ConfrariaWeb\Option\Traits;

trait OptionServiceTrait
{

    /*public function option_decode($options, $obj)
    {
        $objOptions = $obj->options ?? NULL;
        if ($objOptions) {
            foreach ($options as $k => $v) {
                if ($objOptions->has($k) && $options->has($k)) {
                    $v['value'] = $objOptions->get($k);
                    $options->put($k, $v);
                }
            }
        }
        return $options;
    }

    public function option_encode($options, $attributes = [])
    {
        $data = [];
        foreach ($options as $k => $option) {
            if ($this->isUploadableFile($option)) {
                $folder = $attributes['folder'] ?? 'options';
                $option = $this->uploadFile($option, $folder);
            }
            $data[$k] = $option;
        }
        return collect($data);
    }*/
}
