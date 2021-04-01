<?php


namespace App\Domain\Users\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \App\Domain\Users\Models\User
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
