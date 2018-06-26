<?php

namespace CodeLaravelVue\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Category.
 *
 * @package namespace CodeLaravelVue\Models;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants;
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public static $enableTenant = true;

	public function newQuery()
	{
		$builder = $this->newQueryWithoutScopes();

        foreach ($this->getGlobalScopes() as $identifier => $scope) {
        	if((static::$enableTenant && $identifier == 'client_id') || $identifier != 'client_id'){
            	$builder->withGlobalScope($identifier, $scope);
        	}
        }

		return $builder;
	}    

}
