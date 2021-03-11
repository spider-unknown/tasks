<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConvertationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $count = 2;
        $new_convert = $this->converted_value;
        while($new_convert < 0.1) {
            $new_convert = $new_convert * 10;
            $count++;
        }
        return [
            'currency_from' => $this->currency_from,
            'currency_to' => $this->currency_to,
            'value' => $this->value,
            'converted_value' => round($this->converted_value, $count),
            'rate' => round($this->rate, 2),
            'created_at' => $this->created_at
        ];
    }
}
