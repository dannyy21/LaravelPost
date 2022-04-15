<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Postt extends Model
{
    use HasFactory, Sluggable;
    

    protected $guarded = ['id'];    
    // protected $fillable = ['title', 'excerpt', 'body' ]; boleh diisi

    // protected $guarded = [] ini yg gaboleh diisi

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {   
        //         if(isset($filters['search']) ? $filters['search'] : false){     
        //             //jika di fillters ada search maka ambil yg didalem search nya kalo gaada false (ga dikerjain)
        //             // berhubungan dengan controller
        // // if(request('search')){
        //             return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //                          ->orWhere('body', 'like', '%' . $filters['search'] , '%');
        //         }

                 $query->when($filters['search'] ?? false, function($query, $search) {
                       return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
                      });
                  });
                $query->when($filters['category'] ?? false, function($query, $category){
                        return $query->whereHas('category', function($query)use($category){//use disini supaya pake category yg diatasnya
                            $query->where('slug', $category);
                        });
                });
                $query->when($filters['author'] ?? false, fn($query, $author) =>
                $query->whereHas('author', fn($query)=>
                    $query->where('username', $author)));}
                //search untuk ddi bagian category aja
                // join table pake wherehas
                // terus search ini berhubungan dengan yg di name search di view nya posts,
                // cari title dimana depan dan belakangnya 
    
    

    public function category(){
        return $this->belongsTo(Category::class);//Category::class itu categorry nya harus sama dengan file di models
        // ini menghubungkan models postt ini dengan models Category
        // belongsto itu hubungan one to one kalo one to many itu hasmany
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
        // user_id di aliaskan sebagai author
    }
    public function getRouteKeyName()
    {
        return 'slug';
        // supaya bisa by slug 
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];
    }
}


