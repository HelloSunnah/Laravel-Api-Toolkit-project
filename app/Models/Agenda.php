<?php

namespace App\Models;

use App\Filters\AgendaFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = AgendaFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    
    protected $primaryKey = 'agenda_id';
    
    protected $fillable = [
		'meeting_id',
		'title',
		'description',
		'company_id',
    ];

	public function meeting(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Meeting::class);
	}

}
