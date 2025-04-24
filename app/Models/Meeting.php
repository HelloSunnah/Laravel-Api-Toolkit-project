<?php

namespace App\Models;

use App\Filters\MeetingFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meeting extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = MeetingFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'host',
        'date',
        'start_time',
        'end_time',
        'timezone',
        'company_id',
        'client_id',
        'project_id',
        'location_id',
        'status',
        'meeting_status',
        'meeting_type'
    ];

    public function attachments()
    {
        return $this->hasMany(MeetingAttachment::class);
    }

    public function participants()
    {
        return $this->hasMany(MeetingParticipant::class);
    }
}
