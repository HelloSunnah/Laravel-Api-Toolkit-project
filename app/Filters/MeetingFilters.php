<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class MeetingFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
