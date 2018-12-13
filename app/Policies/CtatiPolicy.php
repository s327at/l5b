<?php

namespace App\Policies;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use App\Models\Moictati;
use App\User;

class CtatiPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }
}
