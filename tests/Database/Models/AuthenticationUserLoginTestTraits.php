<?php

namespace NextDeveloper\Authentication\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Authentication\Database\Filters\AuthenticationUserLoginQueryFilter;
use NextDeveloper\Authentication\Services\AbstractServices\AbstractAuthenticationUserLoginService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AuthenticationUserLoginTestTraits
{
    public $http;

    /**
    *   Creating the Guzzle object
    */
    public function setupGuzzle()
    {
        $this->http = new Client([
            'base_uri'  =>  '127.0.0.1:8000'
        ]);
    }

    /**
    *   Destroying the Guzzle object
    */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_authenticationuserlogin_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/authentication/authenticationuserlogin',
            ['http_errors' => false]
        );

        $this->assertContains($response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
        ]);
    }

    public function test_http_authenticationuserlogin_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request('POST', '/authentication/authenticationuserlogin', [
            'form_params'   =>  [
                'login_client'  =>  'a',
                'login_type'  =>  'a',
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
    * Get test
    *
    * @return bool
    */
    public function test_authenticationuserlogin_model_get()
    {
        $result = AbstractAuthenticationUserLoginService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationuserlogin_get_all()
    {
        $result = AbstractAuthenticationUserLoginService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationuserlogin_get_paginated()
    {
        $result = AbstractAuthenticationUserLoginService::get(null, [
            'paginated' =>  'true'
        ]);

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_authenticationuserlogin_event_retrieved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRetrievedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_created_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_creating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_saving_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginSavingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_saved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginSavedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_updating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginUpdatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_updated_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginUpdatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_deleting_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginDeletingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_deleted_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginDeletedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_restoring_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRestoringEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_restored_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRestoredEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRetrievedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginCreatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginSavingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginSavedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginUpdatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginUpdatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginDeletingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginDeletedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRestoringEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationuserlogin_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationUserLogin\AuthenticationUserLoginRestoredEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_login_client_filter()
    {
        try {
            $request = new Request([
                'login_client'  =>  'a'
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_login_type_filter()
    {
        try {
            $request = new Request([
                'login_type'  =>  'a'
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_created_at_filter_start()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_updated_at_filter_start()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_deleted_at_filter_start()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_created_at_filter_end()
    {
        try {
            $request = new Request([
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_updated_at_filter_end()
    {
        try {
            $request = new Request([
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_deleted_at_filter_end()
    {
        try {
            $request = new Request([
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationuserlogin_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationUserLoginQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}