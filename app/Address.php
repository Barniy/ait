<?php

namespace App;

use App\Http\Traits\UsesUuid;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Address extends Model implements Searchable
{
    use UsesUuid;
    protected $fillable = [];

    protected $guarded = [];
    public function addressable()
    {
        return $this->morphTo();
    }
    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->mobile_phone_number,
        );
    }
}
