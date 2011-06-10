<?php require "includes/header.php" ?>

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
    <section>
        <h2>Choose another grid size (with 12 photos)</h2>
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
            <li><a href="#how-to-install">How to install &amp; Requirements</a>
            <li><a href="#how-to-use">How to use</a>
            <li><a href="#license">License</a>
            <li><a href="#download">Download</a>
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
   

    <section id="how-to-install">
        <h2>How to Install &amp; Requirements</h2>
        
        
        
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
            <a href="http://jdbartlett.github.com/innershiv/" target="new">innerShiv</a> scripts.
            inside conditional comments.
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
&lt;script src="lib/mosaiqy-1.0.0.min.js"&gt; &lt;/script&gt;<sup>(&dagger;)</sup></code></pre>

        <p>
            <small>(&dagger;) Note: the regular version of the script  is ~ 45Kb, it has many debug statements and then a lot of
            overhead due to internal function &amp; console calls, so please use always the minified script. Your users will appreciate it.</small>
        </p>
        <p>
            Now you're ready to use mosaiqy on you page. For any doubt
            you are strongly encouraged to take a look at the source code of the demo pages.</p>
    </section>
    
    
    <section id="thanks-to">
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
    
    <section id="special-thanks">
        <h2>Special thanks to</h2>
        <p>
            A great thank goes to the melon's cream at 17% I found in a local fair, who gave me the opportunity
            to easily reach the well-known <a href="http://xkcd.com/323/"
            title="A moderate alcohol quantity is definitely a javascript good part. Crockford should tell about it"><q>Ballmer
            peak</q></a> who helped me in some circustances on writing code. Sometimes I think if I had not documented the
            plugin, maybe today I couldn't tell how the hell my code works :-)
        </p>
    </section>
        
        
    <?php
        $rows = 4;
        $cols = 3;
            
        if (isset($_POST['gridsize'])) {
            list($rows, $cols) = explode("x", $_POST['gridsize']);
        }
            
        require "includes/lib.php"
    ?>
        
        <div>
            <figure><a href="images/zoom/${img}"><img src="images/thumb/${img}">
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
            avoidDuplicates : true,
            animationDelay  : 1500,
            loop            : true,
            loadTimeout     : 5000,
            indexData       : 12,
<?php
                require "includes/json.php";
?>
            
            
        });
        
    });
    </script>



     
</body>
</html>