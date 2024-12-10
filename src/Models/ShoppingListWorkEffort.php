<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shopping_list_id
 * @property string $work_effort_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShoppingList $shoppingList
 * @property WorkEffort $workEffort
 */
class ShoppingListWorkEffort extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shopping_list_work_effort';

    /**
     * @var array
     */
    protected $fillable = ['last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingList()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShoppingList', 'shopping_list_id', 'shopping_list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffort()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\WorkEffort', 'work_effort_id', 'work_effort_id');
    }
}
