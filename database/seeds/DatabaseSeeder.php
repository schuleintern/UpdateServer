<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $stableBranch = new \App\Branch();
        $stableBranch->name = "Stable";
        $stableBranch->isStable = true;
        $stableBranch->desc = "Stabile, geteste Versionen. Geeignet zum Produktivgebrauch.";
        $stableBranch->save();

        $betaBranch = new \App\Branch();
        $betaBranch->name = "Beta";
        $betaBranch->isStable = false;
        $betaBranch->desc = "Nicht getestete Beta Versionen. Nicht geeignet zum Produktivgebrauch.";
        $betaBranch->save();
    }
}
