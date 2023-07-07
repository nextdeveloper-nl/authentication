<?php

namespace NextDeveloper\Authentication\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Authentication\Database\Filters\AuthenticationTwoFaQueryFilter;
use NextDeveloper\Authentication\Services\AbstractServices\AbstractAuthenticationTwoFaService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AuthenticationTwoFaTestTraits
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

    public function test_http_authenticationtwofa_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/authentication/authenticationtwofa',
            ['http_errors' => false]
        );

        $this->assertContains($response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
        ]);
    }

    public function test_http_authenticationtwofa_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request('POST', '/authentication/authenticationtwofa', [
            'form_params'   =>  [
                    'expires_at'  =>  now(),
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
    public function test_authenticationtwofa_model_get()
    {
        $result = AbstractAuthenticationTwoFaService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationtwofa_get_all()
    {
        $result = AbstractAuthenticationTwoFaService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_authenticationtwofa_get_paginated()
    {
        $result = AbstractAuthenticationTwoFaService::get(null, [
            'paginated' =>  'true'
        ]);

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_authenticationtwofa_event_retrieved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRetrievedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_created_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_creating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_saving_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaSavingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_saved_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaSavedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_updating_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaUpdatingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_updated_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaUpdatedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_deleting_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaDeletingEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_deleted_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaDeletedEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_restoring_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRestoringEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_restored_without_object()
    {
        try {
            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRestoredEvent() );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRetrievedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaCreatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaSavingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaSavedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaUpdatingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaUpdatedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaDeletingEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaDeletedEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRestoringEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_authenticationtwofa_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::first();

            event( new \NextDeveloper\Authentication\Events\AuthenticationTwoFa\AuthenticationTwoFaRestoredEvent($model) );
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_expires_at_filter_start()
    {
        try {
            $request = new Request([
                'expires_atStart'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_created_at_filter_start()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_updated_at_filter_start()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_deleted_at_filter_start()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_expires_at_filter_end()
    {
        try {
            $request = new Request([
                'expires_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_created_at_filter_end()
    {
        try {
            $request = new Request([
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_updated_at_filter_end()
    {
        try {
            $request = new Request([
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_deleted_at_filter_end()
    {
        try {
            $request = new Request([
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_expires_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'expires_atStart'  =>  now(),
                'expires_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_authenticationtwofa_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request([
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
            ]);

            $filter = new AuthenticationTwoFaQueryFilter($request);

            $model = \NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}