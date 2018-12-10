<?php

namespace App\Imports;

use App\Subscriber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubscribersImport implements ToModel, WithHeadingRow, WithValidation
{

    protected $list_id;

    public function __construct($list_id)
    {
        $this->list_id = $list_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subscriber([
            'list_id' => $this->list_id,
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'company' => $row['company'],
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'first_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
        ];
    }
}
