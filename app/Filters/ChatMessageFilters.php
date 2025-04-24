<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ChatMessageFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
