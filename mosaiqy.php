<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>Mosaiqy: a nice jQuery plugin</title>

    <script>document.documentElement.className = 'js'</script>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="innershiv.js"></script>
    <![endif]-->
    
  
    <style>
        @font-face {
            font-family: 'LeagueGothicRegular';
            src: url('font/league_gothic-webfont.eot');
            src: local('☺'), 
                url('font/league_gothic-webfont.woff') format('woff'), 
                url('font/league_gothic-webfont.ttf') format('truetype'), 
                url('font/league_gothic-webfont.svg#webfontqRQZtdhc') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        
        body {
            background  : #e0e7e6;
            font        : 15px/1.4 Arial;
            color       : #303133;
        }
        
        section, hgroup {
            display     : block;
            text-align  : center;
        }
        
        section {
            margin      : 3em 0 0 0;
        }
        
        h1 {
            font-family     : LeagueGothicRegular;
            font-size       : 140px;
            line-height     : 0.9;
            font-weight     : normal;
            letter-spacing  : 5px;
            color           : #fff;
            text-transform  : uppercase;
            margin          : 15px 0 0 0;
            text-shadow     : -1px 1px 0px #a9b2a6;
        }
        
        h2 {
            font-family     : LeagueGothicRegular;
            font-weight     : normal;
            margin          : 15px 0 30px; 0;
            font-size       : 28px;
            color           : #414141;
        }
    </style>
  
  
    <link rel="stylesheet" media="screen" href="mosaiqy.css" />
</head>

<body>
    
    <hgroup>
        <h1>Mosaiqy</h1>
        <h2>A nice plugin for jQuery 1.6</h2>
        <!-- yes I am an hgroup supporter -->
    </hgroup>
    
    <div class="loading mosaiqy">
        <ul>
            <li>
                <div>
                    <figure><a href="zoom/1.jpg"><img src="thumb/1.jpg">
                        <figcaption>Rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>
                    </figure>
                </div>
            </li>
            <li>
                <div>
                <figure><a href="zoom/2.jpg"><img src="thumb/2.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li>
                <div>
                <figure><a href="zoom/3.jpg"><img src="thumb/3.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/4.jpg"><img src="thumb/4.jpg">
                        <figcaption>Rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/5.jpg"><img src="thumb/5.jpg">
                        <figcaption>Due simpatici escursionisti</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/6.jpg"><img src="thumb/6.jpg">
                        <figcaption>Veduta della Marmolada lungo il sentiero per il Rifugio &laquo;Venezia&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/7.jpg"><img src="thumb/7.jpg">
                        <figcaption>Arrivando al rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/13.jpg"><img src="thumb/13.jpg">
                        <figcaption>Una simpatica escursionista affamata</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/9.jpg"><img src="thumb/9.jpg">
                        <figcaption>Veduta dal rifugio &laquo;Pradidali&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/10.jpg"><img src="thumb/10.jpg">
                        <figcaption>Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/11.jpg"><img src="thumb/11.jpg"></a>
                        <figcaption>Due mucche al rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="zoom/12.jpg"><img src="thumb/12.jpg">
                        <figcaption>Due mucche al rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
        </ul>
     </div>
    
    <section>
        <h2>Choose your favourite grid size (except 1x12 and 12x1 &mdash; you could, but it's trivial!)</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">        
            <select name="gridsize" onchange="this.parentNode.submit()">
                <option value="2x6" <?php if ($_POST['gridsize'] == "2x6") echo "selected"; ?> >2x6</option>
                <option value="3x4" <?php if ($_POST['gridsize'] == "3x4" || $_POST['gridsize'] == '') echo "selected"; ?> >3x4</option>
                <option value="4x3" <?php if ($_POST['gridsize'] == "4x3") echo "selected"; ?> >4x3</option>
                <option value="6x2" <?php if ($_POST['gridsize'] == "6x2") echo "selected"; ?> >6x2</option>
            </select>
        </form>
    </section>
    
    <section>
        <h2>Thanks to</h2>
        <p>So many people here, just give me a moment...</p>
    </section>
    
    <section>
        <h2>Special thanks to</h2>
        <p>
            A great thank goes to "distillerie salentine" who gave me the opportunity to easily reach<br />
            the famous <cite title="http://xkcd.com/323/">"Ballmer's peak"</cite> with theirs delicious melon's cream at 17%.
            <figure>
                <img src="http://imgs.xkcd.com/comics/ballmer_peak.png" />
                <figcaption>A moderate alcohol quantity is definitely a javascript good part. Crockford should tell about it</figcaption>
            </figure>
        </p>
    </section>
    <?php
        $rows = 3;
        $cols = 4;
        
        if (isset($_POST['gridsize'])) {
            list($rows, $cols) = explode("x", $_POST['gridsize']);
        }
    ?>



    <!-- jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"> </script>
    <script src="mosaiqy.js" id="mosaiqy_tpl">
        <div>
            <figure><a href="zoom/${img}"><img src="thumb/${img}">
              <figcaption>${desc}</figcaption></a>
            </figure>
        </div>
    </script>
    
    <script>
    $(document).ready(function() {
        $('.mosaiqy').mosaiqy({
            template        : '#mosaiqy_tpl',
            rows            : <?php echo $rows ?>,
            cols            : <?php echo $cols ?>,
            animationDelay  : 1500,
            loop            : true,
            data            : [
                {
                    img     : "1.jpg",
                    desc    : "Rifugio &laquo;Citt&agrave; di Fiume&raquo;"
                }
                ,
                {
                    img     : "2.jpg",
                    desc    : "Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;"
                },
                {
                    img     : "3.jpg",
                    desc    : "Veduta dal rifugio &laquo;Pradidali&raquo;"
                },
                {
                    img     : "4.jpg",
                    desc    : "Rifugio &laquo;Pradidali&raquo;"
                },
                {
                    img     : "5.jpg",
                    desc    : "Due simpatici escursionisti"
                },
                {
                    img     : "6.jpg",
                    desc    : "Veduta della Marmolada lungo il sentiero per il Rifugio &laquo;Venezia&raquo;"
                },
                {
                    img     : "7.jpg",
                    desc    : "Arrivando al rifugio &laquo;Pradidali&raquo;"
                },
                {
                    img     : "13.jpg",
                    desc    : "Una simpatica escursionista affamata"
                },
                {
                    img     : "9.jpg",
                    desc    : "Veduta dal rifugio &laquo;Pradidali&raquo;"
                },
                {
                    img     : "10.jpg",
                    desc    : "Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;"
                }
            ]
        });
        
    });
    </script>



     
</body>
</html>