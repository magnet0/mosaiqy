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
        
        
        a           {  color       : #414141; }
        a:visited   {  color       : #667; }
        
        
        .github-ribbon {
            background-color    : #999;
            display             : block;
            overflow            : hidden;
            position            : fixed;
            z-index             : 10;
            right               : -3em;
            top                 : 3em;
            -moz-transform      : rotate(45deg);
            -webkit-transform   : rotate(45deg);
            -moz-box-shadow     : 0 0 1.3em #767676;
            -webkit-box-shadow  : 0 0 1.3em #767676;
            margin              : 0;
            padding             : 1px 0;
            border-top          : 1px solid #999;
            border-bottom       : 1px solid #999;
        }
          
        .github-ribbon a {
            color               : #fff;
            display             : block;
            font-weight         : bold;
            font-size           : 0.8em;
            padding             : 0.4em 5em;
            text-align          : center;
            text-decoration     : none;
            text-shadow         : -1px 1px 0px #525059;
            border-top          : 1px dashed #c2c0c4;
            border-bottom       : 1px dashed #c2c0c4;
          }
        
        section, hgroup, header {
            display     : block;
            text-align  : center;
        }
        
        section {
            width       : 860px;
            margin      : 3em auto 0 auto;
            text-align  : left;
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
            margin          : 15px 0 0 0;
            font-size       : 28px;
            color           : #414141;
            text-shadow     : -1px 1px 0px #fff;
        }
        
        header {
            margin-bottom   : 45px;
        }
        
        h2 em {
           font-style      : normal;
           color           : #545355;
        }
        
        h1:after, h1:before,
        h2:after, h2:before {
           content          : "\2605";
           font-size        : 0.6em;
           padding          : 0 10px;
           display          : inline-block;
           vertical-align   : middle;
        }
    </style>
  
  
    <link rel="stylesheet" media="screen" href="mosaiqy.css" />
</head>

<body>

    <header>
        <hgroup>
            <h1>Mosaiqy</h1>
            <h2>A nice plugin for <em>jQuery 1.6</em> &amp; <em>HTML5</em></h2>
            <!-- yes I am an hgroup supporter -->
        </hgroup>
            
        <p class="github-ribbon">
           <a href="https://github.com/fcalderan/mosaiqy" target="new">Hosted on Github</a>
        </p>
    </header>
    
    <div class="loading mosaiqy">
        <ul>
            
            <li data-mosaiqy-index="0">
                <div>
                    <figure><a href="zoom/1.jpg"><img src="thumb/1.jpg">
                        <figcaption>Rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>
                    </figure>
                </div>
            </li>
            <li data-mosaiqy-index="1">
                <div>
                <figure><a href="zoom/2.jpg"><img src="thumb/2.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li data-mosaiqy-index="2">
                <div>
                <figure><a href="zoom/3.jpg"><img src="thumb/3.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li  data-mosaiqy-index="3">
                <div>
                    <figure><a href="zoom/4.jpg"><img src="thumb/4.jpg">
                        <figcaption>Rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li data-mosaiqy-index="4">
                <div>
                    <figure><a href="zoom/5.jpg"><img src="thumb/5.jpg">
                        <figcaption>Due simpatici escursionisti</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li data-mosaiqy-index="5">
                <div>
                    <figure><a href="zoom/6.jpg"><img src="thumb/6.jpg">
                        <figcaption>Veduta della Marmolada lungo il sentiero per il Rifugio &laquo;Venezia&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
        </ul>
     </div>
    
    <section>
        <p>
            The train was about to start from Allahabad, and Mr. Fogg proceeded to pay the guide the price agreed
            upon for his service, and not a farthing more; which astonished Passepartout, who remembered all that
            his master owed to the guide's devotion. He had, indeed, risked his life in the adventure at Pillaji,
            and, if he should be caught afterwards by the Indians, he would with difficulty escape their vengeance.
            Kiouni, also, must be disposed of. What should be done with the elephant, which had been so dearly
            purchased? Phileas Fogg had already determined this question. 
        </p>
        
        <p>
            Now, this plan of Queequeg's, or rather Yojo's, touching the selection of our craft; I did not like
            that plan at all. I had not a little relied upon Queequeg's sagacity to point out the whaler best fitted
            to carry us and our fortunes securely. But as all my remonstrances produced no effect upon Queequeg, I
            was obliged to acquiesce; and accordingly prepared to set about this business with a determined rushing
            sort of energy and vigor, that should quickly settle that trifling little affair.
        </p>
    </section>
        
        
    <section>
        <p>
            The train was about to start from Allahabad, and Mr. Fogg proceeded to pay the guide the price agreed
            upon for his service, and not a farthing more; which astonished Passepartout, who remembered all that
            his master owed to the guide's devotion. He had, indeed, risked his life in the adventure at Pillaji,
            and, if he should be caught afterwards by the Indians, he would with difficulty escape their vengeance.
            Kiouni, also, must be disposed of. What should be done with the elephant, which had been so dearly
            purchased? Phileas Fogg had already determined this question. 
        </p>
        
        <p>
            Now, this plan of Queequeg's, or rather Yojo's, touching the selection of our craft; I did not like
            that plan at all. I had not a little relied upon Queequeg's sagacity to point out the whaler best fitted
            to carry us and our fortunes securely. But as all my remonstrances produced no effect upon Queequeg, I
            was obliged to acquiesce; and accordingly prepared to set about this business with a determined rushing
            sort of energy and vigor, that should quickly settle that trifling little affair.
        </p>
    </section>

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
            rows            : 3,
            cols            : 3,
            avoidDuplicates : true,
            animationDelay  : 1500,
            loop            : true,
            dataIndex       : 10,
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
                },
                {
                    img     : "11.jpg",
                    desc    : "Mucche (1)"
                },
                {
                    img     : "12.jpg",
                    desc    : "Mucche(2)"
                }
            ]
            
        });
        
    });
    </script>



     
</body>
</html>