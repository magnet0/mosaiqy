<?php require "includes/header.php" ?>

    <style>
        .mosaiqy li, .mosaiqy img {
            height      : 110px;
            width       : 200px;
        }
        
        .mosaiqy li figcaption {
            height      : 90px;
        }
        
        figcaption strong {
            display     : block;
        }
        .mosaiqy-zoom figcaption strong {
            text-indent : 12px;
        }
    </style>
</head>

<body>

    <?php require "includes/title.php" ?>
    
    
    <div class="loading mosaiqy">
        <ul></ul>
    </div>
        
    <noscript>Sorry, Javascript is not enabled on your browser</noscript>
    <address>
        Photos retrieved on <a href="http://www.panoramio.com/"
        target="new"><img src="images/panoramio.png" alt="Panoramio" /></a>
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
            <figure><a href="${photo_file_url}"><img src="${photo_file_url_small}" longdesc="${photo_url}">
              <figcaption>${photo_title} <strong>(${owner_name})</strong></figcaption></a>
            </figure>
        </div>
    </script>
    
    <script>
    $(document).ready(function() {
        
        var panoramioAPIDataUrl = "http://www.panoramio.com/map/get_panoramas.php?set=public&from=0&to=30&size=medium&callback=?",
            acc = 0.02;
         
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                
                function(position) {
                    var lat = position.coords.latitude,
                        lon = position.coords.longitude;
                        
                    panoramioAPIDataUrl += ["&minx=", lon - acc,
                                            "&miny=", lat - acc,
                                            "&maxx=", lon + acc,
                                            "&maxy=", lat + acc].join('');
                        
                    loadMosaiqy();
                },  
                function(error) {
                    panoramioAPIDataUrl += "&minx=12.22&miny=45.6&maxx=12.30&maxy=45.7";
                    loadMosaiqy();
                }                                                     
            );
        }
        else {
            panoramioAPIDataUrl += "&minx=12.22&miny=45.6&maxx=12.30&maxy=45.7";
            loadMosaiqy();
        }
            
            
        function loadMosaiqy() {
            $.getJSON(panoramioAPIDataUrl, { },
                
                function(panoramioJSON) {
                    var pjson  = panoramioJSON.photos,
                        plen   = pjson.length,
                        pi;                   
                        
                    /**
                     * inject panoramio small images on JSON 
                     * Small e.g. : http://mw2.google.com/mw-panoramio/photos/small/1234567.jpg
                     * Original e.g.: http://mw2.google.com/mw-panoramio/photos/original/1234567.jpg
                     */
                    while (plen--) {
                        pi = pjson[plen];
                        pi['photo_file_url_small']  = pi['photo_file_url'].replace(/\/original\//i, "/small/");
                    }
                        
                    $('.mosaiqy').mosaiqy({
                        template        : 'mosaiqy_tpl',
                        rows            : 3,
                        cols            : 2,
                        avoidDuplicates : true,
                        animationDelay  : 1500,
                        loop            : true,
                        data            : pjson
                    });            
                    
                }
            );
        }
        
        
    });
    </script>



     
</body>
</html>