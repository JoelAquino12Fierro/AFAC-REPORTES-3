<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'id' => ['required', 'int'],
            'name' => ['required', 'string', 'max:255'],
            'paternal_surname' => ['required', 'string', 'max:255'],
            'maternal_surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'id' => $input['id'],
            'name' => $input['name'],
            'paternal_surname' => $input['paternal_surname'],
            'maternal_surname' => $input['maternal_surname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
