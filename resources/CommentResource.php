<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
        'id'=>$this->id,
        'body'=>$this->body,
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
        "user"=>[
            'id'=>$this->user->id,
            'name'=>$this->user->name,
            'email'=>$this->user->email,
        ],
        "post"=>[
            'id'=>$this->post->id,
            'body'=>$this->post->body,
        ]
       ];
    }
}
