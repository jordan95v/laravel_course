<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "user_id",
        "company",
        "company_email",
        "tags",
        "description",
        "image",
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        if ($filters["tags"] ?? false) {
            $filter = request('tags');
            return $query->where("tags", "like", "%$filter%");
        }
        if ($filters["search"] ?? false) {
            $filter = request('search');
            return $query->where("title", "like", "%$filter%")
                ->orWhere("tags", "like", "%$filter%")
                ->orWhere("description", "like", "%$filter%");
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
