<?php

namespace NextDeveloper\Authentication\Http\Controllers\AuthenticationLoginLog;

use Illuminate\Http\Request;
use NextDeveloper\Generator\Common\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Authentication\Http\Requests\AuthenticationLoginLog\AuthenticationLoginLogUpdateRequest;
use NextDeveloper\Authentication\Database\Filters\AuthenticationLoginLogQueryFilter;
use NextDeveloper\Authentication\Services\AuthenticationLoginLogService;
use NextDeveloper\Authentication\Http\Requests\AuthenticationLoginLog\AuthenticationLoginLogCreateRequest;

class AuthenticationLoginLogController extends AbstractController
{
    /**
    * This method returns the list of authenticationloginlogs.
    *
    * optional http params:
    * - paginate: If you set paginate parameter, the result will be returned paginated.
    *
    * @param AuthenticationLoginLogQueryFilter $filter An object that builds search query
    * @param Request $request Laravel request object, this holds all data about request. Automatically populated.
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(AuthenticationLoginLogQueryFilter $filter, Request $request) {
        $data = AuthenticationLoginLogService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
    * This method receives ID for the related model and returns the item to the client.
    *
    * @param $authenticationLoginLogId
    * @return mixed|null
    * @throws \Laravel\Octane\Exceptions\DdException
    */
    public function show($ref) {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = AuthenticationLoginLogService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method created AuthenticationLoginLog object on database.
    *
    * @param AuthenticationLoginLogCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function store(AuthenticationLoginLogCreateRequest $request) {
        $model = AuthenticationLoginLogService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationLoginLog object on database.
    *
    * @param $authenticationLoginLogId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function update($authenticationLoginLogId, AuthenticationLoginLogUpdateRequest $request) {
        $model = AuthenticationLoginLogService::update($authenticationLoginLogId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method updates AuthenticationLoginLog object on database.
    *
    * @param $authenticationLoginLogId
    * @param CountryCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function destroy($authenticationLoginLogId) {
        $model = AuthenticationLoginLogService::delete($authenticationLoginLogId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}