<?php

namespace NextDeveloper\Authentication\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin;
use NextDeveloper\Authentication\Database\Filters\AuthenticationUserLoginQueryFilter;

use NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatedEvent;
use NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatingEvent;

/**
* This class is responsible from managing the data for AuthenticationUserLogin
*
* Class AuthenticationUserLoginService.
*
* @package NextDeveloper\Authentication\Database\Models
*/
class AbstractAuthenticationUserLoginService {
    public static function get(AuthenticationUserLoginQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null)
            $filter = new AuthenticationUserLoginQueryFilter(new Request());

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

        $model = AuthenticationUserLogin::filter($filter);

        if($model && $enablePaginate)
            return $model->paginate($perPage);
        else
            return $model->get();

        if(!$model && $enablePaginate)
            return AuthenticationUserLogin::paginate($perPage);
        else
            return AuthenticationUserLogin::get();
    }

    public static function getAll() {
        return AuthenticationUserLogin::all();
    }

    /**
    * This method returns the model by looking at reference id
    *
    * @param $ref
    * @return mixed
    */
    public static function getByRef($ref) : ?AuthenticationUserLogin {
        return AuthenticationUserLogin::findByRef($ref);
    }

    /**
    * This method returns the model by lookint at its id
    *
    * @param $id
    * @return AuthenticationUserLogin|null
    */
    public static function getById($id) : ?AuthenticationUserLogin {
        return AuthenticationUserLogin::where('id', $id)->first();
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
        event( new AuthenticationUserLoginCreatingEvent() );

        try {
            $model = AuthenticationUserLogin::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationUserLoginCreatedEvent($model) );

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
        $model = AuthenticationUserLogin::where('uuid', $id)->first();

        event( new AuthenticationUserLoginsUpdateingEvent($model) );

        try {
           $model = $model->update($data);
        } catch(\Exception $e) {
           throw $e;
        }

        event( new AuthenticationUserLoginsUpdatedEvent($model) );

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
        $model = AuthenticationUserLogin::where('uuid', $id)->first();

        event( new AuthenticationUserLoginsDeletingEvent() );

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        event( new AuthenticationUserLoginsDeletedEvent($model) );

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}