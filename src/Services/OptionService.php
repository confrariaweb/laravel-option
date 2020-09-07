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

    /**
     * Aqui formatamos os options para serem salvos na tabela de relacionamento "optiongables"
     * Somente são enviados options que estejam cadastrados no sistema
     * @param array $data
     * @param array $formattedOptions
     * @return array
     */
    /*
    public function formatOptionsForRelationships(array $data, array $formattedOptions = [])
    {
        $options = $this->encodeOptions($data);
        if (isset($options) && is_array($options)) {
            foreach ($options as $option_key => $option_value) {
                $OptionService = $this->findBy('name', $option_key);
                if (isset($OptionService->id)) {
                    $formattedOptions[$OptionService->id]['content'] = is_array($option_value) ? json_encode($option_value) : $option_value;
                }
            }
            return $formattedOptions;
        }
    }
    */
    /**
     * Aqui formatamos os options com a chave(name) e o valor(content) para visualização
     * Aqui retornamos somente options que estejam cadastrados no sistema
     * @param array $data
     * @return array|mixed
     */
    /*
    public function encodeOptions(array $data)
    {
        $formattedOptions = isset($data['options']) && is_array($data['options']) ? $data['options'] : [];
        foreach ($data as $option_key => $option_value) {
            $optionFind = $this->findBy('name', $option_key);
            if ($optionFind) {
                $formattedOptions[$optionFind->name] = $option_value;
            }
        }
        return $formattedOptions;
    }
    */
}
