## Penjelasan Project

Project ini dibuat dengan menggunakan laravel versi 8.75. Pada project ini terdapat sebuah admin panel dengan memakai template dari stisla. Selain dalam bentuk web data yang dilakukan crud juga bisa dilakukan melalui api yang sudah dilengkapi juga dengan jwt

## Desain Database

![image](https://user-images.githubusercontent.com/71616287/213870615-ca4f915b-98a1-4141-8b03-f0eb8b5101ed.png)

Pada desain diatas terdapat sebuah relasi one to many dari tabel categories ke tabel foods, yang berarti 1 kategori dapat mempunyai banyak makanan sedangkan 1 makanan hanya bisa mempunyai 1 kategori

## Screenshot aplikasi

![image](https://user-images.githubusercontent.com/71616287/213870750-85960db4-e430-47cc-a880-c957bc6b36ea.png) ![image](https://user-images.githubusercontent.com/71616287/213870902-49a63226-ca40-4cda-b0da-d6c3332a7b86.png) ![image](https://user-images.githubusercontent.com/71616287/213870934-7b0927dc-bd9e-41e1-9be7-95cda868e08a.png)
![image](https://user-images.githubusercontent.com/71616287/213870963-9173f728-362e-404e-b926-b5b806a0b0d8.png)

 ## Depedency
 https://realrashid.github.io/sweet-alert/install
 
 https://github.com/PHP-Open-Source-Saver/jwt-auth

## Installation
1. Clone atau download project ini
2. Jalankan perintah composer install untuk menginstall laravel dan beberapa depedency yang dibutuhkan
   ```bash
    composer install
    ```
3. Copy .env agar bisa melakukan generate key
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Atur database pada file .env
   ```bash
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Lakukan migrate database
    ```bash
    php artisan migrate
    ```
    
6. Jalankan perintah db:seed untuk menjalankan seedernya
    ```bash
    php artisan db:seed
    ```

7. Jalankan php artisan serve untuk membuka web
    ```bash
    php artisan serve
    ```
