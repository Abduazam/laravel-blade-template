<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class RouteBasedPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::findByName('admin');

        $routes = collect(Route::getRoutes());

        $routes->each(function ($route) use ($admin) {
            $name = $route->getName();
            if ($name && Str::startsWith($name, 'dashboard.')) {
                $permission = Permission::create([
                    'name' => $name,
                ]);

                $admin->givePermissionTo($permission);
            }
        });
    }
}
