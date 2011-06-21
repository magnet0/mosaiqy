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
    
    <p id="demotitle">Photos retrieved in a public feed on <a href="http://www.flickr.com/" target="new">Flickr</a></p>

    
    <noscript>Sorry, Javascript is not enabled on your browser.</noscript>
    
        
    <?php require "includes/lib.php" ?>
        
        <div>
            <figure><a href="${media.z}"><img src="${media.m}" longdesc="${link}">
              <figcaption>${title}</figcaption></a>
            </figure>
        </div>
    </script>


    <section>
        <h2>Integration code</h2>
        <pre><code id="codesample"></code></pre>
    </section>

    <section>
        <h2>Sample JSON retrieved by the service</h2>
        <pre><code id="jsonsample">"title"         : "Uploads from fcalderan",
"link"          : "http://www.flickr.com/photos/fcalderan/",
"description"   : "",
"modified"      : "2011-05-25T13:00:33Z",
"generator"     : "http://www.flickr.com/",
"items": [
    {
        "title"         : "\"Find you well\"",
        "link"          : "http://www.flickr.com/photos/fcalderan/5757891471/",
        "media"         : {
            "m" : "http://farm6.static.flickr.com/5105/5757891471_1abfbd822c_m.jpg"
        },
        "date_taken"    : "2011-05-25T15:00:33-08:00",
        "description"   : "...",
        "published"     : "2011-05-25T13:00:33Z",
        "author"        : "nobody@flickr.com (fcalderan)",
        "author_id"     : "62700709@N03",
        "tags"          : ""
    },
    {
        "title"         : "\"A new girl for your anniversary\"",
        "link"          : "http://www.flickr.com/photos/fcalderan/5757891387/",
        "media"         : {
            "m" : "http://farm3.static.flickr.com/2444/5757891387_ff511e764e_m.jpg"
        },
        "date_taken"    : "2011-05-25T15:00:32-08:00",
        "description"   : "...",
        "published"     : "2011-05-25T13:00:32Z",
        "author"        : "nobody@flickr.com (fcalderan)",
        "author_id"     : "62700709@N03",
        "tags"          : ""
    },
    ...</code></pre>
    </section>
    
    <script id="mosaiqydemo">
    $(document).ready(function() {
        
        $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=62700709@N03&jsoncallback=?", {
            format : "json"
        },
        function(flickrJSON) {
            
            var fjson  = flickrJSON.items,
                flen   = fjson.length,
                fi;
                
            /**
             * This JSON doesn't include information about zoom image for each photo.
             * Since zoom file name usually ends with '_z.jpg' we inject into data a new
             * key/value pair for each thumb, so the object will be something like
             *
             * "media"         : {
             *      "m" : "http://farm6.static.flickr.com/5105/5757891471_1abfbd822c_m.jpg"
             *      "z" : "http://farm6.static.flickr.com/5105/5757891471_1abfbd822c_z.jpg"
             * }
             */
            while (flen--) {
                fi = fjson[flen];
                fi.media['z']  = fi.media['m'].replace(/^(.+)(\_m\.)(\w+)$/i, function(url, name, type, ext) {
                    return [name, ext].join('_z.');
                });
            }
                
                
            $('.mosaiqy').mosaiqy({
                template        : 'mosaiqy_tpl',
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


     
    <script>
    $(document).ready(function() {
        var code = $('#mosaiqydemo').html() || $('#mosaiqydemo').text();
        $('#codesample').html(code);
    })
    </script>
</body>
</html>