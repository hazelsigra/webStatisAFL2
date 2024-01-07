<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Menu::create([
            'id' => '1',
            'name' => 'Mango Delight Spread',
            'type' => 'Dessert',
            'description' => 'Indulge in the rich, velvety goodness of our Mango Delight Spread. Perfect for spreading on toast, crackers, or as a delightful addition to your favorite desserts.',
            'photo' => 'images/delightspread.jpeg'
        ]);

        \App\Models\Menu::create([
            'id' => '2',
            'name' => 'Sago Mango Smoothies',
            'type' => 'Drink',
            'description' => 'Experience the refreshing taste of our Sago Mango Smoothies. Packed with the natural sweetness of ripe mangoes and the unique texture of sago pearls, its a tropical delight in every sip.',
            'photo' => 'images/smoothies.jpeg'
        ]);

        \App\Models\Menu::create([
            'id' => '3',
            'name' => 'Mango Infused Sago Pudding',
            'type' => 'Dessert',
            'description' => 'Our Mango Infused Sago Pudding is a harmonious blend of creamy sago pudding infused with the essence of succulent mangoes. A dessert that transports you to the heart of the tropics.',
            'photo' => 'images/pudding.jpeg'
        ]);

        \App\Models\Menu::create([
            'id' => '4',
            'name' => 'Mango Sago Ice Cream',
            'type' => 'Dessert',
            'description' => 'Treat yourself to the creamy indulgence of our Mango Sago Ice Cream. Each scoop is a celebration of the tropical paradise, making it a favorite for mango lovers of all ages.',
            'photo' => 'images/icecream.jpeg'
        ]);
    }
}
