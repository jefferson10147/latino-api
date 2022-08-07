<?php

namespace App\Classes;

use App\Models\User;

use Emarref\Jwt\Token;
use Emarref\Jwt\Claim\PublicClaim;
use Emarref\Jwt\Jwt;
use Emarref\Jwt\Algorithm\Hs256;
use Emarref\Jwt\Encryption\Factory;
use Emarref\Jwt\Verification\Context;

class PersonalizedJWT
{
    
    public static function tokenValidate($token_request)
    {
        $jwt = new Jwt();

        $algorithm = new Hs256(env('KEY_ALGORITHM_ENCRYPTION'));
        $encryption = Factory::create($algorithm);

        $token = $jwt->deserialize($token_request);

        $context = new Context($encryption);

        $jwt->verify($token, $context);

        $data = json_decode($token->getPayload()->jsonSerialize());

        if($data->expiration < time()) {
            throw new \Exception('Expired token.');
        }

        $object_user = User::find($data->id);

        if(!$object_user) throw new \Exception('There is not user associated with this token.');

        return $object_user;
    }

    public static function generateToken($data_token)
    {
        $token_jwt = new Token();

        foreach ($data_token as $k => $v) {
            $token_jwt->addClaim(new PublicClaim($k, $v));
        }

        $jwt = new Jwt();

        $algorithm = new Hs256(env('KEY_ALGORITHM_ENCRYPTION'));
        
        $encryption = Factory::create($algorithm);
        
        return $jwt->serialize($token_jwt, $encryption);
    }
}
