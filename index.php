<!DOCTYPE html>

<html>
    <head>
        <title>Download</title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/folder.png">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">
        <link rel="stylesheet" type="text/css"  href="//fonts.googleapis.com/css?family=Cutive+Mono">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo THEMEPATH; ?>/js/materialize.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>
    </head>

    <body>
        <header>
            <nav>
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="https://dhakadistributions.com" class="brand-logo">Name</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="#">Link</a></li>
                            <li><a class="btn-floating pulse" href="#"><i class="material-icons">live_help</i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav>
                <div class="nav-wrapper">
                    <div class="container">

                        <?php $breadcrumbs = $lister->listBreadcrumbs(); ?>
                        <div class="col s12">
                            <?php foreach($breadcrumbs as $breadcrumb): ?>
                            <?php if ($breadcrumb != end($breadcrumbs)): ?>
                            <a href="<?php echo $breadcrumb['link']; ?>" class="breadcrumb"><?php echo $breadcrumb['text']; ?></a>

                            <?php else: ?>
                            <a href="#" class="breadcrumb"><?php echo $breadcrumb['text']; ?></a>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <?php file_exists('header.php') ? include('header.php') : include($lister->getThemePath(true) . "/default_header.php"); ?>
                <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                <div class="alert alert-<?php echo $message['type']; ?>">
                    <?php echo $message['text']; ?>
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dirArray as $name => $fileInfo): ?>
                        <tr>
                            <td>
                                <a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>">
                                    <i class="material-icons left"><?php echo $fileInfo['icon_class']; ?></i>
                                    <?php echo $name; ?>
                                </a>
                            </td>
                            <td><?php echo $fileInfo['file_size'];?></td>
                            <td><?php echo $fileInfo['mod_time']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>
    </body>

</html>
