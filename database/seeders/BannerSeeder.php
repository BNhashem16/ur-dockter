<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title' => 'All your Medical Tests in One Place',
                'subtitle' => 'Find certified labs and book your tests instantly with trusted healthcare providers across the region.',
                'image_url' => '/images/banners/medical-tests-banner.png',
                'stats' => [
                    ['label' => 'Medical Labs', 'value' => '+28', 'icon' => 'lab'],
                    ['label' => 'Medical Tests', 'value' => '+500', 'icon' => 'test'],
                ],
                'action_text' => 'Learn more',
                'action_url' => '/medical-tests',
                'is_active' => true,
                'sort_order' => 1,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Book a Doctor Appointment',
                'subtitle' => 'Connect with top-rated doctors across all specialties. Video consultations and in-person visits available.',
                'image_url' => '/images/banners/doctor-appointment-banner.png',
                'stats' => [
                    ['label' => 'Doctors', 'value' => '+150', 'icon' => 'doctor'],
                    ['label' => 'Specialties', 'value' => '+40', 'icon' => 'specialty'],
                ],
                'action_text' => 'Find a doctor',
                'action_url' => '/doctors',
                'is_active' => true,
                'sort_order' => 2,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Your Pharmacy, Delivered',
                'subtitle' => 'Order prescriptions and over-the-counter medications from verified pharmacies with same-day delivery.',
                'image_url' => '/images/banners/pharmacy-delivery-banner.png',
                'stats' => [
                    ['label' => 'Pharmacies', 'value' => '+75', 'icon' => 'pharmacy'],
                    ['label' => 'Medications', 'value' => '+10K', 'icon' => 'medication'],
                ],
                'action_text' => 'Order now',
                'action_url' => '/pharmacies',
                'is_active' => true,
                'sort_order' => 3,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Home Nursing Services',
                'subtitle' => 'Professional nursing care at your doorstep. Post-operative care, elderly care, and routine check-ups.',
                'image_url' => '/images/banners/home-nursing-banner.png',
                'stats' => [
                    ['label' => 'Nurses', 'value' => '+60', 'icon' => 'nurse'],
                    ['label' => 'Services', 'value' => '+25', 'icon' => 'service'],
                ],
                'action_text' => 'Book a nurse',
                'action_url' => '/nursing',
                'is_active' => true,
                'sort_order' => 4,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Ramadan Health Check-up Offer',
                'subtitle' => 'Comprehensive health screening packages at special Ramadan prices. Valid for a limited time only.',
                'image_url' => '/images/banners/ramadan-offer-banner.png',
                'stats' => [
                    ['label' => 'Discount', 'value' => '30%', 'icon' => 'discount'],
                    ['label' => 'Packages', 'value' => '12', 'icon' => 'package'],
                ],
                'action_text' => 'View offers',
                'action_url' => '/offers/ramadan',
                'is_active' => true,
                'sort_order' => 5,
                'starts_at' => '2026-03-01 00:00:00',
                'ends_at' => '2026-04-30 23:59:59',
            ],
            [
                'title' => 'Medical Centers Near You',
                'subtitle' => 'Discover accredited medical centers in your area offering specialized treatments and consultations.',
                'image_url' => '/images/banners/medical-centers-banner.png',
                'stats' => [
                    ['label' => 'Centers', 'value' => '+35', 'icon' => 'center'],
                    ['label' => 'Cities', 'value' => '+20', 'icon' => 'city'],
                ],
                'action_text' => 'Explore',
                'action_url' => '/medical-centers',
                'is_active' => true,
                'sort_order' => 6,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Join Your Doctor as a Provider',
                'subtitle' => 'Register your practice, lab, or pharmacy and reach thousands of patients across the region.',
                'image_url' => '/images/banners/join-provider-banner.png',
                'stats' => [
                    ['label' => 'Providers', 'value' => '+200', 'icon' => 'provider'],
                    ['label' => 'Countries', 'value' => '23', 'icon' => 'country'],
                ],
                'action_text' => 'Register now',
                'action_url' => '/register',
                'is_active' => true,
                'sort_order' => 7,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Summer Wellness Campaign 2026',
                'subtitle' => 'Stay healthy this summer with free vitamin D tests and hydration consultations at partner labs.',
                'image_url' => '/images/banners/summer-wellness-banner.png',
                'stats' => [
                    ['label' => 'Free Tests', 'value' => '3', 'icon' => 'test'],
                    ['label' => 'Partner Labs', 'value' => '+15', 'icon' => 'lab'],
                ],
                'action_text' => 'Learn more',
                'action_url' => '/campaigns/summer-2026',
                'is_active' => false,
                'sort_order' => 8,
                'starts_at' => '2026-06-01 00:00:00',
                'ends_at' => '2026-08-31 23:59:59',
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
