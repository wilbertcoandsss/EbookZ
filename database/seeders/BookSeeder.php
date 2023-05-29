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
            'bookPoints' => 40000,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        Book::insert([
            'bookName' => "Cantik itu Luka",
            'bookAuthor' => "Eka Kurniawan",
            'bookPrice' => 90000,
            'bookStock' => 35,
            'ISBN' => "978-602-031-258-3",
            'bookDescription' => "The story revolves around the life of Dewi Ayu, a beautiful and enigmatic prostitute with a tragic past. Set in the fictional town of Halimunda, the narrative spans several decades, covering a turbulent period in Indonesian history from the Dutch colonial era to the Japanese occupation and the subsequent struggles for independence.",
            'bookPublishDate' => Carbon::parse('2018-01-17'),
            'bookPage' => 250,
            'bookCover' => "CantikItuLuka.jpg",
            'bookPdf' => "CantikItuLuka.pdf",
            'publisherID' => 2,
            'bookPoints' => 90000,
            'genreID' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

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
            'bookPoints' => 45000,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "A Dangerous Business",
            'bookAuthor' => "Jane Smiley",
            'bookPrice' => 150000,
            'bookStock' => 20,
            'ISBN' => " 978-052-552-033-7",
            'bookDescription' => "In 1850s Gold Rush California two young prostitutes, best friends Eliza and Jean, attempt to find their way in a lawless town on the fringes of the Wild West—a bewitching combination of beauty and danger—as what will become the Civil War looms on the horizon.
            “Everyone knows that this is a dangerous business, but between you and me, being a woman is a dangerous business, and don’t let anyone tell you otherwise...",
            'bookPublishDate' => Carbon::parse('2022-12-13'),
            'bookPage' => 304,
            'bookCover' => "Business.jpg",
            'bookPdf' => "Business.pdf",
            'publisherID' => 1,
            'bookPoints' => 50000,
            'genreID' => 2,
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
            'bookPoints' => 35000,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "The Stranger",
            'bookAuthor' => "Albert Camus",
            'bookPrice' => 80000,
            'bookStock' => 30,
            'ISBN' => " 978-067-972-020-1",
            'bookDescription' => "Published in 1942 by French author Albert Camus, The Stranger has long been considered a classic of twentieth-century literature. Le Monde ranks it as number one on its 100 Books of the Century list. Through this story of an ordinary man unwittingly drawn into a senseless murder on a sundrenched Algerian beach, Camus explores what he termed the nakedness of man faced with the absurd.",
            'bookPublishDate' => Carbon::parse('1942-05-19'),
            'bookPage' => 159,
            'bookCover' => "TheStranger.jpg",
            'bookPdf' => "TheStranger.pdf",
            'publisherID' => 4,
            'isDiscount' => TRUE,
            'bookPoints' => 75000,
            'genreID' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "The Plague",
            'bookAuthor' => "Albert Camus",
            'bookPrice' => 100000,
            'bookStock' => 30,
            'ISBN' => " 978-067-972-021-8",
            'bookDescription' => "The Plague is a novel about a plague epidemic in the large Algerian city of Oran. In April, thousands of rats stagger into the open and die. When a mild hysteria grips the population, the newspapers begin clamoring for action. The authorities finally arrange for the daily collection and cremation of the rats.",
            'bookPublishDate' => Carbon::parse('1947-06-10'),
            'bookPage' => 308,
            'bookCover' => "ThePlague.jpg",
            'bookPdf' => "TheStranger.pdf",
            'publisherID' => 4,
            'isDiscount' => 1,
            'bookPoints' => 80000,
            'genreID' => 6,
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
            'isDiscount' => TRUE,
            'publisherID' => 2,
            'bookPoints' => 50000,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "Ready Player One",
            'bookAuthor' => "Ernest Cline",
            'bookPrice' => 150000,
            'bookStock' => 30,
            'ISBN' => " 978-030-788-743-6",
            'bookDescription' => "Ready Player One is a 2011 science fiction novel, and the debut novel of American author Ernest Cline. The story, set in a dystopia in 2045, follows protagonist Wade Watts on his search for an Easter egg in a worldwide virtual reality game, the discovery of which would lead him to inherit the game creator's fortune.",
            'bookPublishDate' => Carbon::parse('2011-08-11'),
            'bookPage' => 310,
            'bookCover' => "ReadyPlayerOne.jpg",
            'bookPdf' => "ReadyPlayerOne.pdf",
            'publisherID' => 1,
            'bookPoints' => 100000,
            'genreID' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Book::insert([
            'bookName' => "This Time Tomorrow",
            'bookAuthor' => "Emma Straub",
            'bookPrice' => 80000,
            'bookStock' => 30,
            'ISBN' => "978-052-553-900-1",
            'bookDescription' => "In This Time Tomorrow, Alice Stern, faced with the imminent death of her beloved 73-year-old father, confronts her own stasis, stuck for years in the same tiny studio apartment and the same job in the admissions department of the Upper West Side Manhattan private school she attended decades earlier.",
            'bookPublishDate' => Carbon::parse('2022-05-17'),
            'bookPage' => 305,
            'bookCover' => "ThisTimeTomorrow.jpg",
            'bookPdf' => "ThisTimeTomorrow.pdf",
            'publisherID' => 1,
            'bookPoints' => 90000,
            'genreID' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        Book::insert([
            'bookName' => "Alice's Adventure in Wonderland",
            'bookAuthor' => "Lewis Carroll",
            'bookPrice' => 55000,
            'bookStock' => 30,
            'ISBN' => "978-048-627-543-7",
            'bookDescription' => "Alice's Adventures in Wonderland is an 1865 English novel by Lewis Carroll, a mathematics professor at Oxford University. It details the story of a young girl named Alice who falls through a rabbit hole into a fantasy world of anthropomorphic creatures. It is seen as an example of the literary nonsense genre.",
            'bookPublishDate' => Carbon::parse('1862-07-04'),
            'bookPage' => 104,
            'bookCover' => "Alice.jpg",
            'bookPdf' => "Alice.pdf",
            'publisherID' => 3,
            'bookPoints' => 50000,
            'genreID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
