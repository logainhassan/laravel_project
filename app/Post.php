<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    protected $fillable = ['title' , 'description','user_id'];

    public function user(){
    	//bya5od el foreign key bel convension user then _ id (user_id) zay ma7na katbnha fel post table (user_id)
    	return $this->belongsto('App\User');
    }

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
