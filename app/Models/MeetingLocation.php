<?php

namespace App\Models;

use App\Filters\MeetingLocationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MeetingLocation extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = MeetingLocationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
		'name',
		'description',
		'total_seat',
		'serial',
		'status',
    ];


}
