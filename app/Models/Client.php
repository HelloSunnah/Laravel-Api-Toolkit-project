<?php

namespace App\Models;

use App\Filters\ClientFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = ClientFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
		'name',
		'abbreviation',
		'description',
		'details',
		'address',
		'website',
		'phone_1',
		'phone_2',
		'mobile',
		'email',
		'logo',
		'status',
    ];


}
