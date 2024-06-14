<?php

namespace Modules\Retainer\Events;

use Illuminate\Queue\SerializesModels;

class CreateRetainer
{
    use SerializesModels;

    public $request;
    public $retainer;

    public function __construct($request ,$retainer)
    {
        $this->request = $request;
        $this->retainer = $retainer;
    }
}
