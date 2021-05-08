<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function profile()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null)
    {
        $results = Permission::where('name', 'LIKE', "%$filter%")
            ->orWhere('description', 'LIKE', "%$filter%")
            ->paginate();
        return $results;
    }
}
