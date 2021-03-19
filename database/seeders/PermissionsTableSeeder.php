<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'payment_create',
            ],
            [
                'id'    => 18,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 19,
                'title' => 'payment_show',
            ],
            [
                'id'    => 20,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 21,
                'title' => 'payment_access',
            ],
            [
                'id'    => 22,
                'title' => 'stk_request_create',
            ],
            [
                'id'    => 23,
                'title' => 'stk_request_edit',
            ],
            [
                'id'    => 24,
                'title' => 'stk_request_show',
            ],
            [
                'id'    => 25,
                'title' => 'stk_request_delete',
            ],
            [
                'id'    => 26,
                'title' => 'stk_request_access',
            ],
            [
                'id'    => 27,
                'title' => 'stk_response_create',
            ],
            [
                'id'    => 28,
                'title' => 'stk_response_edit',
            ],
            [
                'id'    => 29,
                'title' => 'stk_response_show',
            ],
            [
                'id'    => 30,
                'title' => 'stk_response_delete',
            ],
            [
                'id'    => 31,
                'title' => 'stk_response_access',
            ],
            [
                'id'    => 32,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
