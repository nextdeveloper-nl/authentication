<?php

namespace NextDeveloper\Authentication\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism;
use NextDeveloper\Authentication\Database\Filters\AuthenticationLoginMechanismQueryFilter;

use NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatedEvent;
use NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatingEvent;

/**
* This class is responsible from managing the data for AuthenticationLoginMechanism
*
* Class AuthenticationLoginMechanismService.
*
* @package NextDeveloper\Authentication\Database\Models
*/
class AbstractAuthenticationLoginMechanismService {
    public static function get(AuthenticationLoginMechanismQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null)
            $filter = new AuthenticationLoginMechanismQueryFilter(new Request());

        $perPage = config('commons.pagination.per_page');

        if($perPage == null)
            $perPage = 20;

        if(array_key_exists('per_page', $params)) {
            $perPage = intval($params['per_page']);

            if($perPage == 0)
                $perPage = 20;
        }

        if(array_key_exists('orderBy', $params)) {
            $filter->orderBy($params['orderBy']);
        }

        $model = AuthenticationLoginMechanism::filter($filter);

        if($model && $enablePaginate)
            return $model->paginate($perPage);
        else
            return $model->get();

        if(!$model && $enablePaginate)
            return AuthenticationLoginMechanism::paginate($perPage);
        else
            return AuthenticationLoginMechanism::get();
    }

    public static function getAll() {
        return AuthenticationLoginMechanism::all();
    }

    /**
    * This method returns the model by looking at reference id
    *
    * @param $ref
    * @return mixed
    */
    public static function getByRef($ref) : ?AuthenticationLoginMechanism {
        return AuthenticationLoginMechanism::findByRef($ref);
    }

    /**
    * This method returns the model by lookint at its id
    *
    * @param $id
    * @return AuthenticationLoginMechanism|null
    */
    public static function getById($id) : ?AuthenticationLoginMechanism {
        return AuthenticationLoginMechanism::where('id', $id)->first();
    }

    /**
    * This method created the model from an array.
    *
    * Throws an exception if stuck with any problem.
    *
    * @param array $data
    * @return mixed
    * @throw Exception
    */
    public static function create(array $data) {
        event( new AuthenticationLoginMechanismCreatingEvent() );

        try {
            $model = AuthenticationLoginMechanism::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationLoginMechanismCreatedEvent($model) );

        return $model;
    }

    /**
    * This method updated the model from an array.
    *
    * Throws an exception if stuck with any problem.
    *
    * @param
    * @param array $data
    * @return mixed
    * @throw Exception
    */
    public static function update($id, array $data) {
        $model = AuthenticationLoginMechanism::where('uuid', $id)->first();

        event( new AuthenticationLoginMechanismsUpdateingEvent($model) );

        try {
           $model = $model->update($data);
        } catch(\Exception $e) {
           throw $e;
        }

        event( new AuthenticationLoginMechanismsUpdatedEvent($model) );

        return $model;
    }

    /**
    * This method updated the model from an array.
    *
    * Throws an exception if stuck with any problem.
    *
    * @param
    * @param array $data
    * @return mixed
    * @throw Exception
    */
    public static function delete($id, array $data) {
        $model = AuthenticationLoginMechanism::where('uuid', $id)->first();

        event( new AuthenticationLoginMechanismsDeletingEvent() );

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationLoginMechanismsDeletedEvent($model) );

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}