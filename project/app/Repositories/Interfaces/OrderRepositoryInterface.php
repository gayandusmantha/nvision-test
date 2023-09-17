<?php

namespace App\Repositories\Interfaces;
Interface OrderRepositoryInterface{
    public function storeOrder($data);

    public function submitRemoteServer($data);

}
