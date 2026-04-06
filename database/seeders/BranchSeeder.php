<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        // ── Al Salam Medical Group (Business, Kuwait) ─────────────
        $user1 = User::where('email', 'fahad@alsalammedical.com')->first();
        $kuwait = Country::where('code', 'KW')->first();
        $kwCapital = State::where('name', 'Al Asimah (Capital)')->where('country_id', $kuwait->id)->first();
        $kwCapitalCity = City::where('state_id', $kwCapital->id)->first();
        $kwHawalli = State::where('name', 'Hawalli')->where('country_id', $kuwait->id)->first();
        $kwHawalliCity = City::where('state_id', $kwHawalli->id)->first();

        $user1->branches()->createMany([
            [
                'name' => 'Al Salam Medical Center - Main',
                'type' => 'medical_center',
                'country_id' => $kuwait->id,
                'state_id' => $kwCapital->id,
                'city_id' => $kwCapitalCity->id,
                'street_address' => 'Salem Al-Mubarak Street',
                'building_name' => 'Al Salam Tower',
                'floor' => '3',
                'apartment' => '301',
            ],
            [
                'name' => 'Al Salam Lab - Hawalli',
                'type' => 'lab',
                'country_id' => $kuwait->id,
                'state_id' => $kwHawalli->id,
                'city_id' => $kwHawalliCity->id,
                'street_address' => 'Tunis Street',
                'building_name' => 'Al Mohandeseen Complex',
                'floor' => '1',
                'apartment' => '102',
            ],
            [
                'name' => 'Al Salam Pharmacy - Capital',
                'type' => 'pharmacy',
                'country_id' => $kuwait->id,
                'state_id' => $kwCapital->id,
                'city_id' => $kwCapitalCity->id,
                'street_address' => 'Fahad Al-Salem Street',
                'building_name' => 'Gulf Mall',
                'floor' => 'G',
                'apartment' => '15',
            ],
        ]);

        // ── Riyadh Healthcare Holdings (Business, Saudi) ──────────
        $user2 = User::where('email', 'abdullah@riyadhhealth.sa')->first();
        $saudi = Country::where('code', 'SA')->first();
        $saRiyadh = State::where('name', 'Riyadh')->where('country_id', $saudi->id)->first();
        $saRiyadhCity = City::where('name', 'Riyadh')->where('state_id', $saRiyadh->id)->first();
        $saEastern = State::where('name', 'Eastern Province')->where('country_id', $saudi->id)->first();
        $saDammam = City::where('name', 'Dammam')->where('state_id', $saEastern->id)->first();

        $user2->branches()->createMany([
            [
                'name' => 'Mogam Elemamn (Medical Center)',
                'type' => 'medical_center',
                'country_id' => $saudi->id,
                'state_id' => $saRiyadh->id,
                'city_id' => $saRiyadhCity->id,
                'street_address' => 'King Fahd Road',
                'building_name' => 'Al Mamlaka Tower',
                'floor' => '12',
                'apartment' => '16',
            ],
            [
                'name' => 'Mogam Elemamn (Lab)',
                'type' => 'lab',
                'country_id' => $saudi->id,
                'state_id' => $saRiyadh->id,
                'city_id' => $saRiyadhCity->id,
                'street_address' => 'King Fahd Road',
                'building_name' => 'Al Mamlaka Tower',
                'floor' => '12',
                'apartment' => '16',
            ],
            [
                'name' => 'Riyadh Healthcare - Dammam Branch',
                'type' => 'medical_center',
                'country_id' => $saudi->id,
                'state_id' => $saEastern->id,
                'city_id' => $saDammam->id,
                'street_address' => 'Prince Mohammed Street',
                'building_name' => 'Al Shatea Center',
                'floor' => '2',
                'apartment' => '205',
            ],
        ]);

        // ── Dubai Health Center (Medical Center, UAE) ─────────────
        $user3 = User::where('email', 'info@dubaihealthcenter.ae')->first();
        $uae = Country::where('code', 'AE')->first();
        $uaeDubai = State::where('name', 'Dubai')->where('country_id', $uae->id)->first();
        $uaeDubaiCity = City::where('state_id', $uaeDubai->id)->first();
        $uaeAbuDhabi = State::where('name', 'Abu Dhabi')->where('country_id', $uae->id)->first();
        $uaeAbuDhabiCity = City::where('state_id', $uaeAbuDhabi->id)->first();

        $user3->branches()->createMany([
            [
                'name' => 'Dubai Health Center - Main',
                'type' => 'medical_center',
                'country_id' => $uae->id,
                'state_id' => $uaeDubai->id,
                'city_id' => $uaeDubaiCity->id,
                'street_address' => 'Al Wasl Road',
                'building_name' => 'Dubai Medical Hub',
                'floor' => '5',
                'apartment' => '501',
            ],
            [
                'name' => 'Dubai Health Center - Abu Dhabi',
                'type' => 'clinic',
                'country_id' => $uae->id,
                'state_id' => $uaeAbuDhabi->id,
                'city_id' => $uaeAbuDhabiCity->id,
                'street_address' => 'Hamdan Street',
                'building_name' => 'Al Noor Tower',
                'floor' => '8',
                'apartment' => '803',
            ],
        ]);

        // ── Al Borg Laboratory (Medical Lab, Saudi) ───────────────
        $user4 = User::where('email', 'info@alborglab.sa')->first();

        $user4->branches()->createMany([
            [
                'name' => 'Al Borg Lab - Dammam Main',
                'type' => 'lab',
                'country_id' => $saudi->id,
                'state_id' => $saEastern->id,
                'city_id' => $saDammam->id,
                'street_address' => 'King Saud Street',
                'building_name' => 'Al Borg Medical Complex',
                'floor' => '1',
                'apartment' => null,
            ],
            [
                'name' => 'Al Borg Lab - Riyadh',
                'type' => 'lab',
                'country_id' => $saudi->id,
                'state_id' => $saRiyadh->id,
                'city_id' => $saRiyadhCity->id,
                'street_address' => 'Olaya Street',
                'building_name' => 'Al Faisaliah Tower',
                'floor' => '2',
                'apartment' => '210',
            ],
        ]);

        // ── Al Dawaa Pharmacy (Pharmacy, Saudi) ───────────────────
        $user5 = User::where('email', 'contact@aldawaa.sa')->first();
        $saMakkah = State::where('name', 'Makkah')->where('country_id', $saudi->id)->first();
        $saJeddah = City::where('name', 'Jeddah')->where('state_id', $saMakkah->id)->first();

        $user5->branches()->createMany([
            [
                'name' => 'Al Dawaa - Jeddah Main',
                'type' => 'pharmacy',
                'country_id' => $saudi->id,
                'state_id' => $saMakkah->id,
                'city_id' => $saJeddah->id,
                'street_address' => 'Tahlia Street',
                'building_name' => 'Al Andalus Mall',
                'floor' => 'G',
                'apartment' => '7',
            ],
            [
                'name' => 'Al Dawaa - Riyadh',
                'type' => 'pharmacy',
                'country_id' => $saudi->id,
                'state_id' => $saRiyadh->id,
                'city_id' => $saRiyadhCity->id,
                'street_address' => 'King Abdullah Road',
                'building_name' => 'Panorama Mall',
                'floor' => 'G',
                'apartment' => '22',
            ],
        ]);

        // ── Dr. Nora Clinic (Doctor, Kuwait) ──────────────────────
        $user6 = User::where('email', 'nora@drnora.com')->first();

        $user6->branches()->create([
            'name' => 'Dr. Nora Clinic - Hawalli',
            'type' => 'clinic',
            'country_id' => $kuwait->id,
            'state_id' => $kwHawalli->id,
            'city_id' => $kwHawalliCity->id,
            'street_address' => 'Beirut Street',
            'building_name' => 'Medical Tower',
            'floor' => '4',
            'apartment' => '402',
        ]);

        // ── Amman Specialized Center (Medical Center, Jordan) ─────
        $user7 = User::where('email', 'info@ammanspecialized.jo')->first();
        $jordan = Country::where('code', 'JO')->first();
        $joAmman = State::where('name', 'Amman')->where('country_id', $jordan->id)->first();
        $joAmmanCity = City::where('name', 'Amman')->where('state_id', $joAmman->id)->first();

        $user7->branches()->createMany([
            [
                'name' => 'Amman Specialized - Main Branch',
                'type' => 'medical_center',
                'country_id' => $jordan->id,
                'state_id' => $joAmman->id,
                'city_id' => $joAmmanCity->id,
                'street_address' => 'Queen Rania Street',
                'building_name' => 'Medical City Complex',
                'floor' => '6',
                'apartment' => '601',
            ],
            [
                'name' => 'Amman Specialized - Lab',
                'type' => 'lab',
                'country_id' => $jordan->id,
                'state_id' => $joAmman->id,
                'city_id' => $joAmmanCity->id,
                'street_address' => 'Queen Rania Street',
                'building_name' => 'Medical City Complex',
                'floor' => '1',
                'apartment' => '105',
            ],
        ]);
    }
}
