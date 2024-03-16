<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;

class PresenceRepository extends AbstractDefaultActions implements \App\Repository\PresenceRepository
{

    public function __construct(Presence $model)
    {
        parent::__construct($model);
    }
}
