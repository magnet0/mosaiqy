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
        
    <p id="demotitle">Photos retrieved on <a href="http://www.panoramio.com/" target="new">Panoramio</a></p>
        
    <section>
        <h2>Integration code</h2>
        <pre><code id="codesample"></code></pre>
    </section>
        
        
    <?php require "includes/lib.php" ?>
        
        <div>
            <figure><a href="${photo_file_url}"><img src="${photo_file_url_small}" longdesc="${photo_url}">
              <figcaption>${photo_title} <strong>(${owner_name})</strong></figcaption></a>
            </figure>
        </div>
    </script>
    
    
    
    <script id="mosaiqydemo">
    $(document).ready(function() {
        
        var panoramioAPIDataUrl = "http://www.panoramio.com/map/get_panoramas.php?set=public&from=0&to=30&size=medium&callback=?",
            accuracy = 0.02;
        
        /* Geolocation detection */
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                
                function(position) {
                    var lat = position.coords.latitude,
                        lon = position.coords.longitude;
                        
                    panoramioAPIDataUrl += ["&minx=", lon - accuracy,
                                            "&miny=", lat - accuracy,
                                            "&maxx=", lon + accuracy,
                                            "&maxy=", lat + accuracy].join('');
                        
                    loadMosaiqy();
                },
                
                /* Geolocation error, we choose a nice location as a fallback */                
                function(error) {
                    panoramioAPIDataUrl += "&minx=12.22&miny=45.6&maxx=12.30&maxy=45.7";
                    loadMosaiqy();
                }                                                     
            );
        }
        
        /* no Geolocation, we choose a nice location as a fallback */
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
                     * This JSON doesn't include information about thumb image for each photo.
                     * Since thumb file name usually contains /small path instead of /original
                     * we inject into data a new key/value pair for each thumb, so the object
                     * will be something like
                     *
                     *  "photo_file_url"        : "http://mw2.google.com/mw-panoramio/photos/original/1234567.jpg"
                     *  "photo_file_url_small"  : "http://mw2.google.com/mw-panoramio/photos/small/1234567.jpg"
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
        
        
    <script>
    $(document).ready(function() {
        var code = $('#mosaiqydemo').html() || $('#mosaiqydemo').text();
        $('#codesample').html(code);
    })
    </script>
     
</body>
</html>