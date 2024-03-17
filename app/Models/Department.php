<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name',
      'active',
    ];

    protected $casts = [
        'name' => 'string',
        'active' => 'boolean',
    ];

    protected $appends = [
        'redirect'
    ];
    public function getRedirectAttribute() {
        return route('departments.show', [
            'department' => $this->id
        ]);
    }

}
