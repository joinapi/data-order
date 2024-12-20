<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $order_item_type_id
 * @property string $order_item_group_seq_id
 * @property string $from_inventory_item_id
 * @property string $product_id
 * @property string $quote_id
 * @property string $quote_item_seq_id
 * @property string $recurring_freq_uom_id
 * @property string $status_id
 * @property string $sync_status_id
 * @property string $dont_cancel_set_user_login
 * @property string $override_gl_account_id
 * @property string $sales_opportunity_id
 * @property string $change_by_user_login_id
 * @property string $external_id
 * @property string $is_item_group_primary
 * @property string $budget_id
 * @property string $budget_item_seq_id
 * @property string $supplier_product_id
 * @property string $product_feature_id
 * @property string $prod_catalog_id
 * @property string $product_category_id
 * @property string $is_promo
 * @property string $shopping_list_id
 * @property string $shopping_list_item_seq_id
 * @property string $subscription_id
 * @property string $deployment_id
 * @property float $quantity
 * @property float $cancel_quantity
 * @property float $selected_amount
 * @property float $unit_price
 * @property float $unit_list_price
 * @property float $unit_average_cost
 * @property float $unit_recurring_price
 * @property string $is_modified_price
 * @property string $item_description
 * @property string $comments
 * @property string $corresponding_po_id
 * @property string $estimated_ship_date
 * @property string $estimated_delivery_date
 * @property string $auto_cancel_date
 * @property string $dont_cancel_set_date
 * @property string $ship_before_date
 * @property string $ship_after_date
 * @property string $reserve_after_date
 * @property string $cancel_back_order_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLoginByDontCancelSetUserLogin
 * @property InventoryItem $inventoryItemByFromInventoryItemId
 * @property OrderHeader $orderHeader
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property OrderItemType $orderItemType
 * @property Product $product
 * @property Uom $uomByRecurringFreqUomId
 * @property SalesOpportunity $salesOpportunity
 * @property StatusItem $statusItem
 * @property StatusItem $statusItemBySyncStatusId
 * @property UserLogin $userLoginByChangeByUserLoginId
 */
class OrderItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_item';

    /**
     * @var array
     */
    protected $fillable = ['order_item_type_id', 'order_item_group_seq_id', 'from_inventory_item_id', 'product_id', 'quote_id', 'quote_item_seq_id', 'recurring_freq_uom_id', 'status_id', 'sync_status_id', 'dont_cancel_set_user_login', 'override_gl_account_id', 'sales_opportunity_id', 'change_by_user_login_id', 'external_id', 'is_item_group_primary', 'budget_id', 'budget_item_seq_id', 'supplier_product_id', 'product_feature_id', 'prod_catalog_id', 'product_category_id', 'is_promo', 'shopping_list_id', 'shopping_list_item_seq_id', 'subscription_id', 'deployment_id', 'quantity', 'cancel_quantity', 'selected_amount', 'unit_price', 'unit_list_price', 'unit_average_cost', 'unit_recurring_price', 'is_modified_price', 'item_description', 'comments', 'corresponding_po_id', 'estimated_ship_date', 'estimated_delivery_date', 'auto_cancel_date', 'dont_cancel_set_date', 'ship_before_date', 'ship_after_date', 'reserve_after_date', 'cancel_back_order_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByDontCancelSetUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'dont_cancel_set_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItemByFromInventoryItemId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\InventoryItem', 'from_inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderItemType', 'order_item_type_id', 'order_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\Product', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByRecurringFreqUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'recurring_freq_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesOpportunity()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Marketing\SalesOpportunity', 'sales_opportunity_id', 'sales_opportunity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemBySyncStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'sync_status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByChangeByUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'change_by_user_login_id', 'user_login_id');
    }
}
