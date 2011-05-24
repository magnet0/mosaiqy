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
        
        section, hgroup, header, form {
            display     : block;
            text-align  : center;
        }
        
        section {
            width       : 860px;
            margin      : 3em auto 0 auto;
            text-align  : left;
        }
        
        h1, h2, h3 {
            font-family     : LeagueGothicRegular;
            text-align      : center;
        }
        
        h1 {
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
            font-weight     : normal;
            margin          : 15px 0 0 0;
            font-size       : 36px;
            color           : #414141;
            text-shadow     : -1px 1px 0px #fff;
        }
        
        h3 {
            font-weight     : normal;
            margin          : 0;
            font-size       : 28px;
            color           : #414141;
            text-shadow     : -1px 1px 0px #fff;
        }
        
        header {
            margin-bottom   : 45px;
        }
        
        hgroup em {
           font-style      : normal;
           color           : #72707B;
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
            <h2>A nice plugin for <em>jQuery 1.6+</em> &amp; <em>HTML5</em></h2>
            <h3>(<em>8Kb</em> minified - <em>3.6Kb</em> minified + gzip)</h3>
            <!-- yes I am an hgroup supporter -->
        </hgroup>
            
        <p class="github-ribbon">
           <a href="https://github.com/fcalderan/mosaiqy" target="new">Hosted on Github</a>
        </p>
    </header>
    
    <div class="loading mosaiqy">
        <ul>

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
            <figure><a href="${media.z}"><img src="${media.m}">
              <figcaption>${title}</figcaption></a>
            </figure>
        </div>
    </script>
    
    <script>
    $(document).ready(function() {
        
        $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=59422190@N00&jsoncallback=?", {
            format : "json"
        },
        function(flickrJSON) {
            
            var fjson  = flickrJSON.items,
                flen   = fjson.length,
                fi;
            
            /**
             * inject zoom images on JSON (they usually ends with ... _z.jpg
             */
            while (--flen) {
                fi = fjson[flen];
                fi.media['z']  = fi.media['m'].replace(/^(.+)(\_m\.)(\w+)$/i, function(url, name, type, ext) {
                    return [name, ext].join('_z.');
                });
            }
                
                
            $('.mosaiqy').mosaiqy({
                template        : '#mosaiqy_tpl',
                rows            : 3,
                cols            : 3,
                avoidDuplicates : true,
                animationDelay  : 1500,
                loop            : true,
                dataIndex       : 10,
                data            : fjson
            });            
            
        });
    });
    </script>



     
</body>
</html>