## Backend Test DOT Indonesia

Berikut langkah-langkah untuk menjalankan project :

1. Klon repositori
2. Buat file dari mengkopi .env.example menjadi .env
3. Buat database
4. Isikan file .env untuk nama database, user dan passwordnya
5. Jalankan perintah terminal : >_ php artisan migrate
6. Jalankan perintah terminal : >_ php artisan db:seed
7. Jalankan perintah terminal : >_ php artisan passport:install

Pertanyaan :

1. Struktur Data & Logika
- Jawaban pada : base_url/soal1
- Source code pada : TestController@dataStructure

2. Sprint 1
- API provinces : base_url/api/search/provinces?id={province_id}
- API cities : base_url/api/search/cities?id={city_id}

3. Sprint 2
- API login : base_url/api/login
- API user authenticated = base_url/api/user