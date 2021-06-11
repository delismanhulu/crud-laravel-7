<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barang extends Model
{

    protected $table = 'barang';
    protected $guarded = ['id'];
    protected $fillable = ['produk', 'slug','jumlah','harga'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
