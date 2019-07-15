<?php
    if(!empty($_GET) && $_GET['phpinfo'] == 'true') {
        phpinfo();
        exit();
    }

    $files = array_map(function($file){
        $ignored = [
            '.', 
            '..',
        ];
        if(is_dir($file) && !in_array($file, $ignored)){
            return trim($file);
        }
    },scandir(getcwd()));

    $links = [
        'php info' => [
            'url' => sprintf('%s?phpinfo=true', $_SERVER['PHP_SELF']),
            'desc' => sprintf('PHP %s', phpversion()),
        ],
        'php.net' => [
            'url' => 'https://php.net',
            'desc' => 'documentation php',
        ],
        'Mysql' => [
            'url' => 'https://dev.mysql.com/doc/',
            'desc' => 'documentation MySql',
        ],
        'postgresql' => [
            'url' => 'https://www.postgresql.org/docs/',
            'desc' => 'documentation postgresql',
        ],
        'sqlite.org' => [
            'url' => 'https://www.sqlite.org',
            'desc' => 'documentation php',
        ],
        'GitHub' => [
            'url' => 'https://github.com',
            'desc' => 'GitHub repositories',
        ],
        'Trello' => [
            'url' => 'https://trello.com/login',
            'desc' => 'login',
        ],
    ];
?>
<!doctype html>
<html class="no-js" lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Localhost</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        // Custom styles for localhost

html {
    font-family: Consolas;
}

body {
    font-family: 'Roboto';
    background-color: #fff;
    margin: 0;
    text-align: left;
}

* {
    box-sizing: border-box;
}

.wrapper-inner {
    width: 100%;
    min-width: 650px;
    max-width: 1150px;
    margin: 4em auto;
    position: relative;
    padding: 0 1em;
}

@media screen and (min-width: 50em) {

    .wrapper-inner {
        padding: 0 4em;
    }
}

.wrapper-inner::after {
    content: "";
    display: table;
    clear: both;
}

.heading {
    font-weight: 600;
    display: block;
    font-size: 1rem;
    text-align: center;
    text-decoration: none;
    color: #666;
    background-color: #F5F5F5;
    padding: 1em 1.5em;
    width: 100%;
    margin: 0;
    border-bottom: 1px solid #E5E5E5;
}



/* ***************************************************************
 *  Navigation
 *
 * ************************************************************* */

.projects {
    font-weight: 400;
    color: #666;
    background-color: #F5F5F5;
    padding-top: 4em;
    border-bottom: 1px solid #E5E5E5;
}

.projects-nav {
    width: 100%;
    min-width: 650px;
    max-width: 1150px;
    margin: 0 auto;
    padding: 0 1em;
}

@media screen and (min-width: 50em) {

    .projects-nav {
        padding: 0 4em;
    }
}

.projects-link {
    display: inline-block;
    text-decoration: none;
    color: #666;
    padding: 1em 1.5em;
    margin-bottom: -1px;
    border-radius: 3px 3px 0 0;
}

.projects-link.active {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
    border-top: 3px solid #D82841;
    background-color: #fff;
    font-weight: 600;
}

.link-ext {
    display: inline-block;
    color: #fff;
    text-decoration: none;
    padding: 0.5em 1.5em;
    margin: 0.5em 0;
    float: right;
    background-image: linear-gradient(#38D195, #2BBC83);
    border: 1px solid #2BBC83;
    border-radius: 2px;
}

.link-ext:hover {
    background-image: linear-gradient(#2BBC83, #259F6F);
}



/* ***************************************************************
 *  Projektliste
 *
 * ************************************************************* */

.list {
    font-size: 1.2rem;
    list-style: none;
    padding-left: 0;
    width: 65%;
    float: left;
    margin: 0;
}

.list-item {
    display: block;
    border-top: 1px solid #EAEDED;
    padding: 1em 0;
}

.link {
    font-weight: 600;
    display: inline-block;
    padding: 0.4em 0;
    text-decoration: none;
    color: #4078c0;
}

.list-item:last-child {
    border-bottom: 1px solid #EAEDED;
}

.link:hover {
    text-decoration: underline;
}

.link-btn {
    display: inline-block;
    font-size: 1rem;
    color: #fff;
    text-decoration: none;
    padding: 0.5em 1.5em;
    // margin: 0.5em 0;
    float: right;
    background-image: linear-gradient(#5790D9, #4F85CB);
    border: 1px solid #4F85CB;
    border-radius: 2px;
}

.link-btn:hover {
    background-image: linear-gradient(#4F85CB, #3F6DAA);
}



/* ***************************************************************
 *  Links-Sidebar
 *
 * ************************************************************* */

.sites {
    font-size: 1rem;
    width: 30%;
    margin-left: 5%;
    padding: 0 1em;
    float: left;
    border: 1px solid #E5E5E5;
    border-radius: 2px;
}

.sites-title {
    font-size: 1rem;
    color: #666;
    border-bottom: 1px solid #EAEDED;
    background-color: #F5F5F5;
    margin: 0 -1em 0 -1em;
    padding: 1em;
}

.sites-items {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sites-item {
    display: block;
    font-size: 1rem;
    border-bottom: 1px solid #EAEDED;
}

.sites-item:last-child {
    border-bottom: 0;
}

.sites-link {
    // font-weight: 600;
    display: inline-block;
    padding: 1.5em 0;
    text-decoration: none;
    color: #666;
}

.sites-link:hover {
    color: #4078c0;
}

.sites-link-desc {
    color: #ccc;
    display: inline-block;
    font-size: 0.8rem;
    margin-top: 0.3em;
}

        </style>
    </head>
    <body>

        <div class="wrapper">

            <!-- <h1 class="heading">Localhost</h1> -->

            <div class="projects">
                <nav class="projects-nav">
                    <a href="http://localhost/" class="projects-link active">Workspace</a>
                    <a href="http://localhost/pgadmin/" class="link-ext">PGAdmin</a>
                    <a href="http://localhost/phpliteadmin/" class="link-ext">phpliteadmin</a>
                    <a href="http://localhost/phpMyAdmin/" class="link-ext">PHPMyAdmin</a>
                    <!-- 
                    <a href="http://localhost/phpMyAdmin/" class="link-ext">PHPMyAdmin</a>
                    <a href="http://localhost/pgadmin/" class="link-ext">PGAdmin</a> 
                    -->
                </nav>
            </div>

            <div class="wrapper-inner">
                <ul class="list">
                    <?php foreach ($files as $file) : ?>
                    <?php if(!empty($file)): ?>
                        <li class="list-item">
                            <a class="link" href="<?= $file ?>"><?= $file ?></a>
                            <a class="link-btn" href="/<?= $file ?>.test">vHost</a>
                        </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <div class="sites">
                    <h2 class="sites-title">Links</h2>
                    <ul class="sites-items">
                        <?php foreach ($links as $title => $value): ?>
                        <li class="sites-item">
                            <a href="<?= $value['url'] ?>" class="sites-link"><?= $title ?><br><span class="sites-link-desc"><?= $value['desc'] ?></span></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

    </body>
</html>
