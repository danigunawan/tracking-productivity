<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;



class UsersSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	// Membuat role admin
		$adminRole = new Role();
		$adminRole->name = "admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();
		// Membuat role pimpinan
		$pimpinanRole = new Role();
		$pimpinanRole->name = "pimpinan";
		$pimpinanRole->display_name = "Pimpinan";
		$pimpinanRole->save();
		// Membuat role auditor
		$auditorRole = new Role();
		$auditorRole->name = "auditor";
		$auditorRole->display_name = "Auditor";
		$auditorRole->save();
			// Membuat role auditor
		$memberRole = new Role();
		$memberRole->name = "member";
		$memberRole->display_name = "Member";
		$memberRole->save();

		// Membuat sample admin
		$admin = new User();
		$admin->name = 'Admin Larapus';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);
				// Membuat sample admin
		$pimpinan = new User();
		$pimpinan->name = 'pimpinan Larapus';
		$pimpinan->email = 'pimpinan@gmail.com';
		$pimpinan->password = bcrypt('rahasia');
		$pimpinan->save();
		$pimpinan->attachRole($pimpinanRole);

			$auditor = new User();
		$auditor->name = 'auditor Larapus';
		$auditor->email = 'auditor@gmail.com';
		$auditor->password = bcrypt('rahasia');
		$auditor->save();
		$auditor->attachRole($auditorRole);
		// Membuat sample member
		$member = new User();
		$member->name = "Sample Member";
		$member->email = 'member@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();
		$member->attachRole($memberRole);


    }
}
