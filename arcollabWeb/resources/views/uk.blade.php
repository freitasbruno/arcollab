<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Card - UIkit tests</title>
        <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
    </head>

    <body>

        <div class="uk-container uk-margin-large-top">

            <h2>Header and Footer</h2>

            <div class="uk-child-width-1-4@m" uk-grid>
                <div>

                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <h3 class="uk-card-title">Title</h3>
                        </div>
                        <div class="uk-card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="uk-card-footer">
                            <p class="uk-text-meta">Written by <a href="#">Super User</a> on <time datetime="2016-04-01T19:00">April 01, 2016</time>.</p>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="images/light.jpg" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="uk-card-footer">
                            <p>
                                <a class="uk-button uk-button-primary" href="#">Button</a>
                                <a class="uk-button uk-button-text uk-margin-small-left" href="#">Button</a>
                            </p>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <h3 class="uk-card-title">Title</h3>
                        </div>
                        <div class="uk-card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="uk-card-media-bottom">
                            <img src="images/dark.jpg" alt="">
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" src="images/avatar.jpg" width="50" alt="">
                                </div>
                                <div>
                                    <h3 class="uk-width-expand uk-card-title uk-margin-remove-bottom">Title</h3>
                                    <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-media">
                            <img src="images/light.jpg" alt="">
                        </div>
                        <div class="uk-card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
