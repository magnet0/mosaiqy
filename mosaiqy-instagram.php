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
    
    <p id="demotitle">Photos retrieved on <a href="http://instagram.com/" target="new">Instagram</p>
        
    <section>
        <h2>Integration code</h2>
        <pre><code id="codesample"></code></pre>
    </section>
            
        
    <?php require "includes/lib.php" ?>
        
        <div>
            <figure><a href="${images.standard_resolution.url}"><img src="${images.low_resolution.url}" longdesc="${link}">
              <figcaption>${caption.text} <strong>(${user.username})</strong></figcaption></a>
            </figure>
        </div>
    </script>
    
    <script id="mosaiqydemo">
    $(document).ready(function() {
        var instagramAPIDataUrl = "https://api.instagram.com/v1/locations/121218/media/recent?client_id=cdebd6a242f149e38fe100f042d8bc18&callback=?";
                
        $.getJSON(instagramAPIDataUrl, function(instagramJSON) {
                
            $('.mosaiqy').mosaiqy({
                template        : 'mosaiqy_tpl',
                rows            : 2,
                cols            : 3,
                avoidDuplicates : true,
                animationDelay  : 1500,
                loop            : true,
                data            : instagramJSON.data
            });            
            
        });        
    });
    </script>
        
        
        
    <script>
    $(document).ready(function() {
        var code = $('#mosaiqydemo').html() || $('#mosaiqydemo').text();
        $('#codesample').html(code);
    })
    </script>
     
</body>
</html>