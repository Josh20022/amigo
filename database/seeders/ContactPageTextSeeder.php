<?php

namespace Database\Seeders;

use App\Models\ContactpageText;
use Illuminate\Database\Seeder;
use App\Models\ContactpageStructure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactPageTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Maak een array met de namen van de velden in de contactpage_structure tabel.
        $fields = [
            'title', 'description', 'form_name', 'form_email', 'form_email_message', 
            'form_message', 'form_newsletter', 'form_submit', 'office_title', 'office_desc', 
            'phone_title', 'phone_desc', 'facebook_url', 'instagram_url', 'twitter_url', 'linkedin_url'
        ];

        $contactPageStructure = new ContactpageStructure();

        // Maak een nieuw ContactPageText record voor elk veld en wijs het ID toe aan het juiste veld in de contactpage_structure.
        foreach($fields as $field) {
            $contactPageText = ContactpageText::create([
                'text' => 'Sample text for ' . $field, // Je kan hier een relevante standaard tekst plaatsen.
                'section' => $field
            ]);

            $contactPageStructure->{$field . '_id'} = $contactPageText->id;
        }

        // Sla de nieuwe contactpage_structure op in de database.
        $contactPageStructure->save();
    }
}
