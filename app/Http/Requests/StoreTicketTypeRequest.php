<?php

namespace App\Http\Requests;

use App\Models\TicketType;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', TicketType::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string|max:255|unique:ticket_types,type',
            'database_name' => 'required|string|max:255|unique:ticket_types,database_name|alpha_dash',
        ];
    }
}
