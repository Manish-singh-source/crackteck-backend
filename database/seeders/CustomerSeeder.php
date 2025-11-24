<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert([
            
            [
                'user_id' => 1,
                'first_name' => 'Rahul',
                'last_name' => 'Sharma',
                'phone' => '9876543210',
                'email' => 'rahul.sharma@example.com',
                'username' => 'rahulsharma',
                'dob' => '1990-05-12',
                'branch_name' => 'Mumbai',
                'gender' => 'Male',
                'customer_type' => 'E-commerce Customer',
                'company_name' => null,
                'company_addr' => null,
                'gst_no' => null,
                'pan_no' => 'ABCDE1234F',
                'pic' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'user_id' => 1,
                'first_name' => 'Priya',
                'last_name' => 'Menon',
                'phone' => '9823456789',
                'email' => 'priya.menon@example.com',
                'username' => 'priyamenon',
                'dob' => '1988-11-20',
                'branch_name' => 'Bengaluru',
                'gender' => 'Female',
                'customer_type' => 'AMC Customer',
                'company_name' => null,
                'company_addr' => null,
                'gst_no' => null,
                'pan_no' => 'FGHIJ5678K',
                'pic' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'user_id' => 1,
                'first_name' => 'Amit',
                'last_name' => 'Patel',
                'phone' => '9001234567',
                'email' => 'amit.patel@patelinfotech.in',
                'username' => 'amitpatel',
                'dob' => '1985-02-03',
                'branch_name' => 'Ahmedabad',
                'gender' => 'Male',
                'customer_type' => 'Both',
                'company_name' => 'Patel Infotech Pvt Ltd',
                'company_addr' => 'SG Highway, Ahmedabad, Gujarat',
                'gst_no' => '24ABCDE1234F1Z5',
                'pan_no' => 'ABCDE1234F',
                'pic' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'user_id' => 1,
                'first_name' => 'Sneha',
                'last_name' => 'Kapoor',
                'phone' => '9812345678',
                'email' => 'sneha.kapoor@kapoortraders.com',
                'username' => 'snehakapoor',
                'dob' => '1992-07-18',
                'branch_name' => 'Delhi',
                'gender' => 'Female',
                'customer_type' => 'E-commerce Customer',
                'company_name' => 'Kapoor Traders',
                'company_addr' => 'Karol Bagh, New Delhi',
                'gst_no' => '07FGHIJ5678K2Z7',
                'pan_no' => 'FGHIJ5678K',
                'pic' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'user_id' => 1,
                'first_name' => 'Vikram',
                'last_name' => 'Reddy',
                'phone' => '9123456780',
                'email' => 'vikram.reddy@example.com',
                'username' => 'vikramreddy',
                'dob' => '1989-03-10',
                'branch_name' => 'Hyderabad',
                'gender' => 'Male',
                'customer_type' => 'AMC Customer',
                'company_name' => null,
                'company_addr' => null,
                'gst_no' => null,
                'pan_no' => 'LMNOP1234Q',
                'pic' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

        ]);
    }
}
