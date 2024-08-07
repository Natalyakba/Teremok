<?php

require_once 'config/connect.php';

$name_character = mysqli_query($connect, "SELECT name_character FROM `characters`");
$name_character = mysqli_fetch_all($name_character); //получаем все мероприятия этого типа, который передан из меню

$description_character = mysqli_query($connect, "SELECT description_character FROM `characters`");
$description_character = mysqli_fetch_all($description_character);

$shortname = mysqli_query($connect, "SELECT name_shortname FROM `shortnames`");
$shortname = mysqli_fetch_all($shortname);

$quote1 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 1");
$quote1 = mysqli_fetch_all($quote1);

$quote2 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 2");
$quote2 = mysqli_fetch_all($quote2);

$quote3 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 3");
$quote3 = mysqli_fetch_all($quote3);

$quote4 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 4");
$quote4 = mysqli_fetch_all($quote4);

$quote5 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 5");
$quote5 = mysqli_fetch_all($quote5);

$quote6 = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE id_character = 6");
$quote6 = mysqli_fetch_all($quote6);

$weather = mysqli_query($connect, "SELECT description_weather FROM `weather`");
$weather = mysqli_fetch_all($weather);


$room = mysqli_query($connect, "SELECT * FROM `rooms`");
$room = mysqli_fetch_all($room);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Сказка "Теремок"</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
   <header class="header">
      <p><a href="https://ru.wikipedia.org/wiki/%D0%A2%D0%B5%D1%80%D0%B5%D0%BC%D0%BE%D0%BA_(%D1%81%D0%BA%D0%B0%D0%B7%D0%BA%D0%B0)" target="_blank">Сказка
            "ТЕРЕМОК"</a></p>
      <div><button id="toggleButton"><i class="fas fa-play"></i></button></div>
   </header>

   <audio id="music" src="music/11 Storm in a Teacup.mp3" preload="auto"></audio>

   <div class="container">
      <div class="content">
         <div class="par">
            <span class="text">Стоит в поле </span>
            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok00.jpg" alt=""></div>
            <span class="text">

               Бежит мимо
               <div class="container_hov">
                  <span class="hover-trigger animal name1"><?= $name_character[0][0] ?></span>
                  <div class="image">
                     <img src="image/mouse.png" alt="Изображение">
                  </div>
               </div>
               <?= $description_character[0][0] ?>
               <?= $weather[0][0] ?>
               Увидела <?= $name_character[0][0] ?> теремок, остановилась и спрашивает:
            </span>
         </div>

         <div class="quote_image">
            <p class="quote quote1"><?= $quote1[0][0] ?></p>
         </div>


         <div class="par">
            <span class="text">Никто не отзывается. Вошла <span class="animal name1shrt"><?= $shortname[0][0] ?></span> в </span>

            <button class="teremok">теремок</button>
            <div class="hid_terem"><img src="image/teremok1.jpg" alt=""></div>

            <span>
               и стала там жить.
               <div class="room">
                  Какую комнату выбирает себе <span class="animal name1shrt"><?= $shortname[0][0] ?></span>? <br>На двери написано: "<?= $room[0][1] ?>" - <?= $room[0][3] ?>

                  <button class="teremok">Посмотреть на комнату</button>
                  <div class="hid_terem"><?= $room[0][2] ?></div>
               </div>
               Прискакала к терему
            </span>
            <div class="container_hov">
               <span class="hover-trigger animal name2"><?= $name_character[1][0] ?></span>
               <div class="image">
                  <img src="image/frog.png" alt="Изображение">
               </div>
            </div>
            <?= $description_character[1][0] ?>
            <?= $weather[1][0] ?>
            Cпрашивает <span class="hover-trigger animal name2"><?= $name_character[1][0] ?></span>:</span>
         </div>


         <div class="quote_image">
            <p class="quote quote2"><?= $quote2[0][0] ?></p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Я, <span class="animal name1"><?= $name_character[0][0] ?></span>! А ты кто?</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— А я <span class="animal name2"><?= $name_character[1][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Иди ко мне жить!</p>
         </div>

         <div class="par"><span class="animal name2shrt"><?= $shortname[1][0] ?></span> прыгнула в <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok2.jpg" alt=""></div> Стали они вдвоем жить.
            <div class="room">
               Какую комнату выбирает себе <span class="animal name2shrt"><?= $shortname[1][0] ?></span>? <br>На двери написано: "<?= $room[1][1] ?>" - <?= $room[1][3] ?>
               <button class="teremok">Посмотреть на комнату</button>
               <div class="hid_terem"><?= $room[1][2] ?></div>
            </div>
            Бежит мимо
            <div class="container_hov">
               <span class="hover-trigger animal name1"><?= $name_character[2][0] ?></span>
               <div class="image">
                  <img src="image/hare.png" alt="Изображение">
               </div>
            </div>
            . <?= $description_character[2][0] ?> <?= $weather[2][0] ?> Остановился <?= $name_character[2][0] ?> и спрашивает:
         </div>

         <div class="quote_image">
            <p class="quote quote3"><?= $quote3[0][0] ?></p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Я <span class="animal name1"><?= $name_character[0][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— Я <span class="animal name2"><?= $name_character[1][0] ?></span>! А ты кто?</p>
         </div>
         <div class="quote_image">
            <p class="quote quote3">— А я <span class="animal name3"><?= $name_character[2][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Иди к нам жить!</p>
         </div>


         <div class="par">
            <span class="text"><span class="animal name3shrt"><?= $shortname[2][0] ?></span> скок в </span>

            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok3.jpg" alt=""></div>

            <span>
               Стали они втроем жить.
               <div class="room">
                  Какую комнату выбирает себе <span class="animal name3shrt"><?= $shortname[2][0] ?></span>? <br>На двери написано: "<?= $room[2][1] ?>" - <?= $room[2][3] ?>
                  <button class="teremok">Посмотреть на комнату</button>
                  <div class="hid_terem"><?= $room[2][2] ?></div>
               </div>
               Идет мимо
            </span>
            <div class="container_hov">
               <span class="hover-trigger animal name4"><?= $name_character[3][0] ?></span>
               <div class="image">
                  <img src="image/fox.png" alt="Изображение">
               </div>
            </div>
            . <?= $description_character[3][0] ?> <?= $weather[3][0] ?> Постучала <?= $name_character[3][0] ?> в окошко и спрашивает:</span>
         </div>


         <div class="quote_image">
            <p class="quote quote4"><?= $quote4[0][0] ?></p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Я <span class="animal name1"><?= $name_character[0][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— Я <span class="animal name2"><?= $name_character[1][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote3">— Я <span class="animal name3"><?= $name_character[2][0] ?></span>! А ты кто?</p>
         </div>
         <div class="quote_image">
            <p class="quote quote4">— А я <span class="animal name4"><?= $name_character[3][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">- Иди к нам жить!</p>
         </div>


         <div class="par">
            <span class="text">Забралась <span class="animal name4shrt"><?= $shortname[3][0] ?></span> в </span>

            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok4.jpg" alt=""></div>

            <span>
               Стали они вчетвером жить.
               <div class="room">
                  Какую комнату выбирает себе <span class="animal name4shrt"><?= $shortname[3][0] ?></span>? <br>На двери написано: "<?= $room[3][1] ?>" - <?= $room[3][3] ?>
                  <button class="teremok">Посмотреть на комнату</button>
                  <div class="hid_terem"><?= $room[3][2] ?></div>
               </div>
               Прибежал
            </span>
            <div class="container_hov">
               <span class="hover-trigger animal name5"><?= $name_character[4][0] ?></span>
               <div class="image">
                  <img src="image/wolf.png" alt="Изображение">
               </div>
            </div>
            . <?= $description_character[4][0] ?> <?= $weather[4][0] ?> Заглянул <?= $name_character[4][0] ?> в дверь и спрашивает:</span>
         </div>


         <div class="quote_image">
            <p class="quote quote5"><?= $quote5[0][0] ?></p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Я <span class="animal name1"><?= $name_character[0][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— Я <span class="animal name2"><?= $name_character[1][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote3">— Я <span class="animal name3"><?= $name_character[2][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote4">— Я <span class="animal name4"><?= $name_character[3][0] ?></span>! А ты кто?</p>
         </div>
         <div class="quote_image">
            <p class="quote quote5">— А я <span class="animal name5"><?= $name_character[4][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote3">- Иди к нам жить!</p>
         </div>


         <div class="par">
            <span class="text"><span class="animal name5shrt"><?= $shortname[4][0] ?></span> влез в </span>

            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok5.jpg" alt=""></div>

            <span>
               Стали они впятером жить.
               <div class="room">
                  Какую комнату выбирает себе <span class="animal name5shrt"><?= $shortname[4][0] ?></span>? <br>На двери написано: "<?= $room[4][1] ?>" - <?= $room[4][3] ?>
                  <button class="teremok">Посмотреть на комнату</button>
                  <div class="hid_terem"><?= $room[4][2] ?></div>
               </div>
               Вот они в теремке живут, песни поют. Вдруг идет
            </span>
            <div class="container_hov">
               <span class="hover-trigger animal name5"><?= $name_character[5][0] ?></span>
               <div class="image">
                  <img src="image/bear.png" alt="Изображение">
               </div>
            </div>
            . <?= $description_character[5][0] ?> <?= $weather[5][0] ?> Увидел <?= $shortname[5][0] ?> теремок, услыхал песни, остановился и заревел во всю мочь:</span>
         </div>

         <div class="quote_image">
            <p class="quote quote6"><?= $quote6[0][0] ?></p>
         </div>
         <div class="quote_image">
            <p class="quote quote1">- Я <span class="animal name1"><?= $name_character[0][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— Я <span class="animal name2"><?= $name_character[1][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote3">— Я <span class="animal name3"><?= $name_character[2][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote4">— Я <span class="animal name4"><?= $name_character[3][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote5">— Я <span class="animal name5"><?= $name_character[4][0] ?></span>! А ты кто?</p>
         </div>
         <div class="quote_image">
            <p class="quote quote6">— А я <span class="animal name6"><?= $name_character[5][0] ?></span>.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote4">- Иди к нам жить!</p>
         </div>

         <div class="par">
            <span class="text"><span class="animal name6shrt"><?= $shortname[5][0] ?></span> и полез в </span>

            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok6.jpg" alt=""></div>

            <span>
               Лез-лез, лез-лез — никак не мог влезть и
               говорит:
            </span>
         </div>


         <div class="quote_image">
            <p class="quote quote6">— А я лучше у вас на крыше буду жить.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote2">— Да ты нас раздавишь.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote6">— Нет, не раздавлю.</p>
         </div>
         <div class="quote_image">
            <p class="quote quote4">— Ну так полезай!</p>
         </div>

         <div class="par">
            <span class="text">Влез <?= $shortname[5][0] ?> на крышу и только уселся — трах! — развалился
               теремок.Затрещал теремок, упал набок и весь развалился. Еле-еле успели из него выскочить
               <span class="animal name1"><?= $name_character[0][0] ?></span>,
               <span class="animal name2"><?= $name_character[1][0] ?></span>,
               <span class="animal name3"><?= $name_character[2][0] ?></span>,
               <span class="animal name4"><?= $name_character[3][0] ?></span>,
               <span class="animal name5"><?= $name_character[4][0] ?></span> — все целы и невредимы.
               Принялись они бревна носить, доски пилить — новый
            </span>
            <button class="teremok">теремок.</button>
            <div class="hid_terem"><img src="image/teremok6.jpg" alt=""></div>
            <span>строить. Лучше прежнего выстроили!</span>
         </div>

         <div class="final"><button class="teremok">Полюбуйтесь!</button>
            <div class="hid_terem"><img src="image/teremokfin.jpg" alt=""></div>

         </div>

         <div class="quiz">
            <p>Выберите правильный вариант ответа:</p><br>

            <form id="quizForm">
               <p class="question">1. Кто первый нашел теремок:</p>
               <label>
                  <input type="radio" name="question1" value="A"> <?= $name_character[1][0] ?>
               </label><br>
               <label>
                  <input type="radio" name="question1" value="B"> <?= $name_character[4][0] ?>
               </label><br>
               <label>
                  <input type="radio" name="question1" value="C"> <?= $name_character[0][0] ?>
               </label><br><br>

               <p class="question">2. Кто пришел после лисички-сестрички?</p>
               <label>
                  <input type="radio" name="question2" value="A"> <?= $name_character[0][0] ?>
               </label><br>
               <label>
                  <input type="radio" name="question2" value="B"> <?= $name_character[4][0] ?>
               </label><br>
               <label>
                  <input type="radio" name="question2" value="C"> <?= $name_character[5][0] ?>
               </label><br><br>

               <button type="submit">Проверить ответы</button>
            </form>

            <div id="result"></div>
         </div>
         <div class="up"><button><a href="#top">Вернуться к началу страницы</a></button></div>
         <div class="up"><button><a href="admin.php">Внести изменения</a></button></div>
         <div class="up"><button><a href="shorttext.php">Краткое содержание</a></button></div>
      </div>

   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="js/script.js"></script>
</body>

</html>