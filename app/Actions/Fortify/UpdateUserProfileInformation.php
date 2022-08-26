<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'paypal_email' => ['email', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'about' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'job' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'paypal_email' => $input['paypal_email'],
                'about' => $input['about'],
                'company' => $input['company'],
                'job' => $input['job'],
                'country' => $input['country'],
                'address' => $input['address'],
                'phone' => $input['phone'],
                'twitter' => $input['twitter'],
                'facebook' => $input['facebook'],
                'instagram' => $input['instagram'],
                'linkedin' => $input['linkedin'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'paypal_email' => $input['paypal_email'],
            'photo' => $input['photo'],
            'about' => $input['about'],
            'company' => $input['company'],
            'job' => $input['job'],
            'country' => $input['country'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'twitter' => $input['twitter'],
            'facebook' => $input['facebook'],
            'instagram' => $input['instagram'],
            'linkedin' => $input['linkedin'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
