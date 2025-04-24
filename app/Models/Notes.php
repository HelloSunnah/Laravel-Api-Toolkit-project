<?php

namespace App\Models;

use App\Filters\NotesFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Notes extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = NotesFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $primaryKey = 'note_id';

    protected $fillable = [
		'meeting_id',
		'user_id',
		'content',
		'company_id',
    ];

	public function meeting(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Meeting::class);
	}

}
