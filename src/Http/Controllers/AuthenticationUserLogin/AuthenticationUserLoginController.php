<?php

namespace NextDeveloper\Authentication\Http\Controllers\AuthenticationUserLogin;

use Illuminate\Http\Request;
use NextDeveloper\Generator\Common\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Authentication\Http\Requests\AuthenticationUserLogin\AuthenticationUserLoginUpdateRequest;
use NextDeveloper\Authentication\Database\Filters\AuthenticationUserLoginQueryFilter;
use NextDeveloper\Authentication\Services\AuthenticationUserLoginService;
use NextDeveloper\Authentication\Http\Requests\AuthenticationUserLogin\AuthenticationUserLoginCreateRequest;

class AuthenticationUserLoginController extends AbstractController
{
    /**
    * This method returns the list of authenticationuserlogins.
    *
    * optional http params:
    * - paginate: If you set paginate parameter, the result will be returned paginated.
    *
    * @param AuthenticationUserLoginQueryFilter $filter An object that builds search query
    * @param Request $request Laravel request object, this holds all data about request. Automatically populated.
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(AuthenticationUserLoginQueryFilter $filter, Request $request) {
        $data = AuthenticationUserLoginService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
    * This method receives ID for the related model and returns the item to the client.
    *
    * @param $authenticationUserLoginId
    * @return mixed|null
    * @throws \Laravel\Octane\Exceptions\DdException
    */
    public function show($ref) {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = AuthenticationUserLoginService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method created AuthenticationUserLogin object on database.
    *
    * @param AuthenticationUserLoginCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function store(AuthenticationUserLoginCreateRequest $request) {
        $model = AuthenticationUserLoginService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationUserLogin object on database.
    *
    * @param $authenticationUserLoginId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function update($authenticationUserLoginId, AuthenticationUserLoginUpdateRequest $request) {
        $model = AuthenticationUserLoginService::update($authenticationUserLoginId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationUserLogin object on database.
    *
    * @param $authenticationUserLoginId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function destroy($authenticationUserLoginId) {
        $model = AuthenticationUserLoginService::delete($authenticationUserLoginId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}