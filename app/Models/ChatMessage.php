<?php

namespace App\Models;

use App\Filters\ChatMessageFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ChatMessage extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = ChatMessageFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id',
		'receiver_id',
		'content',
		'attachment',
    ];


}
