<?php

namespace App\Models;

use App\Filters\SubscriptionFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = SubscriptionFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'company_id',
		'subscription_type',
		'subscription_start_date',
		'subscription_end_date',
		'subscriptionStatus',
		'remarks',
		'activeStatus',
    ];

	// public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	// {
	// 	return $this->belongsTo(\App\Models\Company::class);
	// }

}
