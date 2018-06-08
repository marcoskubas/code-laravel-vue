<?php

namespace CodeLaravelVue\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BankAccount.
 *
 * @package namespace CodeLaravelVue\Models;
 */
class BankAccount extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'agency',
    	'account',
    	'bank_id'
    ];

    public function bank(){
    	return $this->belongsTo(Bank::class);
    }

}
