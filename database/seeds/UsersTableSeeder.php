<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Counselor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->roles()->attach(1);

        $user2 = User::create([
            'name' => 'Yusenis',
            'email' => 'yuse@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2->roles()->attach(3);
         
        Counselor::create([
            'user_id' => $user2->id,
            'name' => 'Yusenis',
            'lst_name' => 'Leal',
            'bio' => 'Soy Psicologa de profesion y coach profesional, siempre me gustó ayudar a las personas por eso me dedico a guiarlos y ofrecerles el mejor panorama que ofrece la vida.',
            'msg' => 'Hola es un gusto ayudarte!. <br> hablemos de lo que quieras :3',
        ]);

    }
}
