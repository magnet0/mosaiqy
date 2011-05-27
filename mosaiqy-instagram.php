<?php require "includes/header.php" ?>

    <style>
        .mosaiqy li, .mosaiqy img {
            height      : 200px;
            width       : 200px;
        }
        
        .mosaiqy li figcaption {
            height      : 180px;
            width       : 180px;
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
        Photos retrieved on <a href="http://instagram.com/"
        target="new"><img src="http://instagram.com/static/blog/images/instagramTitleBlog.png" alt="Panoramio" /></a>
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
            <figure><a href="${images.standard_resolution.url}"><img src="${images.low_resolution.url}" longdesc="${link}">
              <figcaption>${caption.text} <strong>(${user.full_name})</strong></figcaption></a>
            </figure>
        </div>
    </script>
    
    <script>
    $(document).ready(function() {
        
        var instagramAPIDataUrl = "https://api.instagram.com/v1//locations/121218/media/recent?client_id=cdebd6a242f149e38fe100f042d8bc18&callback=?";
                
        $.getJSON(instagramAPIDataUrl, { },
            
            function(instagramJSON) {
                
                console.log(instagramAPIDataUrl);
                console.log(instagramJSON.data)
                
                    
                $('.mosaiqy').mosaiqy({
                    template        : '#mosaiqy_tpl',
                    rows            : 2,
                    cols            : 4,
                    avoidDuplicates : true,
                    animationDelay  : 1500,
                    loop            : true,
                    data            : instagramJSON.data
                });            
                
            }
        );
        
    });
    </script>



     
</body>
</html>