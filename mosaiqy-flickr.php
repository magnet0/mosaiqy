<?php require "includes/header.php" ?>

    <style>
        .mosaiqy li, .mosaiqy img {
            height      : 110px;
            width       : 200px;
        }
        
        .mosaiqy li figcaption {
            height      : 90px;
        }
    </style>
</head>

<body>

    <?php require "includes/title.php" ?>
    
    <div class="loading mosaiqy">
        <ul></ul>
    </div>
      
    <noscript>Sorry, Javascript is not enabled on your browser.</noscript>
    <address>
        Photos retrieved in a public feed on <a href="http://www.flickr.com/"
        target="new"><img src="images/flickr.png" alt="Flickr" /></a>
    </address>

    
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

    <?php require "includes/lib.php" ?>
        
        <div>
            <figure><a href="${media.z}"><img src="${media.m}">
              <figcaption>${title}</figcaption></a>
            </figure>
        </div>
    </script>
    
    <script>
    $(document).ready(function() {
        
        $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=62700709@N03&jsoncallback=?", {
            format : "json"
        },
        function(flickrJSON) {
            
            var fjson  = flickrJSON.items,
                flen   = fjson.length,
                fi;
            
            /**
             * inject zoom images on JSON (they usually end with ... _z.jpg)
             */
            while (flen--) {
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
                indexData       : 9,
                data            : fjson
            });            
            
        });
    });
    </script>



     
</body>
</html>