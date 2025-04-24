<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AgendaFilters extends QueryFilters
{
    protected array $allowedFilters = ['meeting_id'];

    protected array $columnSearch = [];
}
