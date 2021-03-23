<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Geographical;

class Announcement extends Model
{
    use HasFactory;
    protected  $fillable = ['title','localization','price','description','expiring_at','category_id','creator_id','img1','img2','img3','status','longitude','latitude'];
    public function categories()
    {
        return $this->hasManyThrough(Categories::class,Has_Category::class,'announcement_id','id','id','category_id');
    }
}
