<?php

namespace NextDeveloper\Authentication\Http\Controllers\User;

use Illuminate\Http\Request;
use NextDeveloper\Generator\Common\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Authentication\Database\Filters\UserQueryFilter;
use NextDeveloper\Authentication\Http\Transformers\UserTransformer;
use NextDeveloper\Authentication\Services\UserService;
use NextDeveloper\Authentication\Http\Requests\User\UserCreateRequest;

class UserController extends AbstractController
{
    /**
    * This method returns the list of users.
    *
    * optional http params:
    * - paginate: If you set paginate parameter, the result will be returned paginated.
    *
    * @param UserQueryFilter $filter An object that builds search query
    * @param Request $request Laravel request object, this holds all data about request. Automatically populated.
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(UserQueryFilter $filter, Request $request) {
        $data = UserService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
    * This method receives ID for the related model and returns the item to the client.
    *
    * @param $userId
    * @return mixed|null
    * @throws \Laravel\Octane\Exceptions\DdException
    */
    public function show($ref) {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file in NextDeveloper Platform Project
        $model = UserService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
    * This method created User object on database.
    *
    * @param UserCreateRequest $request
    * @return mixed|null
    * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
    */
    public function store(UserCreateRequest $request) {
        $model = UserService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }
}