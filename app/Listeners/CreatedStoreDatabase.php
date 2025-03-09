<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\StoreCreated;
use DB;
use Artisan;
use Config;

class CreatedStoreDatabase
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoreCreated $event): void
    {
         $store = $event->store;
        // dd($store);
         $db = "mahmoud_{$store->id}" ;
         $store->database_options = [
            'dbname'=> $db,
         ];
         $store->save();
           // تحقق مما إذا كانت قاعدة البيانات موجودة بالفعل
    $exists = DB::select("SHOW DATABASES LIKE '{$db}'");

    if (!$exists) {
        DB::statement("CREATE DATABASE {$db}");
    }
        //DB::statement("CREATE DATABASE {$db}");
        Config::set('database.connections.tenant.database',$db);
        $dir = new \DirectoryIterator(database_path('migrations/tenants'));
       // dd($dir);
        foreach($dir as $file)
        {
            if($file->isFile() )
            {
               Artisan::call('migrate',[
                '--database' => 'tenant',
              '--path' => 'database/migrations/tenants/'.$file->getFilename(),
               '--force'=> true,
               ]);

             // dd($file->getFilename());
            }
         }
                        // إضافة بيانات بعد الترحيل
DB::connection('tenant')->table('notes')->insert([
    'name' =>  $store->name,
 ]);

        // dd("done");
     }
    
}
