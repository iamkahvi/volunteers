<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRoles extends Seeder
{
    private $roles =
    [
        'admin',
        'volunteer',
        'banned',
        'GROW',
        'CK',
        'GAR',
        'CPIC',
        'board-member',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->roles as $name)
        {
            try
            {
                $role = new Role;
                $role->name = $name;
                $role->save();

                dump("New role created: {$name}");
            }
            catch(Exception $exception)
            {
                // Get the MySQL error number
                $error = $exception->getPrevious()->errorInfo[1];

                // Duplicate?
                if($error == 1062)
                {
                    dump("Role already exists: {$name}");
                }
                else
                {
                    dump("MySQL Error!", $exception);
                }
            }
        }
    }
}
