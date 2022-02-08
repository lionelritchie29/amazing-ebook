<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Ebook;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Ebook::create([
            'title' => 'Red Rising',
            'author' => 'Pierce Brown',
            'description' => 'Red Rising is a 2014 dystopian science fiction novel by American author Pierce Brown, and the first book and eponym of a series. The novel, set on a future planet Mars, follows lowborn miner Darrow as he infiltrates the ranks of the elite Golds. Red Rising has received generally positive reviews.'
        ]);

        Ebook::create([
            'title' => 'Golden Son',
            'author' => 'Pierce Brown',
            'description' => 'Golden Son is a 2015 science fiction novel by American author Pierce Brown, the second in his Red Rising trilogy. The sequel to 2014`s Red Rising, Golden Son continues to follow lowborn Darrow`s plan to destroy the Society from within.'
        ]);

        Ebook::create([
            'title' => 'Sapiens: A Brief History of Humankind',
            'author' => 'Yuval Noah Harari',
            'description' => 'Sapiens: A Brief History of Humankind is a book by Yuval Noah Harari, first published in Hebrew in Israel in 2011 based on a series of lectures Harari taught at The Hebrew University of Jerusalem, and in English in 2014.'
        ]);

        Ebook::create([
            'title' => 'Why We Sleep: The New Science of Sleep and Dreams',
            'author' => 'Matthew Walker',
            'description' => 'Why We Sleep’: The New Science of Sleep and Dreams is a popular science book about sleep by the neuroscientist and sleep researcher, Matthew Walker. Walker is a professor of neuroscience and psychology and the director of the Center for Human Sleep Science at the University of California, Berkeley.'
        ]);

        Ebook::create([
            'title' => 'Romancing Romance',
            'author' => 'Emily Henry',
            'description' => '`A gorgeous romance` BETH O`LEARY, The Flatshare`Our generation`s answer to Nora Ephron` SOPHIE COUSENS, This Time Next Year`So warm and funny` PAIGE TOON, The Minute I Saw You`A pitch-perfect balance'
        ]);

        Ebook::create([
            'title' => 'Love from 10000ft.',
            'author' => 'Colleen Hoover',
            'description' => 'From Colleen Hoover, the #1 New York Times bestselling author of It Ends With UsATTRACTION AT FIRST SIGHT CAN BE MESSY... When Tate Collins finds airline pilot Miles Archer passed out in front of her apartment door, it is definitely not love at first sight'
        ]);

        Ebook::create([
            'title' => 'Pet Sematary',
            'author' => 'Stephen King',
            'description' => 'Pet Sematary is a 1983 horror novel by American writer Stephen King. The novel was nominated for a World Fantasy Award for Best Novel in 1986, and adapted into two films: one in 1989 and another in 2019. In November 2013, PS Publishing released Pet Sematary in a limited 30th-anniversary edition.'
        ]);

        Ebook::create([
            'title' => 'Psychology of Money',
            'author' => 'Morgan Housel',
            'description' => 'Doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people.Money—investing, personal finance, and business decisions—is typically taught as a math-based field, where data and formulas tell us exactly what to do'
        ]);

        Ebook::create([
            'author' => 'Awesome Person',
            'title' => 'The Oxford English Dictionary',
            'description' => 'The Oxford English Dictionary is the principal historical dictionary of the English language, published by Oxford University Press.'
        ]);

        Ebook::create([
            'author' => 'Margartia Alcantara',
            'title' => 'Chakra Healing',
            'description' => 'Within all living beings are seven powerful centers of energy called chakras. Every chakra holds the potential for immense healing and restoration, and Chakra Healing can show you how to harness that power with a wide range of simple, beginner-friendly exercises that anyone can do.'
        ]);

        Role::create(['role_desc' => 'Admin']);
        Role::create(['role_desc' => 'User']);
        Gender::create(['gender_desc' => 'Male']);
        Gender::create(['gender_desc' => 'Female']);

        Account::create([
            'account_id' => uniqid(), 
            'role_id' => 1, 
            'gender_id' => 1, 
            'first_name' => 'Lionel', 
            'last_name' => 'Ritchie', 
            'middle_name' => '', 
            'email' => 'lionel.ritchie@yahoo.com', 
            'password' => hash('md5', 'lionel123'), 
            'display_picture_link' => 'default.jpg', 
            'modified_at' => null, 
            'modified_by' => null
        ]);

        Account::create([
            'account_id' => uniqid(), 
            'role_id' => 2, 
            'gender_id' => 2, 
            'first_name' => 'Marin', 
            'last_name' => 'Eisenberg', 
            'middle_name' => '', 
            'email' => 'marin@yahoo.com', 
            'password' => hash('md5', 'marin123'),
            'display_picture_link' => 'default.jpg', 
            'modified_at' => null, 
            'modified_by' => null
        ]);
    }
}
