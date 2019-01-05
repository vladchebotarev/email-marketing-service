<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|string|max:150',
            'from_name' => 'required|string|max:150',
            'from_email' => 'required|exists:ses_verified_mails,id',
            'template' => 'required|exists:templates,id',
            'subscribers_list' => 'required|exists:subscribers_lists,id',
            'schedule_date' => 'required_if:schedule,on|nullable|date_format:Y-m-d',
            'schedule_time' => 'required_if:schedule,on|nullable|date_format:H:i',
        ];
    }
}
