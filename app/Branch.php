<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Branch, der für Updates zu Verfügung steht.
 * @package App
 */
class Branch extends Model
{
    protected $fillable = [
        'name',
        'isStable'
    ];

    /**
     * Liste der Release Objekte
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getReleases() {
        return $this->hasMany(Release::class, "branchID");
    }

    /**
     * @return Release|null
     */
    public function getCurrentRelease() {
        $release = $this->getReleases()->where("nextVersionID","=", 0)->get();

        if(sizeof($release) > 0) {
            return $release[0];
        }
        else return null;

    }
}
