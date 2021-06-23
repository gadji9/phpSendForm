<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="/form.js"></script>
</head>
<body>
    <div id="contact-container">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="" src="/assets/Letter.png" alt="">
                </div>
            </div>
            <form class="row contact_data" action="send.php" method="POST">
                <div class="col-lg-5 d-flex justify-content-between flex-column">
                        <label class="mylabel name-label" for="input1">Имя<span class="red">*</span></label>
                        <input name="name" id="input1" class="form-control input-form" type="text">
                        <label class="mt-3 lmylabel email-label" for="input2">Email<span class="red">*</span></label>
                        <input name="email" id="input2" class="form-control input-form" type="text">
                </div>
                <div class="col-lg-6 offset-lg-1 mt-3 mt-lg-0 d-flex justify-content-between flex-column">
                        <label class="mt-sm-3 mt-lg-0 mylabel com-label" for="input3">Комментарий<span class="red">*</span></label>
                        <textarea name="com" id="input3" class="h-100 form-control input-form " type="text"></textarea>
                    </div>
                   <div class="mb-5 mt-5 col-lg-2 col-12 offset-lg-10">
                       <button style="height: 50px; width:100%;" class=" fw-bold btn btn-danger" type="submit" name="submit">Записать</button>
                   </div>
            </form>
            
        </div>
    </div>
    <div class="info-container container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <h3>Выводим комментарии</h3>
            </div>
        </div>
        <div class="row">
            <?php
            $mysql = new mysqli('localhost','root','root','test');
            if(!$mysql)
            {
                throw new Exception('Не удалось подключиться к базе данных! Проверьте параметры подключения');
            }
            $docs = $mysql->query("SELECT * FROM `userspost`");
            if(!$docs)
            {
                throw new Exception('Не удалось совершить запрос! Проверьте параметры подключения');
            }
            if (isset($_POST['submit']))
            {
                echo "asfgasd";
                $docs = $mysql->query("SELECT * FROM `userspost`");
                if(!$docs)
                {
                    throw new Exception('Не удалось совершить запрос! Проверьте параметры подключения');
                }
            }
            while($data = mysqli_fetch_array($docs,MYSQLI_ASSOC)):?>
            <?php
            $color;
             if(($data['id'] % 2) == 1){
                $color = 'blacky'; 
            } else {
                $color = 'greeny';
            } ?>
            <div class="col-lg-4 col-12 mt-5">
                <div class="d-flex justify-content-center">
                    <div class="card mb-3">
                        <div class="fw-bold font-size card-header bg-<?php echo $color; ?> d-flex justify-content-center">
                            <span class="text-white"><?php echo $data['name']?></span>
                        </div>
                        <div class="card-body">
                            <div class="mt-3 d-flex justify-content-center">
                                <h5 class="fw-bold card-title text-<?php echo $color; ?>"><?php echo $data['email']?></h5>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <p class="card-text text-secondary"><?php echo $data['comment']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

    </div>
</body>
</html>