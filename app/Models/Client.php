<?php

namespace CodeLaravelVue\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use CodeLaravelVue\User;

/**
 * Class Client.
 *
 * @package namespace CodeLaravelVue\Models;
 */
class Client extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function users(){
    	return $this->hasMany(User::class);
    }

}
