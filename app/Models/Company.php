<?php

namespace App\Models;

use App\Filters\CompanyFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = CompanyFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'abbreviation',
		'description',
		'slogan',
		'details',
		'address',
		'website',
		'phone_1',
		'phone_2',
		'phone_3',
		'mobile',
		'email',
		'status',
    ];


}
