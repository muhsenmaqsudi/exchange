<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowExchangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'email' => $this->resource->email,
            'source' => $this->resource->source,
            'destination' => $this->resource->destination,
            'amount' => $this->resource->amount,
            'result' => $this->resource->result
        ];
    }
}
