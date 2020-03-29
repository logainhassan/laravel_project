<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            //$this btrefer to single object ll collection of $post
            //keda 7alena moshkelten : awl moshkela en el esm bta3 el user_id 7ayb2a sabet b posted_by l bto3 el mob y3ni lw 8ayrt fe esm el column 3ndi msh 7ayt2sr ,, tany moshkela eni et7akemt fel parameters eli elmafrod ttba3t y3ni msh 7ab3atlo kol el data la2 ana 7ab3tlo eli ana 3ayzah bs 
            'posted_by' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'id' => $this->id,
            // 'user_info' =>[
            //     'id' => $this->user->id ? $this->user->id : 'not exists',
            // ]
            'user_info' => new UserResource($this->user)
        ];
    }
}
