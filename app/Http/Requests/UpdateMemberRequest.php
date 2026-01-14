<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $memberId = $this->route('member');

        return [
            'fullname' => ['required', 'string', 'max:255'],
            'document_id' => ['required', 'string', 'max:50', Rule::unique('members', 'document_id')->ignore($memberId)],
            'birth_date' => ['required', 'date', 'before:today'],
            'gender' => ['required', Rule::in(['masculino', 'femenino'])],
            'marital_status' => ['required', Rule::in(['soltero', 'casado', 'viudo', 'divorciado'])],
            'ministry' => ['required', Rule::in(['alabanza', 'jóvenes', 'niños', 'líderes', 'intercesión', 'ujieres', 'diaconía', 'multimedia', 'damas_dorcas', 'escuela_dominical', 'evangelismo', 'ninguno'])],
            'ministry_role' => ['nullable', 'string', 'max:255'],
            'church_role' => ['required', Rule::in([
                'pastor_principal', 'pastor_asociado', 'evangelista',
                'secretario', 'tesorero', 'miembro_junta',
                'presidenta_dorcas', 'vicepresidenta_dorcas', 'secretaria_dorcas', 'tesorera_dorcas',
                'presidente_jovenes', 'vicepresidente_jovenes', 'secretario_jovenes', 'tesorero_jovenes',
                'director_escuela_dominical', 'subdirector_escuela_dominical', 'secretario_escuela_dominical',
                'líder', 'diácono', 'miembro', 'visitante'
            ])],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'neighborhood' => ['nullable', 'string', 'max:255'],
            'is_baptized' => ['boolean'],
            'is_sealed' => ['boolean'],
            'friend_relation' => ['nullable', 'string', 'max:255'],
            'join_date' => ['required', 'date'],
            'status' => ['nullable', Rule::in(['activo', 'inactivo'])],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'fullname.required' => 'El nombre completo es obligatorio.',
            'document_id.required' => 'El documento de identidad es obligatorio.',
            'document_id.unique' => 'Ya existe un miembro con este documento de identidad.',
            'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
            'birth_date.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'gender.required' => 'El género es obligatorio.',
            'marital_status.required' => 'El estado civil es obligatorio.',
            'ministry.required' => 'El ministerio es obligatorio.',
            'church_role.required' => 'El rol en la iglesia es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'join_date.required' => 'La fecha de ingreso es obligatoria.',
        ];
    }
}
