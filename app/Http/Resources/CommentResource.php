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
        "user"=>[
            'id'=>$this->user->id,
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'profile_pic'=>$this->user->profile_pic,
        ],
        "post"=>[
            'id'=>$this->post->id,
            'body'=>$this->post->body,
            'image'=>$this->post->image,
        ]
       ];
    }
}
