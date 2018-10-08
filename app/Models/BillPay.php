<?php

namespace CodeLaravelVue\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BillPay.
 *
 * @package namespace CodeLaravelVue\Models;
 */
class BillPay extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_due',
        'name',
        'value',
        'done'
    ];

    public function category(){
        return $this->belongsTo(CategoryExpense::class);
    }

}
