<?php

namespace NextDeveloper\Authentication\Http\Controllers\AuthenticationTwoFa;

use Illuminate\Http\Request;
use NextDeveloper\Generator\Common\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Authentication\Http\Requests\AuthenticationTwoFa\AuthenticationTwoFaUpdateRequest;
use NextDeveloper\Authentication\Database\Filters\AuthenticationTwoFaQueryFilter;
use NextDeveloper\Authentication\Services\AuthenticationTwoFaService;
use NextDeveloper\Authentication\Http\Requests\AuthenticationTwoFa\AuthenticationTwoFaCreateRequest;

class AuthenticationTwoFaController extends AbstractController
{
    /**
    * This method returns the list of authenticationtwofas.
    *
    * optional http params:
    * - paginate: If you set paginate parameter, the result will be returned paginated.
    *
    * @param AuthenticationTwoFaQueryFilter $filter An object that builds search query
    * @param Request $request Laravel request object, this holds all data about request. Automatically populated.
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(AuthenticationTwoFaQueryFilter $filter, Request $request) {
        $data = AuthenticationTwoFaService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
    * This method receives ID for the related model and returns the item to the client.
    *
    * @param $authenticationTwoFaId
    * @return mixed|null
    * @throws \Laravel\Octane\Exceptions\DdException
    */
    public function show($ref) {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = AuthenticationTwoFaService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method created AuthenticationTwoFa object on database.
    *
    * @param AuthenticationTwoFaCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function store(AuthenticationTwoFaCreateRequest $request) {
        $model = AuthenticationTwoFaService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationTwoFa object on database.
    *
    * @param $authenticationTwoFaId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function update($authenticationTwoFaId, AuthenticationTwoFaUpdateRequest $request) {
        $model = AuthenticationTwoFaService::update($authenticationTwoFaId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationTwoFa object on database.
    *
    * @param $authenticationTwoFaId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function destroy($authenticationTwoFaId) {
        $model = AuthenticationTwoFaService::delete($authenticationTwoFaId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}