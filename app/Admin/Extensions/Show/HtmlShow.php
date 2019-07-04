<?php

namespace App\Admin\Extensions\Show;

use Encore\Admin\Show\AbstractField;

class HtmlShow extends AbstractField
{

    public $border = false;
    public $escape = false;

    public function render($arg = '')
    {
        return "<div class='box-body' style='line-height: 14px;'>".$this->value."</div>";
    }
}