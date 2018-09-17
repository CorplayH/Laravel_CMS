<?php

namespace App\Exceptions;

use Exception;

class UploadException extends Exception
{
    public function render ()
    {
        return response ()->json ( [ 'code' => 403 , 'message' => $this->getMessage () ] , 200 );
    }
}
