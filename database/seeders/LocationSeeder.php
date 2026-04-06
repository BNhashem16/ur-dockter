<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $countryData) {
            $country = Country::create([
                'name' => $countryData['name'],
                'code' => $countryData['code'],
                'phone_code' => $countryData['phone_code'],
            ]);

            foreach ($countryData['states'] as $stateData) {
                $state = State::create([
                    'name' => $stateData['name'],
                    'country_id' => $country->id,
                ]);

                foreach ($stateData['cities'] as $cityName) {
                    City::create([
                        'name' => $cityName,
                        'state_id' => $state->id,
                    ]);
                }
            }
        }
    }

    private function getData(): array
    {
        return [

            // ── United States ──────────────────────────────────────────
            [
                'name' => 'United States',
                'code' => 'US',
                'phone_code' => '+1',
                'states' => [
                    ['name' => 'Alabama', 'cities' => ['Birmingham', 'Montgomery', 'Huntsville', 'Mobile']],
                    ['name' => 'Alaska', 'cities' => ['Anchorage', 'Fairbanks', 'Juneau']],
                    ['name' => 'Arizona', 'cities' => ['Phoenix', 'Tucson', 'Mesa', 'Scottsdale']],
                    ['name' => 'Arkansas', 'cities' => ['Little Rock', 'Fort Smith', 'Fayetteville']],
                    ['name' => 'California', 'cities' => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose', 'Sacramento', 'Fresno', 'Oakland']],
                    ['name' => 'Colorado', 'cities' => ['Denver', 'Colorado Springs', 'Aurora', 'Boulder']],
                    ['name' => 'Connecticut', 'cities' => ['Hartford', 'New Haven', 'Stamford', 'Bridgeport']],
                    ['name' => 'Delaware', 'cities' => ['Wilmington', 'Dover', 'Newark']],
                    ['name' => 'Florida', 'cities' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'Fort Lauderdale']],
                    ['name' => 'Georgia', 'cities' => ['Atlanta', 'Savannah', 'Augusta', 'Columbus']],
                    ['name' => 'Hawaii', 'cities' => ['Honolulu', 'Hilo', 'Kailua']],
                    ['name' => 'Idaho', 'cities' => ['Boise', 'Meridian', 'Nampa']],
                    ['name' => 'Illinois', 'cities' => ['Chicago', 'Springfield', 'Aurora', 'Naperville']],
                    ['name' => 'Indiana', 'cities' => ['Indianapolis', 'Fort Wayne', 'Evansville']],
                    ['name' => 'Iowa', 'cities' => ['Des Moines', 'Cedar Rapids', 'Davenport']],
                    ['name' => 'Kansas', 'cities' => ['Wichita', 'Overland Park', 'Kansas City', 'Topeka']],
                    ['name' => 'Kentucky', 'cities' => ['Louisville', 'Lexington', 'Bowling Green']],
                    ['name' => 'Louisiana', 'cities' => ['New Orleans', 'Baton Rouge', 'Shreveport']],
                    ['name' => 'Maine', 'cities' => ['Portland', 'Bangor', 'Lewiston']],
                    ['name' => 'Maryland', 'cities' => ['Baltimore', 'Annapolis', 'Rockville', 'Frederick']],
                    ['name' => 'Massachusetts', 'cities' => ['Boston', 'Cambridge', 'Worcester', 'Springfield']],
                    ['name' => 'Michigan', 'cities' => ['Detroit', 'Grand Rapids', 'Ann Arbor', 'Lansing']],
                    ['name' => 'Minnesota', 'cities' => ['Minneapolis', 'Saint Paul', 'Rochester', 'Duluth']],
                    ['name' => 'Mississippi', 'cities' => ['Jackson', 'Gulfport', 'Hattiesburg']],
                    ['name' => 'Missouri', 'cities' => ['Kansas City', 'Saint Louis', 'Springfield', 'Columbia']],
                    ['name' => 'Montana', 'cities' => ['Billings', 'Missoula', 'Great Falls']],
                    ['name' => 'Nebraska', 'cities' => ['Omaha', 'Lincoln', 'Bellevue']],
                    ['name' => 'Nevada', 'cities' => ['Las Vegas', 'Reno', 'Henderson']],
                    ['name' => 'New Hampshire', 'cities' => ['Manchester', 'Nashua', 'Concord']],
                    ['name' => 'New Jersey', 'cities' => ['Newark', 'Jersey City', 'Trenton', 'Paterson']],
                    ['name' => 'New Mexico', 'cities' => ['Albuquerque', 'Santa Fe', 'Las Cruces']],
                    ['name' => 'New York', 'cities' => ['New York City', 'Buffalo', 'Rochester', 'Albany', 'Syracuse']],
                    ['name' => 'North Carolina', 'cities' => ['Charlotte', 'Raleigh', 'Durham', 'Greensboro']],
                    ['name' => 'North Dakota', 'cities' => ['Fargo', 'Bismarck', 'Grand Forks']],
                    ['name' => 'Ohio', 'cities' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo']],
                    ['name' => 'Oklahoma', 'cities' => ['Oklahoma City', 'Tulsa', 'Norman']],
                    ['name' => 'Oregon', 'cities' => ['Portland', 'Salem', 'Eugene', 'Bend']],
                    ['name' => 'Pennsylvania', 'cities' => ['Philadelphia', 'Pittsburgh', 'Harrisburg', 'Allentown']],
                    ['name' => 'Rhode Island', 'cities' => ['Providence', 'Warwick', 'Cranston']],
                    ['name' => 'South Carolina', 'cities' => ['Charleston', 'Columbia', 'Greenville']],
                    ['name' => 'South Dakota', 'cities' => ['Sioux Falls', 'Rapid City', 'Aberdeen']],
                    ['name' => 'Tennessee', 'cities' => ['Nashville', 'Memphis', 'Knoxville', 'Chattanooga']],
                    ['name' => 'Texas', 'cities' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth', 'El Paso']],
                    ['name' => 'Utah', 'cities' => ['Salt Lake City', 'Provo', 'West Valley City', 'Ogden']],
                    ['name' => 'Vermont', 'cities' => ['Burlington', 'Montpelier', 'Rutland']],
                    ['name' => 'Virginia', 'cities' => ['Virginia Beach', 'Richmond', 'Norfolk', 'Arlington']],
                    ['name' => 'Washington', 'cities' => ['Seattle', 'Spokane', 'Tacoma', 'Bellevue']],
                    ['name' => 'West Virginia', 'cities' => ['Charleston', 'Huntington', 'Morgantown']],
                    ['name' => 'Wisconsin', 'cities' => ['Milwaukee', 'Madison', 'Green Bay']],
                    ['name' => 'Wyoming', 'cities' => ['Cheyenne', 'Casper', 'Laramie']],
                    ['name' => 'District of Columbia', 'cities' => ['Washington']],
                ],
            ],

            // ── Kuwait ─────────────────────────────────────────────────
            [
                'name' => 'Kuwait',
                'code' => 'KW',
                'phone_code' => '+965',
                'states' => [
                    ['name' => 'Al Asimah (Capital)', 'cities' => ['Kuwait City', 'Dasman', 'Sharq', 'Mirqab', 'Jibla', 'Sulaibikhat']],
                    ['name' => 'Hawalli', 'cities' => ['Hawalli', 'Salmiya', 'Jabriya', 'Mishref', 'Salwa', 'Bayan']],
                    ['name' => 'Farwaniya', 'cities' => ['Farwaniya', 'Khaitan', 'Jleeb Al-Shuyoukh', 'Abraq Khaytan', 'Abdullah Al-Mubarak']],
                    ['name' => 'Mubarak Al-Kabeer', 'cities' => ['Mubarak Al-Kabeer', 'Sabah Al-Salem', 'Al Qurain', 'Abu Fteira', 'Messila']],
                    ['name' => 'Ahmadi', 'cities' => ['Ahmadi', 'Mangaf', 'Fahaheel', 'Mahboula', 'Abu Halifa', 'Fintas']],
                    ['name' => 'Jahra', 'cities' => ['Jahra', 'Sulaibiya', 'Abdali', 'Saad Al Abdullah', 'Naseem']],
                ],
            ],

            // ── Saudi Arabia ───────────────────────────────────────────
            [
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'phone_code' => '+966',
                'states' => [
                    ['name' => 'Riyadh', 'cities' => ['Riyadh', 'Diriyah', 'Al Kharj', 'Dawadmi', 'Al Majmaah', 'Wadi Al-Dawasir']],
                    ['name' => 'Makkah', 'cities' => ['Makkah', 'Jeddah', 'Taif', 'Al Qunfudhah', 'Rabigh', 'Al Lith']],
                    ['name' => 'Madinah', 'cities' => ['Madinah', 'Yanbu', 'Al Ula', 'Badr', 'Khaybar']],
                    ['name' => 'Eastern Province', 'cities' => ['Dammam', 'Dhahran', 'Khobar', 'Jubail', 'Qatif', 'Hafar Al-Batin', 'Ras Tanura']],
                    ['name' => 'Qassim', 'cities' => ['Buraydah', 'Unayzah', 'Al Rass', 'Al Bukayriyah']],
                    ['name' => 'Asir', 'cities' => ['Abha', 'Khamis Mushait', 'Bisha', 'Al Namas']],
                    ['name' => 'Tabuk', 'cities' => ['Tabuk', 'Umluj', 'Duba', 'Haql']],
                    ['name' => 'Hail', 'cities' => ['Hail', 'Baqaa', 'Al Ghazalah']],
                    ['name' => 'Northern Borders', 'cities' => ['Arar', 'Rafha', 'Turaif']],
                    ['name' => 'Jazan', 'cities' => ['Jazan', 'Sabya', 'Abu Arish', 'Samtah']],
                    ['name' => 'Najran', 'cities' => ['Najran', 'Sharurah', 'Hubuna']],
                    ['name' => 'Al Bahah', 'cities' => ['Al Bahah', 'Baljurashi', 'Al Mandaq']],
                    ['name' => 'Al Jawf', 'cities' => ['Sakaka', 'Dumat Al Jandal', 'Qurayyat']],
                ],
            ],

            // ── United Arab Emirates ───────────────────────────────────
            [
                'name' => 'United Arab Emirates',
                'code' => 'AE',
                'phone_code' => '+971',
                'states' => [
                    ['name' => 'Abu Dhabi', 'cities' => ['Abu Dhabi', 'Al Ain', 'Madinat Zayed', 'Ruwais', 'Liwa']],
                    ['name' => 'Dubai', 'cities' => ['Dubai', 'Jebel Ali', 'Hatta']],
                    ['name' => 'Sharjah', 'cities' => ['Sharjah', 'Khor Fakkan', 'Kalba', 'Dibba Al-Hisn']],
                    ['name' => 'Ajman', 'cities' => ['Ajman', 'Manama', 'Masfout']],
                    ['name' => 'Umm Al Quwain', 'cities' => ['Umm Al Quwain', 'Falaj Al Mualla']],
                    ['name' => 'Ras Al Khaimah', 'cities' => ['Ras Al Khaimah', 'Al Jazirah Al Hamra', 'Digdaga']],
                    ['name' => 'Fujairah', 'cities' => ['Fujairah', 'Dibba Al-Fujairah', 'Masafi']],
                ],
            ],

            // ── Egypt ──────────────────────────────────────────────────
            [
                'name' => 'Egypt',
                'code' => 'EG',
                'phone_code' => '+20',
                'states' => [
                    ['name' => 'Cairo', 'cities' => ['Cairo', 'Helwan', 'Nasr City', 'Maadi', 'Heliopolis']],
                    ['name' => 'Giza', 'cities' => ['Giza', '6th of October City', 'Sheikh Zayed City', 'Dokki']],
                    ['name' => 'Alexandria', 'cities' => ['Alexandria', 'Borg El Arab', 'Abu Qir']],
                    ['name' => 'Qalyubia', 'cities' => ['Banha', 'Shubra El Kheima', 'Qalyub', 'Obour City']],
                    ['name' => 'Dakahlia', 'cities' => ['Mansoura', 'Talkha', 'Mit Ghamr', 'Aga']],
                    ['name' => 'Gharbia', 'cities' => ['Tanta', 'El Mahalla El Kubra', 'Kafr El Zayat', 'Zefta']],
                    ['name' => 'Sharqia', 'cities' => ['Zagazig', 'Belbeis', 'Abu Hammad', '10th of Ramadan City']],
                    ['name' => 'Monufia', 'cities' => ['Shibin El Kom', 'Menouf', 'Sadat City', 'Ashmoun']],
                    ['name' => 'Beheira', 'cities' => ['Damanhour', 'Kafr El Dawwar', 'Rashid', 'Edku']],
                    ['name' => 'Kafr El Sheikh', 'cities' => ['Kafr El Sheikh', 'Desouk', 'Baltim', 'Fuwwah']],
                    ['name' => 'Damietta', 'cities' => ['Damietta', 'New Damietta', 'Ras El Bar', 'Faraskur']],
                    ['name' => 'Port Said', 'cities' => ['Port Said', 'Port Fouad']],
                    ['name' => 'Ismailia', 'cities' => ['Ismailia', 'Fayed', 'Qantara']],
                    ['name' => 'Suez', 'cities' => ['Suez', 'Ain Sokhna']],
                    ['name' => 'Fayoum', 'cities' => ['Fayoum', 'Ibshaway', 'Tamiya']],
                    ['name' => 'Beni Suef', 'cities' => ['Beni Suef', 'El Wasta', 'Nasser']],
                    ['name' => 'Minya', 'cities' => ['Minya', 'Mallawi', 'Samalut', 'Abu Qurqas']],
                    ['name' => 'Assiut', 'cities' => ['Assiut', 'Manfalut', 'Abu Tig', 'El Quseyya']],
                    ['name' => 'Sohag', 'cities' => ['Sohag', 'Akhmim', 'Girga', 'Tahta']],
                    ['name' => 'Qena', 'cities' => ['Qena', 'Nag Hammadi', 'Qus', 'Dishna']],
                    ['name' => 'Luxor', 'cities' => ['Luxor', 'Esna', 'Armant']],
                    ['name' => 'Aswan', 'cities' => ['Aswan', 'Kom Ombo', 'Edfu', 'Abu Simbel']],
                    ['name' => 'Red Sea', 'cities' => ['Hurghada', 'Safaga', 'Marsa Alam', 'El Gouna']],
                    ['name' => 'New Valley', 'cities' => ['Kharga', 'Dakhla', 'Farafra']],
                    ['name' => 'Matrouh', 'cities' => ['Marsa Matrouh', 'Siwa', 'El Alamein']],
                    ['name' => 'North Sinai', 'cities' => ['El Arish', 'Bir al-Abed', 'Sheikh Zuweid']],
                    ['name' => 'South Sinai', 'cities' => ['Sharm El Sheikh', 'Dahab', 'Nuweiba', 'Taba', 'Saint Catherine']],
                ],
            ],

            // ── Jordan ─────────────────────────────────────────────────
            [
                'name' => 'Jordan',
                'code' => 'JO',
                'phone_code' => '+962',
                'states' => [
                    ['name' => 'Amman', 'cities' => ['Amman', 'Sahab', 'Marka', 'Abu Alanda']],
                    ['name' => 'Zarqa', 'cities' => ['Zarqa', 'Russeifa', 'Azraq']],
                    ['name' => 'Irbid', 'cities' => ['Irbid', 'Ramtha', 'Al Koura', 'Bani Kenanah']],
                    ['name' => 'Balqa', 'cities' => ['Salt', 'Ain Al-Basha', 'Deir Alla']],
                    ['name' => 'Mafraq', 'cities' => ['Mafraq', 'Ruwaished', 'Sabha']],
                    ['name' => 'Jerash', 'cities' => ['Jerash', 'Sakib', 'Burma']],
                    ['name' => 'Ajloun', 'cities' => ['Ajloun', 'Kufranjah', 'Anjara']],
                    ['name' => 'Madaba', 'cities' => ['Madaba', 'Dhiban']],
                    ['name' => 'Karak', 'cities' => ['Karak', 'Mutah', 'Tafila']],
                    ['name' => 'Tafilah', 'cities' => ['Tafilah', 'Buseira', 'Dana']],
                    ['name' => 'Maan', 'cities' => ['Maan', 'Wadi Musa (Petra)', 'Shobak']],
                    ['name' => 'Aqaba', 'cities' => ['Aqaba', 'Quweira']],
                ],
            ],

            // ── Iraq ───────────────────────────────────────────────────
            [
                'name' => 'Iraq',
                'code' => 'IQ',
                'phone_code' => '+964',
                'states' => [
                    ['name' => 'Baghdad', 'cities' => ['Baghdad', 'Abu Ghraib', 'Kadhimiya', 'Sadr City']],
                    ['name' => 'Basra', 'cities' => ['Basra', 'Umm Qasr', 'Fao', 'Zubayr']],
                    ['name' => 'Nineveh', 'cities' => ['Mosul', 'Tal Afar', 'Sinjar', 'Al-Hamdaniya']],
                    ['name' => 'Erbil', 'cities' => ['Erbil', 'Shaqlawa', 'Soran', 'Koya']],
                    ['name' => 'Sulaymaniyah', 'cities' => ['Sulaymaniyah', 'Halabja', 'Ranya', 'Dukan']],
                    ['name' => 'Duhok', 'cities' => ['Duhok', 'Zakho', 'Amedi', 'Semel']],
                    ['name' => 'Kirkuk', 'cities' => ['Kirkuk', 'Hawija', 'Dibis']],
                    ['name' => 'Najaf', 'cities' => ['Najaf', 'Kufa', 'Manathera']],
                    ['name' => 'Karbala', 'cities' => ['Karbala', 'Ain Al-Tamur', 'Hindiya']],
                    ['name' => 'Anbar', 'cities' => ['Ramadi', 'Fallujah', 'Heet', 'Haditha']],
                    ['name' => 'Saladin', 'cities' => ['Tikrit', 'Samarra', 'Baiji', 'Balad']],
                    ['name' => 'Diyala', 'cities' => ['Baqubah', 'Muqdadiyah', 'Khanaqin']],
                    ['name' => 'Wasit', 'cities' => ['Kut', 'Al-Hayy', 'Numaniyah']],
                    ['name' => 'Maysan', 'cities' => ['Amarah', 'Ali Al-Gharbi', 'Majar Al-Kabir']],
                    ['name' => 'Dhi Qar', 'cities' => ['Nasiriyah', 'Shatra', 'Suq Al-Shuyukh']],
                    ['name' => 'Muthanna', 'cities' => ['Samawah', 'Rumaitha', 'Khidhir']],
                    ['name' => 'Qadisiyyah', 'cities' => ['Diwaniyah', 'Afaq', 'Shamiyah']],
                    ['name' => 'Babil', 'cities' => ['Hillah', 'Musayyib', 'Mahawil', 'Hashimiyah']],
                ],
            ],

            // ── Bahrain ────────────────────────────────────────────────
            [
                'name' => 'Bahrain',
                'code' => 'BH',
                'phone_code' => '+973',
                'states' => [
                    ['name' => 'Capital', 'cities' => ['Manama', 'Juffair', 'Diplomatic Area', 'Seef']],
                    ['name' => 'Muharraq', 'cities' => ['Muharraq', 'Amwaj Islands', 'Busaiteen', 'Hidd']],
                    ['name' => 'Northern', 'cities' => ['Budaiya', 'Barbar', 'Diraz', 'Janabiyah', 'Saar']],
                    ['name' => 'Southern', 'cities' => ['Riffa', 'Isa Town', 'Hamad Town', 'Zallaq', 'Awali']],
                ],
            ],

            // ── Qatar ──────────────────────────────────────────────────
            [
                'name' => 'Qatar',
                'code' => 'QA',
                'phone_code' => '+974',
                'states' => [
                    ['name' => 'Doha', 'cities' => ['Doha', 'West Bay', 'The Pearl', 'Lusail']],
                    ['name' => 'Al Rayyan', 'cities' => ['Al Rayyan', 'Education City', 'Al Sheehaniya']],
                    ['name' => 'Al Wakrah', 'cities' => ['Al Wakrah', 'Mesaieed']],
                    ['name' => 'Al Khor', 'cities' => ['Al Khor', 'Al Thakhira']],
                    ['name' => 'Umm Salal', 'cities' => ['Umm Salal Muhammad', 'Umm Salal Ali']],
                    ['name' => 'Al Daayen', 'cities' => ['Lusail City', 'Simaisma']],
                    ['name' => 'Al Shamal', 'cities' => ['Madinat Al Shamal', 'Al Ruwais']],
                    ['name' => 'Al Shahaniya', 'cities' => ['Al Shahaniya', 'Dukhan']],
                ],
            ],

            // ── Oman ───────────────────────────────────────────────────
            [
                'name' => 'Oman',
                'code' => 'OM',
                'phone_code' => '+968',
                'states' => [
                    ['name' => 'Muscat', 'cities' => ['Muscat', 'Muttrah', 'Bawshar', 'Seeb', 'Amerat']],
                    ['name' => 'Dhofar', 'cities' => ['Salalah', 'Taqah', 'Mirbat', 'Raysut']],
                    ['name' => 'Al Batinah North', 'cities' => ['Sohar', 'Shinas', 'Liwa', 'Saham']],
                    ['name' => 'Al Batinah South', 'cities' => ['Rustaq', 'Al Musanaah', 'Barka', 'Nakhal']],
                    ['name' => 'Ad Dakhiliyah', 'cities' => ['Nizwa', 'Bahla', 'Adam', 'Al Hamra']],
                    ['name' => 'Ash Sharqiyah North', 'cities' => ['Ibra', 'Al Mudhaibi', 'Bidiyah', 'Wadi Bani Khalid']],
                    ['name' => 'Ash Sharqiyah South', 'cities' => ['Sur', 'Ja\'alan Bani Bu Ali', 'Masirah']],
                    ['name' => 'Al Dhahirah', 'cities' => ['Ibri', 'Yanqul', 'Dhank']],
                    ['name' => 'Al Buraimi', 'cities' => ['Al Buraimi', 'Mahdah', 'Al Sunainah']],
                    ['name' => 'Al Wusta', 'cities' => ['Haima', 'Duqm', 'Mahout']],
                    ['name' => 'Musandam', 'cities' => ['Khasab', 'Bukha', 'Dibba']],
                ],
            ],

            // ── Yemen ──────────────────────────────────────────────────
            [
                'name' => 'Yemen',
                'code' => 'YE',
                'phone_code' => '+967',
                'states' => [
                    ['name' => 'Sana\'a', 'cities' => ['Sana\'a', 'Old City']],
                    ['name' => 'Aden', 'cities' => ['Aden', 'Crater', 'Little Aden', 'Sheikh Othman']],
                    ['name' => 'Taiz', 'cities' => ['Taiz', 'Al Turbah', 'Mocha']],
                    ['name' => 'Al Hudaydah', 'cities' => ['Al Hudaydah', 'Bajil', 'Zabid', 'Beit Al Faqih']],
                    ['name' => 'Hadhramaut', 'cities' => ['Mukalla', 'Seiyun', 'Tarim', 'Shibam']],
                    ['name' => 'Ibb', 'cities' => ['Ibb', 'Jibla', 'Yareem']],
                    ['name' => 'Dhamar', 'cities' => ['Dhamar', 'Yarim']],
                    ['name' => 'Marib', 'cities' => ['Marib']],
                    ['name' => 'Amran', 'cities' => ['Amran', 'Hajjah']],
                    ['name' => 'Shabwah', 'cities' => ['Ataq', 'Habban']],
                    ['name' => 'Socotra', 'cities' => ['Hadibo']],
                ],
            ],

            // ── Lebanon ────────────────────────────────────────────────
            [
                'name' => 'Lebanon',
                'code' => 'LB',
                'phone_code' => '+961',
                'states' => [
                    ['name' => 'Beirut', 'cities' => ['Beirut', 'Hamra', 'Achrafieh', 'Verdun']],
                    ['name' => 'Mount Lebanon', 'cities' => ['Jounieh', 'Byblos', 'Aley', 'Baabda', 'Brummana', 'Metn']],
                    ['name' => 'North Lebanon', 'cities' => ['Tripoli', 'Bcharre', 'Batroun', 'Koura', 'Zgharta']],
                    ['name' => 'South Lebanon', 'cities' => ['Sidon', 'Tyre', 'Jezzine', 'Nabatieh']],
                    ['name' => 'Beqaa', 'cities' => ['Zahle', 'Baalbek', 'Chtaura', 'Hermel']],
                    ['name' => 'Akkar', 'cities' => ['Halba', 'Qoubaiyat', 'Bebnine']],
                    ['name' => 'Baalbek-Hermel', 'cities' => ['Baalbek', 'Hermel', 'Labweh']],
                    ['name' => 'Nabatieh', 'cities' => ['Nabatieh', 'Bint Jbeil', 'Marjayoun', 'Hasbaya']],
                ],
            ],

            // ── Syria ──────────────────────────────────────────────────
            [
                'name' => 'Syria',
                'code' => 'SY',
                'phone_code' => '+963',
                'states' => [
                    ['name' => 'Damascus', 'cities' => ['Damascus']],
                    ['name' => 'Rif Dimashq', 'cities' => ['Douma', 'Daraya', 'Jaramana', 'Sahnaya']],
                    ['name' => 'Aleppo', 'cities' => ['Aleppo', 'Manbij', 'Al-Bab', 'Azaz']],
                    ['name' => 'Homs', 'cities' => ['Homs', 'Palmyra', 'Al-Rastan', 'Talbiseh']],
                    ['name' => 'Hama', 'cities' => ['Hama', 'Masyaf', 'Salamiyah']],
                    ['name' => 'Latakia', 'cities' => ['Latakia', 'Jableh', 'Al-Haffah']],
                    ['name' => 'Tartous', 'cities' => ['Tartous', 'Baniyas', 'Safita', 'Duraykish']],
                    ['name' => 'Idlib', 'cities' => ['Idlib', 'Maarat al-Numan', 'Jisr al-Shughur']],
                    ['name' => 'Deir ez-Zor', 'cities' => ['Deir ez-Zor', 'Mayadin', 'Abu Kamal']],
                    ['name' => 'Al-Hasakah', 'cities' => ['Al-Hasakah', 'Qamishli', 'Ras al-Ain']],
                    ['name' => 'Raqqa', 'cities' => ['Raqqa', 'Tabqa', 'Tal Abyad']],
                    ['name' => 'Daraa', 'cities' => ['Daraa', 'Nawa', 'Jasim']],
                    ['name' => 'As-Suwayda', 'cities' => ['As-Suwayda', 'Shahba', 'Salkhad']],
                    ['name' => 'Quneitra', 'cities' => ['Quneitra']],
                ],
            ],

            // ── Palestine ──────────────────────────────────────────────
            [
                'name' => 'Palestine',
                'code' => 'PS',
                'phone_code' => '+970',
                'states' => [
                    ['name' => 'Jerusalem', 'cities' => ['Jerusalem', 'Abu Dis', 'Al-Ram']],
                    ['name' => 'Ramallah and Al-Bireh', 'cities' => ['Ramallah', 'Al-Bireh', 'Birzeit']],
                    ['name' => 'Nablus', 'cities' => ['Nablus', 'Huwwara', 'Balata']],
                    ['name' => 'Bethlehem', 'cities' => ['Bethlehem', 'Beit Jala', 'Beit Sahour']],
                    ['name' => 'Hebron', 'cities' => ['Hebron', 'Dura', 'Halhul', 'Yatta']],
                    ['name' => 'Jenin', 'cities' => ['Jenin', 'Qabatiya', 'Arraba']],
                    ['name' => 'Tulkarm', 'cities' => ['Tulkarm', 'Anabta', 'Bal\'a']],
                    ['name' => 'Qalqilya', 'cities' => ['Qalqilya', 'Azzun', 'Jayyous']],
                    ['name' => 'Tubas', 'cities' => ['Tubas', 'Tamoun', 'Aqqaba']],
                    ['name' => 'Salfit', 'cities' => ['Salfit', 'Deir Istiya', 'Bruqin']],
                    ['name' => 'Jericho', 'cities' => ['Jericho', 'Al-Auja']],
                    ['name' => 'Gaza', 'cities' => ['Gaza City', 'Jabalia', 'Beit Lahia']],
                    ['name' => 'Khan Yunis', 'cities' => ['Khan Yunis', 'Abasan']],
                    ['name' => 'Rafah', 'cities' => ['Rafah', 'Tal as-Sultan']],
                    ['name' => 'Deir al-Balah', 'cities' => ['Deir al-Balah', 'Al-Bureij', 'Al-Maghazi']],
                    ['name' => 'North Gaza', 'cities' => ['Jabalia', 'Beit Hanoun']],
                ],
            ],

            // ── Libya ──────────────────────────────────────────────────
            [
                'name' => 'Libya',
                'code' => 'LY',
                'phone_code' => '+218',
                'states' => [
                    ['name' => 'Tripoli', 'cities' => ['Tripoli', 'Tajura', 'Ain Zara', 'Janzour']],
                    ['name' => 'Benghazi', 'cities' => ['Benghazi', 'Suluq', 'Qaminis']],
                    ['name' => 'Misrata', 'cities' => ['Misrata', 'Bani Walid', 'Zliten']],
                    ['name' => 'Sabha', 'cities' => ['Sabha', 'Brak', 'Murzuq']],
                    ['name' => 'Zawiya', 'cities' => ['Zawiya', 'Sabratha', 'Surman']],
                    ['name' => 'Al Khums', 'cities' => ['Al Khums', 'Leptis Magna']],
                    ['name' => 'Derna', 'cities' => ['Derna', 'Al Bayda', 'Shahat']],
                    ['name' => 'Sirte', 'cities' => ['Sirte']],
                ],
            ],

            // ── Tunisia ────────────────────────────────────────────────
            [
                'name' => 'Tunisia',
                'code' => 'TN',
                'phone_code' => '+216',
                'states' => [
                    ['name' => 'Tunis', 'cities' => ['Tunis', 'Carthage', 'La Marsa', 'Sidi Bou Said']],
                    ['name' => 'Ariana', 'cities' => ['Ariana', 'Raoued', 'Soukra']],
                    ['name' => 'Ben Arous', 'cities' => ['Ben Arous', 'Hammam Lif', 'Rades', 'Ezzahra']],
                    ['name' => 'Manouba', 'cities' => ['Manouba', 'Den Den', 'Oued Ellil']],
                    ['name' => 'Sousse', 'cities' => ['Sousse', 'Msaken', 'Hammam Sousse', 'Enfidha']],
                    ['name' => 'Sfax', 'cities' => ['Sfax', 'Sakiet Ezzit', 'Sakiet Eddaier', 'Mahres']],
                    ['name' => 'Nabeul', 'cities' => ['Nabeul', 'Hammamet', 'Dar Chaabane', 'Kelibia']],
                    ['name' => 'Monastir', 'cities' => ['Monastir', 'Moknine', 'Ksar Hellal', 'Jemmal']],
                    ['name' => 'Kairouan', 'cities' => ['Kairouan', 'Sbikha', 'Haffouz']],
                    ['name' => 'Bizerte', 'cities' => ['Bizerte', 'Menzel Bourguiba', 'Mateur']],
                    ['name' => 'Gabès', 'cities' => ['Gabès', 'El Hamma', 'Mareth']],
                    ['name' => 'Medenine', 'cities' => ['Medenine', 'Djerba', 'Zarzis', 'Ben Guerdane']],
                    ['name' => 'Tozeur', 'cities' => ['Tozeur', 'Nefta', 'Degache']],
                    ['name' => 'Gafsa', 'cities' => ['Gafsa', 'Metlaoui', 'Redeyef']],
                    ['name' => 'Béja', 'cities' => ['Béja', 'Medjez el-Bab', 'Testour']],
                    ['name' => 'Jendouba', 'cities' => ['Jendouba', 'Tabarka', 'Ain Draham']],
                    ['name' => 'Kef', 'cities' => ['El Kef', 'Dahmani', 'Tajerouine']],
                    ['name' => 'Siliana', 'cities' => ['Siliana', 'Bou Arada', 'Gaafour']],
                    ['name' => 'Kasserine', 'cities' => ['Kasserine', 'Sbeitla', 'Thala']],
                    ['name' => 'Sidi Bouzid', 'cities' => ['Sidi Bouzid', 'Regueb', 'Meknassy']],
                    ['name' => 'Mahdia', 'cities' => ['Mahdia', 'El Jem', 'Ksour Essef']],
                    ['name' => 'Tataouine', 'cities' => ['Tataouine', 'Ghomrassen', 'Remada']],
                    ['name' => 'Kebili', 'cities' => ['Kebili', 'Douz', 'Souk Lahad']],
                    ['name' => 'Zaghouan', 'cities' => ['Zaghouan', 'Zriba', 'El Fahs']],
                ],
            ],

            // ── Algeria ────────────────────────────────────────────────
            [
                'name' => 'Algeria',
                'code' => 'DZ',
                'phone_code' => '+213',
                'states' => [
                    ['name' => 'Algiers', 'cities' => ['Algiers', 'Bab El Oued', 'Hussein Dey', 'Kouba', 'Bir Mourad Rais']],
                    ['name' => 'Oran', 'cities' => ['Oran', 'Ain El Turk', 'Es Senia', 'Bir El Djir']],
                    ['name' => 'Constantine', 'cities' => ['Constantine', 'El Khroub', 'Ain Smara', 'Hamma Bouziane']],
                    ['name' => 'Annaba', 'cities' => ['Annaba', 'El Bouni', 'Sidi Amar']],
                    ['name' => 'Blida', 'cities' => ['Blida', 'Boufarik', 'Bougara', 'Mouzaia']],
                    ['name' => 'Setif', 'cities' => ['Setif', 'El Eulma', 'Ain Oulmene', 'Ain Arnat']],
                    ['name' => 'Batna', 'cities' => ['Batna', 'Barika', 'Ain Touta', 'Merouana']],
                    ['name' => 'Tlemcen', 'cities' => ['Tlemcen', 'Maghnia', 'Ghazaouet', 'Remchi']],
                    ['name' => 'Tizi Ouzou', 'cities' => ['Tizi Ouzou', 'Azazga', 'Draa El Mizan', 'Ain El Hammam']],
                    ['name' => 'Bejaia', 'cities' => ['Bejaia', 'Akbou', 'El Kseur', 'Sidi Aich']],
                    ['name' => 'Djelfa', 'cities' => ['Djelfa', 'Ain Oussera', 'Messaad']],
                    ['name' => 'Biskra', 'cities' => ['Biskra', 'Tolga', 'Ouled Djellal', 'Sidi Okba']],
                    ['name' => 'Bechar', 'cities' => ['Bechar', 'Kenadsa', 'Abadla']],
                    ['name' => 'Ouargla', 'cities' => ['Ouargla', 'Hassi Messaoud', 'Touggourt', 'Ghardaia']],
                    ['name' => 'Ghardaia', 'cities' => ['Ghardaia', 'Metlili', 'Berriane', 'El Meniaa']],
                    ['name' => 'Adrar', 'cities' => ['Adrar', 'Timimoun', 'Reggane', 'In Salah']],
                    ['name' => 'Tamanrasset', 'cities' => ['Tamanrasset', 'In Guezzam', 'Ideles']],
                    ['name' => 'Skikda', 'cities' => ['Skikda', 'Azzaba', 'Collo', 'El Harrouch']],
                    ['name' => 'Jijel', 'cities' => ['Jijel', 'Taher', 'El Milia']],
                    ['name' => 'Mostaganem', 'cities' => ['Mostaganem', 'Ain Tedeles', 'Hassi Mameche']],
                ],
            ],

            // ── Morocco ────────────────────────────────────────────────
            [
                'name' => 'Morocco',
                'code' => 'MA',
                'phone_code' => '+212',
                'states' => [
                    ['name' => 'Casablanca-Settat', 'cities' => ['Casablanca', 'Mohammedia', 'Settat', 'Berrechid', 'El Jadida']],
                    ['name' => 'Rabat-Salé-Kénitra', 'cities' => ['Rabat', 'Salé', 'Kénitra', 'Témara', 'Skhirat']],
                    ['name' => 'Marrakech-Safi', 'cities' => ['Marrakech', 'Safi', 'Essaouira', 'El Kelaa des Sraghna']],
                    ['name' => 'Fès-Meknès', 'cities' => ['Fes', 'Meknes', 'Taza', 'Ifrane', 'Sefrou']],
                    ['name' => 'Tanger-Tétouan-Al Hoceima', 'cities' => ['Tangier', 'Tetouan', 'Al Hoceima', 'Larache', 'Chefchaouen']],
                    ['name' => 'Souss-Massa', 'cities' => ['Agadir', 'Inezgane', 'Taroudant', 'Tiznit']],
                    ['name' => 'Oriental', 'cities' => ['Oujda', 'Nador', 'Berkane', 'Taourirt']],
                    ['name' => 'Béni Mellal-Khénifra', 'cities' => ['Beni Mellal', 'Khouribga', 'Fquih Ben Salah', 'Khénifra']],
                    ['name' => 'Drâa-Tafilalet', 'cities' => ['Errachidia', 'Ouarzazate', 'Zagora', 'Tinghir']],
                    ['name' => 'Laâyoune-Sakia El Hamra', 'cities' => ['Laayoune', 'Boujdour', 'Tarfaya']],
                    ['name' => 'Guelmim-Oued Noun', 'cities' => ['Guelmim', 'Tan-Tan', 'Sidi Ifni']],
                    ['name' => 'Dakhla-Oued Ed-Dahab', 'cities' => ['Dakhla', 'Aousserd']],
                ],
            ],

            // ── Mauritania ─────────────────────────────────────────────
            [
                'name' => 'Mauritania',
                'code' => 'MR',
                'phone_code' => '+222',
                'states' => [
                    ['name' => 'Nouakchott-Ouest', 'cities' => ['Tevragh-Zeina', 'Ksar']],
                    ['name' => 'Nouakchott-Nord', 'cities' => ['Dar Naim', 'Teyarett']],
                    ['name' => 'Nouakchott-Sud', 'cities' => ['Arafat', 'El Mina', 'Riyadh']],
                    ['name' => 'Nouadhibou', 'cities' => ['Nouadhibou', 'Cansado']],
                    ['name' => 'Adrar', 'cities' => ['Atar', 'Chinguetti', 'Ouadane']],
                    ['name' => 'Assaba', 'cities' => ['Kiffa', 'Guerou']],
                    ['name' => 'Brakna', 'cities' => ['Aleg', 'Boghe']],
                    ['name' => 'Gorgol', 'cities' => ['Kaedi', 'Maghama']],
                    ['name' => 'Guidimaka', 'cities' => ['Selibabi', 'Ould Yenge']],
                    ['name' => 'Hodh Ech Chargui', 'cities' => ['Nema', 'Amourj', 'Bassikounou']],
                    ['name' => 'Hodh El Gharbi', 'cities' => ['Aioun el Atrouss', 'Tamchekett']],
                    ['name' => 'Inchiri', 'cities' => ['Akjoujt']],
                    ['name' => 'Tagant', 'cities' => ['Tidjikja', 'Moudjeria']],
                    ['name' => 'Tiris Zemmour', 'cities' => ['Zouerate', 'F\'Derik', 'Bir Moghrein']],
                    ['name' => 'Trarza', 'cities' => ['Rosso', 'Boutilimit', 'Mederdra']],
                ],
            ],

            // ── Sudan ──────────────────────────────────────────────────
            [
                'name' => 'Sudan',
                'code' => 'SD',
                'phone_code' => '+249',
                'states' => [
                    ['name' => 'Khartoum', 'cities' => ['Khartoum', 'Omdurman', 'Bahri (Khartoum North)', 'Soba']],
                    ['name' => 'Gezira', 'cities' => ['Wad Medani', 'Al Hasahisa', 'Al Managil']],
                    ['name' => 'Red Sea', 'cities' => ['Port Sudan', 'Suakin', 'Tokar']],
                    ['name' => 'North Kordofan', 'cities' => ['El-Obeid', 'Umm Ruwaba', 'Bara']],
                    ['name' => 'Kassala', 'cities' => ['Kassala', 'New Halfa', 'Aroma']],
                    ['name' => 'Gedaref', 'cities' => ['Gedaref', 'Al Fau', 'Gallabat']],
                    ['name' => 'White Nile', 'cities' => ['Kosti', 'Rabak', 'Ed Dueim']],
                    ['name' => 'Blue Nile', 'cities' => ['Ed Damazin', 'Roseires', 'Kurmuk']],
                    ['name' => 'Sennar', 'cities' => ['Sennar', 'Singa', 'Dinder']],
                    ['name' => 'Northern', 'cities' => ['Dongola', 'Merowe', 'Karima']],
                    ['name' => 'River Nile', 'cities' => ['Atbara', 'Shendi', 'Ed Damer']],
                    ['name' => 'North Darfur', 'cities' => ['El Fasher', 'Kutum', 'Kebkabiya']],
                    ['name' => 'South Darfur', 'cities' => ['Nyala', 'Ed Da\'ein', 'Kass']],
                    ['name' => 'West Darfur', 'cities' => ['El Geneina', 'Habila', 'Kulbus']],
                    ['name' => 'South Kordofan', 'cities' => ['Kadugli', 'Dilling', 'Abu Jubayha']],
                    ['name' => 'West Kordofan', 'cities' => ['El Fula', 'Muglad', 'Babanusa']],
                    ['name' => 'Central Darfur', 'cities' => ['Zalingei', 'Nertiti', 'Azum']],
                    ['name' => 'East Darfur', 'cities' => ['Ed Da\'ein', 'Abu Karinka', 'Adila']],
                ],
            ],

            // ── Somalia ────────────────────────────────────────────────
            [
                'name' => 'Somalia',
                'code' => 'SO',
                'phone_code' => '+252',
                'states' => [
                    ['name' => 'Banaadir', 'cities' => ['Mogadishu', 'Hodan', 'Hamar Weyne']],
                    ['name' => 'Woqooyi Galbeed', 'cities' => ['Hargeisa', 'Gabiley', 'Wajaale']],
                    ['name' => 'Bari', 'cities' => ['Bosaso', 'Qardho', 'Galkayo']],
                    ['name' => 'Nugaal', 'cities' => ['Garowe', 'Eyl', 'Burtinle']],
                    ['name' => 'Mudug', 'cities' => ['Galkayo', 'Hobyo', 'Adado']],
                    ['name' => 'Lower Shabelle', 'cities' => ['Marka', 'Afgooye', 'Brava']],
                    ['name' => 'Bay', 'cities' => ['Baidoa', 'Burhakaba', 'Dinsor']],
                    ['name' => 'Jubbaland', 'cities' => ['Kismayo', 'Jamaame', 'Bu\'aale']],
                    ['name' => 'Togdheer', 'cities' => ['Burao', 'Odweyne', 'Sheikh']],
                    ['name' => 'Sanaag', 'cities' => ['Erigavo', 'Ceel Afweyn', 'Las Qoray']],
                    ['name' => 'Sool', 'cities' => ['Las Anod', 'Taleh', 'Ainabo']],
                    ['name' => 'Awdal', 'cities' => ['Borama', 'Zeila', 'Lughaya']],
                ],
            ],

            // ── Djibouti ───────────────────────────────────────────────
            [
                'name' => 'Djibouti',
                'code' => 'DJ',
                'phone_code' => '+253',
                'states' => [
                    ['name' => 'Djibouti', 'cities' => ['Djibouti City', 'Arta']],
                    ['name' => 'Ali Sabieh', 'cities' => ['Ali Sabieh', 'Ali Adde']],
                    ['name' => 'Dikhil', 'cities' => ['Dikhil', 'As Eyla']],
                    ['name' => 'Tadjoura', 'cities' => ['Tadjoura', 'Obock']],
                    ['name' => 'Obock', 'cities' => ['Obock']],
                ],
            ],

            // ── Comoros ────────────────────────────────────────────────
            [
                'name' => 'Comoros',
                'code' => 'KM',
                'phone_code' => '+269',
                'states' => [
                    ['name' => 'Grande Comore (Ngazidja)', 'cities' => ['Moroni', 'Mitsamiouli', 'Mbeni', 'Fomboni']],
                    ['name' => 'Anjouan (Ndzuwani)', 'cities' => ['Mutsamudu', 'Domoni', 'Sima']],
                    ['name' => 'Mohéli (Mwali)', 'cities' => ['Fomboni', 'Nioumachoua', 'Wanani']],
                ],
            ],

        ];
    }
}
