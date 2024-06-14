<?php

namespace Modules\Retainer\Events;

use Illuminate\Queue\SerializesModels;

class DestroyRetainer
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $retainer;
    public function __construct($retainer)
    {
        $this->retainer = $retainer;
    }
}
