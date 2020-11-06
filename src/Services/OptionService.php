<?php

namespace ConfrariaWeb\Option\Services;

use ConfrariaWeb\Option\Contracts\OptionContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class OptionService
{
    use ServiceTrait;

    public function __construct(OptionContract $option)
    {
        $this->obj = $option;
    }

    public function prepareData(array $data)
    {
        if (isset($data['value'])) {
            $data['value'] = collect(explode(',', $data['value']));
        }
        return $data;
    }

    public function encode(array $data, $parameters = [], $dataEncode = [])
    {
        foreach ($data as $type => $options) {
            foreach ($options as $k => $v) {
                /*if ('file' == $type) {
                    $dataEncode[$k] = resolve('FileService')->uploadFile($v, $parameters['path'] ?? NULL);
                    continue;
                }*/
                $dataEncode[$k] = $v;
            }
        }
        return $dataEncode;
    }

}
