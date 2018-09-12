<?php

namespace App\Observers;

use App\Model\Config;

class ConfigObserver
{
    //
    public function created(){
        $this->saveToCache();
    }
    
    public function saved(){
        $this->saveToCache();
    }
    
    public function saveToCache(){
        \Cache::forever('cms_config',Config::pluck('value','name'));
    }
}
