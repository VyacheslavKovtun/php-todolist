<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mdb.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/mdb.js"></script>
    <script src="js/popper.js"></script>

    <title>Document</title>
</head>
<body>
    <main>
      <?php require_once 'mainForm.php' ?>

        <nav class="navbar navbar-expand-lg navbar-dark primary-color">
            <div class="navbar-brand">ToDoList</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
              aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="basicExampleNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Все задачи</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">Приоритет</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="priorityImportant.php">Важно</a>
                            <a class="dropdown-item" href="priorityMedium.php">Средне</a>
                            <a class="dropdown-item" href="priorityUnimportant.php">Неважно</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">Статус</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="statusNotStarted.php">Предстоящее</a>
                            <a class="dropdown-item" href="statusInProcess.php">В процессе</a>
                            <a class="dropdown-item" href="statusCompleted.php">Выполнено</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <table class="table table-unbordered">
            <thead>
              <tr>
                <th>Задача</th>
                <th>Статус</th>
                <th>Приоритет</th>
                <th>Дата создания</th>
                <th>Дата выполнения</th>
                <th>Удалить</th>
              </tr>
            </thead>

            <tbody>