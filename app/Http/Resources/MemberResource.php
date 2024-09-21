<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'f_name' => $this->first_name,
            'm_name' => $this->middle_name,
            'l_name' => $this->last_name,
            'id_card_type' => $this->id_card_type,
            'id_card' => $this->id_card,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'disability_status' => $this->disability_status,
            'disablity' => $this->disablity,
            'disability_description' => $this->disability_description,
            'employment_status' => $this->employment_status,
            'branch' => BranchResource::make($this->branch),
        ];
    }
}
