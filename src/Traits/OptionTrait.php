<?php

namespace ConfrariaWeb\Option\Traits;

trait OptionTrait
{

    public function options()
    {
        return $this->belongsToMany('ConfrariaWeb\Option\Models\Option');
    }

}
