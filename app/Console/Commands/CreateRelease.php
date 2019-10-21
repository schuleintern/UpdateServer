<?php

namespace App\Console\Commands;

use App\Branch;
use App\Release;
use App\zip\ExtendedZip;
use Illuminate\Console\Command;

class CreateRelease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Erstellt einen neuen Release';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Erzeuge ein neues Release aus aktuellem Git Repo.");

        $baseDir = $this->ask("Pfad zum Git Basispfad.", "/www/htdocs/w019c185/schuleinterngit/Webportal");
        $branchInput = $this->ask("Welcher Branch?", "stable");

        $versionInfo = json_decode(file_get_contents($baseDir . "/Upload/framework/versioninfo.json"), true);

        $newRelease = new Release();
        $newRelease->name = $versionInfo['Name'];
        $newRelease->changeLog = $versionInfo['ChangeLog'];
        $newRelease->versionMajor = $versionInfo['MajorVersion'];
        $newRelease->versionMinor = $versionInfo['MinorVersion'];
        $newRelease->versionPatch = $versionInfo['PatchVersion'];
        $newRelease->releaseDate = today();
        $newRelease->save();

        /** @var Branch $branch */
        $branch = Branch::where("name","like", $branchInput)->first();

        if($branch === null) {
            $this->error("Branch nicht vorhanden!");
            return 1;
        }


        $branch->getReleases()->save($newRelease);

        $currentRelease = $branch->getCurrentRelease();
        $currentRelease->nextVersionID = $newRelease->id;
        $currentRelease->save();

        $this->info("Baue ZIP Datei.");

        /* $zipFile = new \PhpZip\ZipFile();

        $zipFile->addDirRecursive($baseDir);

        $this->info(getcwd());

        $zipFile->saveAsFile("storage/app/release/release" . $newRelease->id . ".zip"); **/

        ExtendedZip::zipTree($baseDir,"storage/app/release/release" . $newRelease->id . ".zip", \ZipArchive::CREATE);




        $this->info("Neues Release veröffenticht. ID: " . $newRelease->id);

    }
}
