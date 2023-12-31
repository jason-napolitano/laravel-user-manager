<?php

namespace App\Http\Requests {
    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;
    use App\Models\User;

    class ProfileUpdateRequest extends FormRequest
    {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            return [
                'name'     => ['string', 'max:255'],
                'image'    => ['nullable'],
                'username' => ['string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
                'email'    => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            ];
        }
    }
}
