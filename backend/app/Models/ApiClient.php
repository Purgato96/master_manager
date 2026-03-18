<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiClient extends Model
{
    protected $fillable = ['name', 'email', 'plain_key', 'api_key', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function incrementRequests()
    {
        $this->increment('requests_count');
    }
}
