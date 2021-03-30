<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientRepository extends Controller
{
    public function __construct(
        private Client $model
    ) {
    }

    public function getNewestClientBy(string $day = null, string $month = null, string $year = null)
    {
        $count_newest_client = $this->model;

        if ($day !== null) {
            return $count_newest_client->whereDay('created_at', $day)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        }

        if ($month !== null) {
            return $count_newest_client->whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->count();
        }

        return $count_newest_client->whereYear('created_at', $year)->count();
    }
}
