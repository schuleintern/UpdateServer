<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**             $table->bigIncrements('id');
$table->string("name");
$table->date("versionReleaseDate");

$table->integer("versionMajor");
$table->integer("versionMinor");
$table->integer("versionPatch");

$table->string("downloadURL");
$table->longText("changeLog");
$table->boolean("isSecurityFix")->default(false);
$table->boolean("isMajorUpdate")->default(false);

$table->integer("nextVersionID")->default(0);
 *
 */


/**
 * @property string $name
 * @property date $releaseDate
 *
 * @property int versionMajor
 * @property int versionMinor
 * @property int versionPatch
 *
 * @property string downloadURL
 * @property string changeLog
 *
 * @property boolean $isSecurityFix
 * @property boolean $isMajorUpdate
 *
 * @property int nextVersionID
 *
 * @package App
 */
class Release extends Model
{
    protected $fillable = [
        'name',
        'releaseDate',
        'versionMajor',
        'versionMintor',
        'versionPatch',
        'downloadURL',
        'changeLog',
        'isSecurityFix',
        'isMajorUpdate'
    ];
}
