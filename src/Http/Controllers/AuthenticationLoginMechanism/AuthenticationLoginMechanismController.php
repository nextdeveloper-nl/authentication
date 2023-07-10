<?php

namespace NextDeveloper\Authentication\Http\Controllers\AuthenticationLoginMechanism;

use Illuminate\Http\Request;
use NextDeveloper\Generator\Common\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Authentication\Http\Requests\AuthenticationLoginMechanism\AuthenticationLoginMechanismUpdateRequest;
use NextDeveloper\Authentication\Database\Filters\AuthenticationLoginMechanismQueryFilter;
use NextDeveloper\Authentication\Services\AuthenticationLoginMechanismService;
use NextDeveloper\Authentication\Http\Requests\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreateRequest;

class AuthenticationLoginMechanismController extends AbstractController
{
    /**
    * This method returns the list of authenticationloginmechanisms.
    *
    * optional http params:
    * - paginate: If you set paginate parameter, the result will be returned paginated.
    *
    * @param AuthenticationLoginMechanismQueryFilter $filter An object that builds search query
    * @param Request $request Laravel request object, this holds all data about request. Automatically populated.
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(AuthenticationLoginMechanismQueryFilter $filter, Request $request) {
        $data = AuthenticationLoginMechanismService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
    * This method receives ID for the related model and returns the item to the client.
    *
    * @param $authenticationLoginMechanismId
    * @return mixed|null
    * @throws \Laravel\Octane\Exceptions\DdException
    */
    public function show($ref) {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = AuthenticationLoginMechanismService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method created AuthenticationLoginMechanism object on database.
    *
    * @param AuthenticationLoginMechanismCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function store(AuthenticationLoginMechanismCreateRequest $request) {
        $model = AuthenticationLoginMechanismService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationLoginMechanism object on database.
    *
    * @param $authenticationLoginMechanismId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function update($authenticationLoginMechanismId, AuthenticationLoginMechanismUpdateRequest $request) {
        $model = AuthenticationLoginMechanismService::update($authenticationLoginMechanismId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationLoginMechanism object on database.
    *
    * @param $authenticationLoginMechanismId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function destroy($authenticationLoginMechanismId) {
        $model = AuthenticationLoginMechanismService::delete($authenticationLoginMechanismId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}