<?php

namespace App\GraphQL\Mutations;

use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Joselfonseca\LighthouseGraphQLPassport\GraphQL\Mutations\BaseAuthResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;

final class RegistrationMutation  extends BaseAuthResolver
{
    /**
     * @param $rootValue
     * @param array                                                    $args
     * @param \Nuwave\Lighthouse\Support\Contracts\GraphQLContext|null $context
     * @param \GraphQL\Type\Definition\ResolveInfo                     $resolveInfo
     *
     * @throws \Exception
     *
     * @return array
     */
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $args['current_location'] = ['lat' => $args['lat'], 'lng' => $args['lng']];
        $args['badge_id'] = Str::upper($args['name'])."-". rand(10000, 99999);
        $model = $this->createAuthModel($args);

        $this->validateAuthModel($model);

        if ($model instanceof MustVerifyEmail) {
            $model->sendEmailVerificationNotification();

            event(new Registered($model));

            return [
                'tokens' => [],
                'status' => 'MUST_VERIFY_EMAIL',
            ];
        }
        $credentials = $this->buildCredentials([
            'username' => $args[config('lighthouse-graphql-passport.username')],
            'password' => $args['password'],
        ]);
        $user = $model->where(config('lighthouse-graphql-passport.username'), $args[config('lighthouse-graphql-passport.username')])->first();
        $response = $this->makeRequest($credentials);
        $response['user'] = $user;

        try {
            if($args['image']){
                $user->addMedia($args['image'])->toMediaCollection("USER_IMAGE");
            }
        } catch(Exception $exception) {}
        
        event(new Registered($user));

        return [
            'tokens' => $response,
            'status' => 'SUCCESS',
        ];
    }

    protected function validateAuthModel($model): void
    {
        $authModelClass = $this->getAuthModelFactory()->getClass();

        if ($model instanceof $authModelClass) {
            return;
        }

        throw new \RuntimeException("Auth model must be an instance of {$authModelClass}");
    }

    protected function createAuthModel(array $data): Model
    {
        $input = collect($data)->except(['password_confirmation', 'current_location'])->toArray();
        $input['current_location'] = collect($data['current_location']);
        $input['password'] = Hash::make($input['password']);

        return $this->getAuthModelFactory()->create($input);
    }
}
