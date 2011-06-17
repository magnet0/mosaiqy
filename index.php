<?php require "includes/header.php" ?>


    <!--
       Javascript is on the bottom of the page.
    -->

</head>

<body>

    <?php require "includes/title.php" ?>

    
    <div class="loading mosaiqy">
        <ul>
            <li>
                <div>
                    <figure><a href="images/zoom/1.jpg"><img src="images/thumb/1.jpg">
                        <figcaption>Rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>
                    </figure>
                </div>
            </li>
            <li>
                <div>
                <figure><a href="images/zoom/2.jpg"><img src="images/thumb/2.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li>
                <div>
                <figure><a href="images/zoom/3.jpg"><img src="images/thumb/3.jpg">
                    <figcaption>Veduta dal rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/4.jpg"><img src="images/thumb/4.jpg">
                        <figcaption>Rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/5.jpg"><img src="images/thumb/5.jpg">
                        <figcaption>Due simpatici escursionisti</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/6.jpg"><img src="images/thumb/6.jpg">
                        <figcaption>Veduta della Marmolada lungo il sentiero per il Rifugio &laquo;Venezia&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/7.jpg"><img src="images/thumb/7.jpg">
                        <figcaption>Arrivando al rifugio &laquo;Pradidali&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/8.jpg"><img src="images/thumb/8.jpg" longdesc="test.html">
                        <figcaption>Veduta dal rifugio &laquo;Pradidali&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/9.jpg"><img src="images/thumb/9.jpg">
                        <figcaption>Rifugio &laquo;Locatelli&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/10.jpg"><img src="images/thumb/10.jpg">
                        <figcaption>Veduta dal rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>           
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/11.jpg"><img src="images/thumb/11.jpg"></a>
                        <figcaption>Due mucche al rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption>            
                    </figure>
                </div>
            </li>
            <li>
                <div>
                    <figure><a href="images/zoom/12.jpg"><img src="images/thumb/12.jpg">
                        <figcaption>Due mucche al rifugio &laquo;Citt&agrave; di Fiume&raquo;</figcaption></a>            
                    </figure>
                </div>
            </li>
        </ul>
     </div>
    
    <?php
        $gs = $_POST['gridsize'];
    ?>
    <section id="menu">
        <h2>Click over a thumbnail / choose another grid size (with 12 photos)</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">        
            <select name="gridsize" onchange="this.parentNode.submit()">
                <option value="3x4" <?php if ($gs == "3x4") echo "selected"; ?> >3 rows - 4 cols</option>
                <option value="4x3" <?php if ($gs == "4x3"  || $gs == '') echo "selected"; ?> >4 rows - 3 cols</option>
                <option value="6x2" <?php if ($gs == "6x2") echo "selected"; ?> >6 rows - 2 cols</option>
                <option value="12x1" <?php if ($gs == "12x1") echo "selected"; ?> >12 rows - 1 cols</option>
            </select>
        </form>
    </section>



    <nav>
        <ul class="ibw">
            <li><a href="#demos">Demos</a>
            <li><a href="#requirements">Requirements</a>
            <li><a href="#how-to-use">How to use</a>
            <li><a href="#options">Options</a>
            <li><a href="#download">License &amp; Download</a>
            <li><a href="#author">About the author</a>
            <li><a href="#thanks-to">Thanks to</a>
        </ul>   
    </nav>
    
    <section id="demos">
        <h2>Available demos & service integration</h2>
        <p>
            So far, integration demo with Flickr, Instagram and Panoramio were realized. If you'd like to see
            some other examples with your favourite service (not yet listed here) just let me know:
        </p>
        <ul>
            <li><a href="mosaiqy-mixed-load.php">Mixing initial images JSON/HTML</a></li>
            <li><a href="mosaiqy-flickr.php">Flickr</a></li>
            <li><a href="mosaiqy-instagram.php">Instagram</a></li>
            <li><a href="mosaiqy-panoramio.php">Panoramio (and HTML5 GeoLocation)</a></li>
        </ul>
    </section>
   

    <section id="requirements">
        <a href="#menu">Up</a>
        <h2>Requirements</h2>
        
        
        
        <p>Mosaiqy was specifically designed for HTML5 pages, with easier integration with 
        Paul Irish's <a href="http://html5boilerplate.com/">HTML5 boilerplate</a>.</p>
        
        <p>If you don't use HTML5 boilerplate (as neither do all demo pages) you could run anyway this plugin:
        all you need is to choose the HTML5 doctype defining multiple <code>&lt;html&gt;</code> tags
        wrapped on conditional comment.
        </p>
        
        <pre><code>&lt;!doctype html&gt;
&lt;!--[if lt IE 7]&gt; &lt;html class="no-js ie6" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 7]&gt;    &lt;html class="no-js ie7" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 8]&gt;    &lt;html class="no-js ie8" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if gt IE 8]&gt;&lt;!--&gt;  &lt;html class="no-js" lang="en"&gt; &lt;!--&lt;![endif]--&gt;
&lt;head&gt;
...</code></pre>

        <p>
            if you do not load <a href="http://www.modernizr.com/" target="new">modernizr</a> into your page, please make sure to insert the
            snippet below into your <code>&lt;head&gt;</code> section.<br />
            If you plan to run this plugin on IE versions prior to 9 you will need to include <a
            href="http://html5shim.googlecode.com" target="new">shiv</a> (you may omit the protocol) and
            <a href="http://jdbartlett.github.com/innershiv/" target="new">innerShiv</a> scripts
            inside a conditional comment.
        </p>
        
        <pre><code>&lt;head&gt;
    &lt;!--[if lt IE 9]&gt;
        &lt;script src="//html5shim.googlecode.com/svn/trunk/html5.js"&gt; &lt;/script&gt;
        &lt;script src="http://jdbartlett.github.com/innershiv/innershiv.min.js"&gt; &lt;/script&gt;
    &lt;![endif]--&gt;
    &lt;script&gt;
        (function(doc) { 
            doc.className = doc.className.replace(/(^|\b)no\-js(\b|$)/, 'js');
        }(document.documentElement));
    &lt;/script&gt;
    ...
&lt;/head&gt;</code></pre>
        
        <p>
        Finally, simply include the CSS file, then jQuery 1.6+ and the javascript plugin (for performance reasons
       <a href="http://developer.yahoo.com/blogs/ydn/posts/2007/07/high_performanc_5/" target="new">include scripts at the
        bottom</a> of your document).</p>

        <pre><code>&lt;link rel="stylesheet" media="screen" href="lib/lib-css/mosaiqy.css" /&gt;</code></pre>
        
        <pre><code>&lt;script src="//ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"&gt; &lt;/script&gt;
&lt;script src="lib/mosaiqy-1.0.0.min.js" id="mosaiqy-tpl"&gt;&lt;/script&gt;</code></pre>

    </section>
    
    <section id="how-to-use">
        <a href="#menu">Up</a>
        <h2>How to use</h2>
        
        <p>
            The first thing to know is <strong>how</strong> the plugin works: the blocks on the grid are
            generated by a HTML5 template (the highlighted rows) and the information about images (path of thumbnail/zoom and description)
            are retrieved by a JSON/JSONP data structure. This is the javascript snippet I used for the example in this page (you can find it at the bottom of the source code)
        </p>
        
        <pre><code>&lt;script src="lib/mosaiqy-1.0.0.js" id="<b>mosaiqy_tpl</b>"&gt;
<em>    &lt;div&gt;
        &lt;figure&gt;&lt;a href="images/zoom/<b>${img}</b>"&gt;&lt;img src="images/thumb/<b>${img}</b>" <b>longdesc</b>="..."&gt;
          &lt;figcaption&gt;<b>${desc}</b>&lt;/figcaption&gt;&lt;/a&gt;
        &lt;/figure&gt;
    &lt;/div&gt;</em>
&lt;/script&gt;

&lt;script&gt;
$(document).ready(function() {
    $('.mosaiqy').mosaiqy({
        template  : "<b>mosaiqy_tpl</b>",
        ...
        data      : [
            { <b>img</b> : "1.jpg", <b>desc</b>: "Rifugio &laquo;Citt&agrave; di Fiume&raquo;" }
            ...
        ]
    });
    
});
&lt;/script&gt;</code></pre>
        
    <p>When you call the plugin you can specify some options (listed below). The most important one is <b>data</b>
    who accept an array of objects, each one containing the information about a single image (thumb and zoom).
    In this example, every object has <b>img</b> and a  <b>desc</b> key (of course you can name your
    keys as you want). These key are dinamically replaced on the HTML5 template above
    respectively where the placeholders <b>${img}</b> and <b>${desc}</b> occur.</p>
    
    <p>If your data structure is not flat and you need to find a key into nested sub-objects you can use dot-notation.
    if the JSON is like so</p>
    
    <pre><code>data : [
           {
               <b>images</b> : {
                   <b>low_resolution</b> : {
                       <b>url</b> : "1.jpg" 
                   }
               }
           },
            ...
]
    </code></pre>
    <p>
        like in the instagram integration demo, then the placeholder is <b>${images.low_resolution.url}</b>.
    </p>
    
    <p>Some constraints:</p>
    <ol>
        <li>The template <b>must</b> be defined inside a <code>&lt;script&gt;</code> element
        (I wrote mine in the element that loads the plugin, just to reduce code) which <b>must</b> define
        an <strong>id</strong> attribute specified as the <b>template</b> option value;
        <li>The template <b>must</b> contain at least that specific markup. 
        The thumbnail is represented by an <code>&lt;img&gt;</code> element wrapped in a <code>&lt;a&gt;</code> element (pointing to its zoom) and the
    <code>&lt;figcaption&gt;</code> should contain image caption and/or information. This minimum markup is necessary to make the plugin
    properly work.</li>
    </ol>
    
    <p>Of course you can add other markup than this or hide the existing one via css but remember that
    the template code will be injected into a <code>&lt;li&gt;</code> element, so be sure <strong>not</strong> to wrap your template in
    a list-item (I used a simple <code>&lt;div&gt;</code>).
    </p>
    
    <p>If you also specify an URL for the <code>longdesc</code> attribute on the thumbnail image, <strong>your zoom image will
    be automatically linked</strong> to that address. This behaviour could be necessary when using the plugin with an external
    service integration - like panoramio - where a link to the photo or to the user page is requested by the
    terms of service.
    </section>
    
    
    <section>
        <a href="#menu">Up</a>
        <h2>Options</h2>

      
        <dl>
            <dt>animationDelay</dt>
            <dd>the number of milliseconds between a slide effect and the next one.
                <em>Default value: 3000 (3s)</em>
            </dd>
            
            <dt>animationSpeed</dt>
            <dd>the number of milliseconds of slide effects.
            <em>Default value: 800 (0.8s)</em></dd>
            
            <dt id="opt-avoidDuplicates">avoidDuplicates</dt>
                <dd>boolean flag (true or false). If the <a href="#opt-loop">loop</a> option is set to true,
                the plugin loads a thumbnail
                from the json even if the same image is already inside the grid. If <code>avoidDuplicates</code>
                is set to true and JSON provides enough different images to load, the plugin will try to avoid
                injecting duplicate thumbnails. Since this option performs some extra operation its 
                value is by default set to false.
                <em>Default value: false</em></dd>
            <dt>cols</dt>
            
            <dd>the number of columns of the grid.
            <em>Default value: 2</em></dd>
            
            <dt>fadeSpeed</dt>
            <dd>the number of milliseconds needed for fadeIn/fadeOut effects while opening and
            closing zoom images.</dd>
            
            <dt>indexData</dt>
            <dd>the number representing the JSON index from which the plugin should start to
            retrieve information. This could be useful to skip some initial images or to allow
            duplication of some thumbnails.
            <em>Default value: 0</em></dd>
            
            <dt>loadTimeout</dt>
            <dd>the number of milliseconds to wait before discarding an image (thumbnail and zoom)
            due to excessive latency, network errors, 404 and so on.
            <em>Default value: 7500 (7,5s)</em></dd>
            
            <dt id="opt-loop">loop</dt>
            <dd>boolean flag (true or false). if this option is set to false, when latest JSON
            image is injected (regarding to <a href="#opt-avoidDuplicates">avoidDuplicates</a> option)
            the plugin stops all sliding effects over the thumbnails. Otherwise JSON is reloaded
            continuously on a loop.
            <em>Default value: false</em>
            </dd>
            
            <dt>rows</dt>
            <dd>the number of rows of the grid.
            <em>Default value: 2</em></dd>
            
            <dt>scrollZoom</dt>
            <dd>boolean flag (true or false). When set to true, on the click event over a thumbnail the plugin
            will try to scroll the entire page until the thumbnail reaches the top boundary, then the zoom
            image will be opened. When set to false no scroll is performed.
            <em>Default value: true</em></dd>
            
            <dt>template</dt>
            <dd>the id of the <code>&lt;script&gt;</code> elements in which the markup of template has been
            defined by the user.</dd>
            
        </dl>
    </section>
    
    
    <section id="thanks-to">
        <a href="#menu">Up</a>
        <h2>Thanks to</h2>
        <p>
            I'd like to (randomly) cite some people whose work gave me the possibility to realize mine.
        </p>
        <p>
            <strong>Alex Sexton</strong>, for its article on <a href="http://alexsexton.com/?p=51" target="new">Using Inheritance
            Patterns to Organize Large jQuery Applications</a>, <strong>Dale Harvey</strong> for its beautiful
            <a href="http://arandomurl.com/2011/04/02/jquery-couch-js-documentation.html" target="new">JsDoc template</a>
            whose elegance and cleanliness definitely convinced me to properly document my Javascript code,
            <strong>Addy Osmany</strong>, for its article on <a href="http://addyosmani.com/blog/css3transitions-jquery/"
            target="new">CSS3 Animation With jQuery Fallbacks</a>, <strong>Adam Luikart (adamesque)</strong> for its
            <a href="https://gist.github.com/adamesque" target="new">code gists</a> on jQuery deferred objects</a>.
            Then <strong>Silvia Nucci</strong>, <strong>Giulia Alfonsi</strong> for suggestions,
            testing and brainstorming, <strong>Roberto Butti</strong> for original idea, integration suggestion
            and finally thanks to my wife <strong>Laura</strong> for the patience.
            
        </p>
    </section>
    
    <!--
            A great thank goes to the melon's cream at 17% I found in a local fair, who gave me the opportunity
            to easily reach the well-known Ballmer peak (http://xkcd.com/323/) helping me in some circustances
            on writing code. Sometimes I think if I had not documented the plugin, maybe today I couldn't tell
            how the hell my code works :-)
    -->
        
        
      
        
        
        
        
        
    <!-- Javascript is here below -->
        
    
<?php
        $rows = 4;
        $cols = 3;
            
        if (isset($_POST['gridsize'])) {
            list($rows, $cols) = explode("x", $_POST['gridsize']);
        }
            
        require "includes/lib.php"?>
        <div>
            <figure><a href="images/zoom/${img}"><img src="images/thumb/${img}">
              <figcaption>${desc}</figcaption></a>
            </figure>
        </div>
    </script>
    

    <script>
    $(document).ready(function() {
        $('.mosaiqy').mosaiqy({
            template        : "mosaiqy_tpl",
            rows            : <?php echo $rows ?>,
            cols            : <?php echo $cols ?>,
            avoidDuplicates : true,
            animationDelay  : 500,
            animationSpeed  : 1200,
            loop            : true,
            loadTimeout     : 5000,
            indexData       : 12,
<?php
                require "includes/json.php";
?>
            
            
        });
        
    });
    </script> 

        
        
        
        
    
    
    
    
    
    <!-- this is not needed for plugin but if you need a simple page scroller... -->
    <script>
    $(document).ready(function() {
        var page  =  ($.browser.opera)? $("html") : $("html,body");
        
        $('section > a').bind('click', function(evt) {
            var elementID       = $(this).attr('href'),
                elementOffset   = $(elementID).offset().top;
                pageOffset      = (document.body.scrollTop !== 0)
                                    ? document.body.scrollTop
                                    : document.documentElement.scrollTop;
                                    
            var pageScroll      = (pageOffset - elementOffset),
                timeScroll      = (pageScroll < 2000)
                                    ? pageScroll * 1.25
                                    : 2500;
            
            if (pageScroll) {   
                page.animate({ scrollTop: elementOffset }, timeScroll);
            }
            
            evt.preventDefault();
        });
    })
    </script>
    
     
</body>
</html>