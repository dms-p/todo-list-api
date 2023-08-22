<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResources extends JsonResource
{
    public $status,$message,$resource;
    public function __construct($status,$message,$resource)
    {
        $this->status=$status;
        $this->message=$message;
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'status'=>$this->status,
            'message'=>$this->message,
            'data'=>$this->resource
        ];
    }
}
