<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Book::insert([
            'bookName' => "Bumi",
            'bookAuthor' => "Tere Liye",
            'bookPrice' => 85000,
            'bookStock' => 50,
            'ISBN' => "978-602-03-0112-9",
            'bookDescription' => "The novel explores the life of a young man named Bumi, who is on a quest to find his purpose in life. The story takes place in the beautiful city of Bandung, Indonesia, and showcases the richness of the Indonesian culture, customs, and traditions.",
            'bookPublishDate' => Carbon::parse('2014-01-16'),
            'bookPage' => 440,
            'bookCover' => "Bumi.jpg",
            'bookPdf' => "Bumi.pdf",
            'isDiscount' => TRUE,
            'publisherID' => 2,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "Bulan",
            'bookAuthor' => "Tere Liye",
            'bookPrice' => 85000,
            'bookStock' => 50,
            'ISBN' => "978-602-03-3294-9",
            'bookDescription' => "The novel tells the story of two teenagers, Bulan and Keira, who come from very different backgrounds but share a passion for music. As they navigate the challenges of growing up and pursuing their dreams, they also grapple with issues of identity, family, and social class. Set against the backdrop of the vibrant music scene in Jakarta, Bulan is a coming-of-age story that explores the universal themes of love, friendship, and self-discovery.",
            'bookPublishDate' => Carbon::parse('2015-01-16'),
            'bookPage' => 440,
            'bookCover' => "Bulan.jpg",
            'bookPdf' => "Bulan.pdf",
            'publisherID' => 2,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "Matahari",
            'bookAuthor' => "Tere Liye",
            'bookPrice' => 80000,
            'bookStock' => 50,
            'ISBN' => "978-602-033-211-6",
            'bookDescription' => "The novel tells the story of two sisters, Ani and Nia, who live in a small village in Indonesia. Ani is blind, and Nia takes care of her, but their lives are changed forever when a solar eclipse occurs, and Ani miraculously regains her sight. The sisters set out on a journey to discover the meaning behind Ani's newfound ability and the strange visions that accompany it. Along the way, they encounter a variety of characters and face numerous challenges that test their strength and faith. Matahari is a heartwarming and thought-provoking story about the power of hope, love, and the human spirit.",
            'bookPublishDate' => Carbon::parse('2016-07-25'),
            'bookPage' => 390,
            'bookCover' => "Matahari.jpg",
            'bookPdf' => "Matahari.pdf",
            'publisherID' => 2,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "Bintang",
            'bookAuthor' => "Tere Liye",
            'bookPrice' => 80000,
            'bookStock' => 50,
            'ISBN' => "978-602-035-117-9",
            'bookDescription' => "The novel tells the story of a young boy named Bintang who lives in a small village in Indonesia. Bintang dreams of becoming a professional soccer player and idolizes his favorite player, Cristiano Ronaldo. However, his family's poverty and his father's disapproval make it difficult for him to pursue his passion. Bintang faces many challenges as he works towards his goal, including discrimination, jealousy, and personal tragedy. The novel explores themes of perseverance, determination, and the pursuit of dreams, as well as the importance of family and community support. Bintang is an inspiring and uplifting story that will resonate with readers of all ages.",
            'bookPublishDate' => Carbon::parse('2017-06-12'),
            'bookPage' => 392,
            'bookCover' => "Bintang.jpg",
            'bookPdf' => "Bintang.pdf",
            'publisherID' => 2,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
