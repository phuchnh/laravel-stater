<?php


namespace Domain\Users\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \Domain\Users\Models\User
 */
class UserQueryBuilder extends Builder
{
    /**
     * @return self
     */
    public function wherePaid()
    {
        return $this->where('status', Paid::class);
    }
}
