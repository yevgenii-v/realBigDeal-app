<?php

namespace App\Http\Requests\Control\User;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'      => ['string', 'max:255'],
            'email'     => ['string', Rule::unique('users')->ignore($this->user)],
            'role'      => ['required', 'exists:roles,id']
        ];
    }
}
