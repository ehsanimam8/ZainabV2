<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomField;

class CustomFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            // Student Profile fields
            [
                'name' => 'Quran Memorization Level',
                'entity' => 'Student Profile',
                'type' => 'Select',
                'options' => "Beginner\nIntermediate\nAdvanced\nHafidh",
                'visibility' => 'Optional',
                'show_on_profile' => true,
                'show_on_registration' => true,
            ],
            [
                'name' => 'Prior Islamic Institution',
                'entity' => 'Student Profile',
                'type' => 'Text',
                'options' => null,
                'visibility' => 'Optional',
                'show_on_profile' => true,
                'show_on_registration' => false,
            ],
            [
                'name' => 'Islamic Studies Background',
                'entity' => 'Student Profile',
                'type' => 'Textarea',
                'options' => null,
                'visibility' => 'Optional',
                'show_on_profile' => true,
                'show_on_registration' => true,
            ],
            [
                'name' => 'Country of Origin',
                'entity' => 'Student Profile',
                'type' => 'Select',
                'options' => "USA\nCanada\nUK\nOther",
                'visibility' => 'Required',
                'show_on_profile' => true,
                'show_on_registration' => true,
            ],
            [
                'name' => 'Admin Notes (Internal)',
                'entity' => 'Student Profile',
                'type' => 'Textarea',
                'options' => null,
                'visibility' => 'Admin Only',
                'show_on_profile' => true,
                'show_on_registration' => false,
            ],
            
            // Event Registration fields
            [
                'name' => 'Dietary Requirements',
                'entity' => 'Event Registration',
                'type' => 'Select',
                'options' => "None\nVegetarian\nVegan\nGluten-Free\nHalal only",
                'visibility' => 'Optional',
                'show_on_profile' => false,
                'show_on_registration' => false, // Only on events
            ],
            [
                'name' => 'Will You Bring Children?',
                'entity' => 'Event Registration',
                'type' => 'Checkbox',
                'options' => null,
                'visibility' => 'Optional',
                'show_on_profile' => false,
                'show_on_registration' => false, // Only on events
            ],
        ];

        foreach ($fields as $field) {
            CustomField::create($field);
        }
    }
}
