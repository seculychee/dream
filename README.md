**Általam készített állományok:** 

**Modelek:**<br>
app/Category.php<br>
app/CategoryUserData.php<br>
app/UserData.php

**Controllerek:**<br>
app/Http/Controller/CategoryController.php<br>
app/Http/Controller/UserDataController.php

**Kinézet:**<br>
resource/views/userdatas.blade.php<br>
resource/views/userdatas.blade.php<br>
resource/views/layouts - _teljes mappa_

**Nyelvi fájlok:** <br>
resource/lang/hu/category.php<br>
resource/lang/hu/userData.php<br>
resource/lang/hu/validation.php<br>
resource/lang/hu/pagination.php


**Adatbázis táblák és alap adatok:**<br>
database/migrations/2017_12_20_213117_create_categories_table.php<br>
database/migrations/2017_12_20_213155_create_user_datas_table.php

**Method irányítások:**<br>
routes/web.php

**Js:** <br>
public/js/allData.js



**Felhasznált anyagok:**<br>
Css Framework -> Semantic-Ui<br>
PHP Framework -> Laravel 5.5<br>
JQuery


**Telepítés lépései:** 

1. Composer letöltés:
https://getcomposer.org/

2. Ezután parancssorral a letöltött tesztfeladat 
mappájában a következő parancsot kell futtatni: 
`composer update`

3. ".env.example" fájl kiterjesztés módositása a következőre: ".env" 

4. Applikáció kulcs létrehozása parancssorból:
`php artisan key:generate`

5. ".env" fájl adatbázis csatlakoztatása:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=homestead<br>
DB_USERNAME=homestead<br>
DB_PASSWORD=homestead

6. Adatbázis feltöltése parancssorból:<br>
`php artisan migrate`


7. Az index.php fájl a public mappában található, ahonnan az oldal indítható.
