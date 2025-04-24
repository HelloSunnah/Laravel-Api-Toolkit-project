<?php

namespace App\Models;

use App\Filters\ProjectFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = ProjectFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
		'client_id',
		'name',
		'description',
		'owner_name',
		'start_time',
		'end_time',
		'status',
    ];


}
