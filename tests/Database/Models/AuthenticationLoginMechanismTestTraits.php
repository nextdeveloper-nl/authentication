<?php

namespace NextDeveloper\Authentication\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Authentication\Database\Filters\AuthenticationLoginMechanismQueryFilter;
use NextDeveloper\Authentication\Services\AbstractServices\AbstractAuthenticationLoginMechanismService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AuthenticationLoginMechanismTestTraits
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

    public function test_http_authenticationloginmechanism_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/authentication/authenticationloginmechanism',
            ['http_errors' => false]
        );

        $this->assertContains($response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
        ]);
    }

    public function test_http_authenticationloginmechanism_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request('POST', '/authentication/authenticationloginmechanism', [
            'form_params'   =>  [
                'login_client'  =>  'a',
                'login_mechanism'  =>  'a',
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
    public function test_authenticationloginmechanism_model_get()
    {
        $result = AbstractAuthenticationLoginMechanismService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationloginmechanism_get_all()
    {
        $result = AbstractAuthenticationLoginMechanismService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationloginmechanism_get_paginated()
    {
        $result = AbstractAuthenticationLoginMechanismService::get(null, [
            'paginated' =>  'true'
        ]);

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_authenticationloginmechanism_event_retrieved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRetrievedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_created_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_creating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_saving_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismSavingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_saved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismSavedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_updating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismUpdatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_updated_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismUpdatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_deleting_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismDeletingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_deleted_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismDeletedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_restoring_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRestoringEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_restored_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRestoredEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRetrievedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismCreatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismSavingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismSavedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismUpdatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismUpdatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismDeletingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismDeletedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRestoringEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationloginmechanism_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationLoginMechanism\AuthenticationLoginMechanismRestoredEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_login_client_filter()
    {
        try {
            $request = new Request([
                'login_client'  =>  'a'
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_login_mechanism_filter()
    {
        try {
            $request = new Request([
                'login_mechanism'  =>  'a'
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_created_at_filter_start()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_updated_at_filter_start()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_deleted_at_filter_start()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_created_at_filter_end()
    {
        try {
            $request = new Request([
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_updated_at_filter_end()
    {
        try {
            $request = new Request([
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_deleted_at_filter_end()
    {
        try {
            $request = new Request([
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationloginmechanism_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationLoginMechanismQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}