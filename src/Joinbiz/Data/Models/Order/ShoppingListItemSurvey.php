<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shopping_list_id
 * @property string $shopping_list_item_seq_id
 * @property string $survey_response_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShoppingList $shoppingList
 * @property SurveyResponse $surveyResponse
 */
class ShoppingListItemSurvey extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shopping_list_item_survey';

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
    public function surveyResponse()
    {
        return $this->belongsTo('\SurveyResponse', 'survey_response_id', 'survey_response_id');
    }
}
