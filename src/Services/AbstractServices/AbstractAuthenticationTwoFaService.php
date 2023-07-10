<?php

namespace NextDeveloper\Authentication\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa;
use NextDeveloper\Authentication\Database\Filters\AuthenticationTwoFaQueryFilter;

use NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatedEvent;
use NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatingEvent;

/**
* This class is responsible from managing the data for AuthenticationTwoFa
*
* Class AuthenticationTwoFaService.
*
* @package NextDeveloper\Authentication\Database\Models
*/
class AbstractAuthenticationTwoFaService {
    public static function get(AuthenticationTwoFaQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null)
            $filter = new AuthenticationTwoFaQueryFilter(new Request());

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

        $model = AuthenticationTwoFa::filter($filter);

        if($model && $enablePaginate)
            return $model->paginate($perPage);
        else
            return $model->get();

        if(!$model && $enablePaginate)
            return AuthenticationTwoFa::paginate($perPage);
        else
            return AuthenticationTwoFa::get();
    }

    public static function getAll() {
        return AuthenticationTwoFa::all();
    }

    /**
    * This method returns the model by looking at reference id
    *
    * @param $ref
    * @return mixed
    */
    public static function getByRef($ref) : ?AuthenticationTwoFa {
        return AuthenticationTwoFa::findByRef($ref);
    }

    /**
    * This method returns the model by lookint at its id
    *
    * @param $id
    * @return AuthenticationTwoFa|null
    */
    public static function getById($id) : ?AuthenticationTwoFa {
        return AuthenticationTwoFa::where('id', $id)->first();
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
        event( new AuthenticationTwoFaCreatingEvent() );

        try {
            $model = AuthenticationTwoFa::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationTwoFaCreatedEvent($model) );

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
        $model = AuthenticationTwoFa::where('uuid', $id)->first();

        event( new AuthenticationTwoFasUpdateingEvent($model) );

        try {
           $model = $model->update($data);
        } catch(\Exception $e) {
           throw $e;
        }

        event( new AuthenticationTwoFasUpdatedEvent($model) );

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
        $model = AuthenticationTwoFa::where('uuid', $id)->first();

        event( new AuthenticationTwoFasDeletingEvent() );

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationTwoFasDeletedEvent($model) );

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}