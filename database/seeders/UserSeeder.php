<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Get reference locations for sample users
        $kuwait = Country::where('code', 'KW')->first();
        $kwCapital = State::where('name', 'Al Asimah (Capital)')->where('country_id', $kuwait->id)->first();
        $kwCity = City::where('state_id', $kwCapital->id)->first();

        $kwHawalli = State::where('name', 'Hawalli')->where('country_id', $kuwait->id)->first();
        $kwHawalliCity = City::where('state_id', $kwHawalli->id)->first();

        $kwAhmadi = State::where('name', 'Ahmadi')->where('country_id', $kuwait->id)->first();
        $kwAhmadiCity = City::where('state_id', $kwAhmadi->id)->first();

        $saudi = Country::where('code', 'SA')->first();
        $saRiyadh = State::where('name', 'Riyadh')->where('country_id', $saudi->id)->first();
        $saRiyadhCity = City::where('name', 'Riyadh')->where('state_id', $saRiyadh->id)->first();

        $saEastern = State::where('name', 'Eastern Province')->where('country_id', $saudi->id)->first();
        $saDammam = City::where('name', 'Dammam')->where('state_id', $saEastern->id)->first();

        $saMakkah = State::where('name', 'Makkah')->where('country_id', $saudi->id)->first();
        $saJeddah = City::where('name', 'Jeddah')->where('state_id', $saMakkah->id)->first();

        $uae = Country::where('code', 'AE')->first();
        $uaeDubai = State::where('name', 'Dubai')->where('country_id', $uae->id)->first();
        $uaeDubaiCity = City::where('state_id', $uaeDubai->id)->first();

        $egypt = Country::where('code', 'EG')->first();
        $egCairo = State::where('name', 'Cairo')->where('country_id', $egypt->id)->first();
        $egCairoCity = City::where('name', 'Cairo')->where('state_id', $egCairo->id)->first();

        $jordan = Country::where('code', 'JO')->first();
        $joAmman = State::where('name', 'Amman')->where('country_id', $jordan->id)->first();
        $joAmmanCity = City::where('name', 'Amman')->where('state_id', $joAmman->id)->first();

        $now = Carbon::now();

        $users = [
            // ── Business Accounts ──────────────────────────────────
            [
                'account_type' => 'business',
                'group_name' => 'Al Salam Medical Group',
                'owner_name' => 'Dr. Fahad Al-Sabah',
                'email' => 'fahad@alsalammedical.com',
                'password' => 'password123',
                'phone_country_code' => '+965',
                'phone_number' => '55001234',
                'country_id' => $kuwait->id,
                'state_id' => $kwCapital->id,
                'city_id' => $kwCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],
            [
                'account_type' => 'business',
                'group_name' => 'Riyadh Healthcare Holdings',
                'owner_name' => 'Dr. Abdullah Al-Rasheed',
                'email' => 'abdullah@riyadhhealth.sa',
                'password' => 'password123',
                'phone_country_code' => '+966',
                'phone_number' => '501234567',
                'country_id' => $saudi->id,
                'state_id' => $saRiyadh->id,
                'city_id' => $saRiyadhCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Doctor Accounts ────────────────────────────────────
            [
                'account_type' => 'doctor',
                'group_name' => 'Dr. Nora Clinic',
                'owner_name' => 'Dr. Nora Al-Mutairi',
                'email' => 'nora@drnora.com',
                'password' => 'password123',
                'phone_country_code' => '+965',
                'phone_number' => '66005678',
                'country_id' => $kuwait->id,
                'state_id' => $kwHawalli->id,
                'city_id' => $kwHawalliCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],
            [
                'account_type' => 'doctor',
                'group_name' => 'Dr. Khaled Practice',
                'owner_name' => 'Dr. Khaled Mahmoud',
                'email' => 'khaled.mahmoud@doctor.eg',
                'password' => 'password123',
                'phone_country_code' => '+20',
                'phone_number' => '1001234567',
                'country_id' => $egypt->id,
                'state_id' => $egCairo->id,
                'city_id' => $egCairoCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Medical Center Accounts ────────────────────────────
            [
                'account_type' => 'medical_center',
                'group_name' => 'Dubai Health Center',
                'owner_name' => 'Dr. Mariam Al-Hashimi',
                'email' => 'info@dubaihealthcenter.ae',
                'password' => 'password123',
                'phone_country_code' => '+971',
                'phone_number' => '501234567',
                'country_id' => $uae->id,
                'state_id' => $uaeDubai->id,
                'city_id' => $uaeDubaiCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],
            [
                'account_type' => 'medical_center',
                'group_name' => 'Amman Specialized Center',
                'owner_name' => 'Dr. Rania Haddad',
                'email' => 'info@ammanspecialized.jo',
                'password' => 'password123',
                'phone_country_code' => '+962',
                'phone_number' => '791234567',
                'country_id' => $jordan->id,
                'state_id' => $joAmman->id,
                'city_id' => $joAmmanCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Nurse Accounts ─────────────────────────────────────
            [
                'account_type' => 'nurse',
                'group_name' => 'Nurse Sara Services',
                'owner_name' => 'Sara Al-Enezi',
                'email' => 'sara.enezi@nurse.kw',
                'password' => 'password123',
                'phone_country_code' => '+965',
                'phone_number' => '99887766',
                'country_id' => $kuwait->id,
                'state_id' => $kwAhmadi->id,
                'city_id' => $kwAhmadiCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Medical Lab Accounts ───────────────────────────────
            [
                'account_type' => 'medical_lab',
                'group_name' => 'Al Borg Laboratory',
                'owner_name' => 'Dr. Hassan Ibrahim',
                'email' => 'info@alborglab.sa',
                'password' => 'password123',
                'phone_country_code' => '+966',
                'phone_number' => '551234567',
                'country_id' => $saudi->id,
                'state_id' => $saEastern->id,
                'city_id' => $saDammam->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Pharmacy Accounts ──────────────────────────────────
            [
                'account_type' => 'pharmacy',
                'group_name' => 'Al Dawaa Pharmacy',
                'owner_name' => 'Dr. Yousef Al-Ghamdi',
                'email' => 'contact@aldawaa.sa',
                'password' => 'password123',
                'phone_country_code' => '+966',
                'phone_number' => '561234567',
                'country_id' => $saudi->id,
                'state_id' => $saMakkah->id,
                'city_id' => $saJeddah->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'approved',
            ],

            // ── Users in various statuses (for testing) ────────────
            [
                'account_type' => 'doctor',
                'group_name' => 'Dr. Omar Clinic',
                'owner_name' => 'Dr. Omar Farouq',
                'email' => 'omar.farouq@doctor.eg',
                'password' => 'password123',
                'phone_country_code' => '+20',
                'phone_number' => '1112345678',
                'country_id' => $egypt->id,
                'state_id' => $egCairo->id,
                'city_id' => $egCairoCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'under_review',
            ],
            [
                'account_type' => 'medical_center',
                'group_name' => 'Nile Medical Center',
                'owner_name' => 'Dr. Fatma Saeed',
                'email' => 'fatma@nilemedical.eg',
                'password' => 'password123',
                'phone_country_code' => '+20',
                'phone_number' => '1223456789',
                'country_id' => $egypt->id,
                'state_id' => $egCairo->id,
                'city_id' => $egCairoCity->id,
                'email_verified_at' => $now,
                'phone_verified_at' => null,
                'account_status' => 'pending_phone_verification',
            ],
            [
                'account_type' => 'pharmacy',
                'group_name' => 'Kuwait Pharma',
                'owner_name' => 'Ahmad Al-Dosari',
                'email' => 'ahmad@kuwaitpharma.kw',
                'password' => 'password123',
                'phone_country_code' => '+965',
                'phone_number' => '50112233',
                'country_id' => $kuwait->id,
                'state_id' => $kwCapital->id,
                'city_id' => $kwCity->id,
                'email_verified_at' => null,
                'phone_verified_at' => null,
                'account_status' => 'pending_email_verification',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
