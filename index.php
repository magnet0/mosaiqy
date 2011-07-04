<?php require "includes/header.php" ?>
        
        
        
    <!--
       Javascript is on bottom of the page.
    -->

</head>

<body>

    <?php require "includes/title.php" ?>

    
    <div class="loading mosaiqy">
        <ul></ul>
    </div>
    
 
    
    <?php
        $gs = (isset($_POST['gridsize']))? $_POST['gridsize'] : "4x3" ;
    ?>

    
    <section id="menu" class="noprint">
        <h2>Click a thumbnail / choose another grid size</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">        
            <select name="gridsize" onchange="this.parentNode.submit()">
                <option value="3x4" <?php if ($gs == "3x4") echo "selected"; ?> >3 rows - 4 cols</option>
                <option value="4x3" <?php if ($gs == "4x3") echo "selected"; ?> >4 rows - 3 cols</option>
                <option value="6x2" <?php if ($gs == "6x2") echo "selected"; ?> >6 rows - 2 cols</option>
                <option value="12x1" <?php if ($gs == "12x1") echo "selected"; ?> >12 rows - 1 cols</option>
            </select>
        </form>
    </section>

    <?php require "includes/socialshare.php" ?>

    <nav class="noprint">
        <ul class="ibw">
            <li><a href="#demos">Demos & service integration</a>
            <li><a href="#requirements">Requirements</a>
            <li><a href="#how-to-use">How to use</a>
            <li><a href="#options">Options</a>
        </ul>
        <ul class="ibw">
            <li><a href="#changelog">Changelog</a>
            <li><a href="#download">License &amp; Download</a>
            <li><a href="#donate">Donate</a>
            <li><a href="#about">About the author</a>
            <li><a href="#thanks-to">Thanks to</a>
        </ul>   
    </nav>
    
    
    
    <section id="demos">
        <p>
            Mosaiqy is a jQuery plugin &mdash; released on June 29, 2011 &mdash; for viewing and zooming photo working on Opera 9+, Firefox 3.6+, Safari 3.2+,
            Chrome and IE7+. Photos are retrieved from a JSON/JSONP data structure and randomly moved inside the grid. All expensive animations are taken over by your GPU on recent browsers using CSS3 transitions, minimizing
            the CPU overhead. <small>(for technical detail see README file on github project).</small>
        </p>
        
        <h2>Demos & service integration</h2>
        <p>
            So far, integration demo with Flickr, Instagram and Panoramio were realized. If you'd like to see
            some other examples with your favourite service (not yet listed here) just let me know:
        </p>
        <ul>
            <li><a href="mosaiqy-mixed-load.php"><strong>Mixing initial images JSON/HTML</strong></a></li>
            <li><a href="mosaiqy-flickr.php"><strong>Flickr</strong></a></li>
            <li><a href="mosaiqy-instagram.php"><strong>Instagram</strong></a></li>
            <li><a href="mosaiqy-panoramio.php"><strong>Panoramio (and HTML5 GeoLocation)</strong></a></li>
        </ul>
    </section>
   

    <section id="requirements">
        <a href="#menu">Up</a>
        <h2>Requirements</h2>
        
        
        
        <p>Mosaiqy was specifically designed for <strong>jQuery 1.6</strong> or newer and HTML5 pages, for an easy integration with 
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
        &lt;script src="http://jdbartlett.com/innershiv/innershiv.js"&gt; &lt;/script&gt;
    &lt;![endif]--&gt;
    &lt;script&gt;
        (function(doc) { 
            doc.className = doc.className.replace(/(^|\b)no\-js(\b|$)/, 'js');
        }(document.documentElement));
    &lt;/script&gt;
    ...
&lt;/head&gt;</code></pre>
        
        <p>
        Finally, simply include the CSS file, then jQuery and the javascript plugin (for performance reasons
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
        
        <pre><code>&lt;script src="lib/mosaiqy-1.0.0.min.js" id="<b>mosaiqy_tpl</b>"&gt;
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
        
    <p>The plugin looks for an element with class <code>.mosaiqy</code> with a nested unordered list <code>ul</code>.
    As you can see on the first demo available, the list could be empty or partially filled with list-items in which
    you have replicated your template with real data (for SEO purposes or other)</p>
    
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
    
    <p>You can also add other markup than this or hide the existing one via css but remember that
    the template code will be injected into a <code>&lt;li&gt;</code> element, so be sure <strong>not</strong> to wrap your template in
    a list-item (I used a simple <code>&lt;div&gt;</code>).
    </p>
    
    <p>If you also specify an URL for the <code>longdesc</code> attribute on the thumbnail image, <strong>your zoom image will
    be automatically linked</strong> to that address. This behaviour could be necessary when using the plugin with an external
    service integration - like panoramio - where a link to the photo or to the user page is requested by the
    terms of service.</p>
    </section>
    
    
    <section id="options">
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
    
   <section id="changelog">
         <a href="#menu">Up</a>
         <h2>Changelog</h2>
         
         <div>
            <h3>Version 1.0.0</h3>
            <ul>
               <li>Initial release</li>
            </ul>
            <h3>Todo for next version</h3>
            <ul>
               <li>Callbacks after/before zoom opening and after/before zoom closing</li>
            </ul>
         </div>
         
   </section>
   
   <section id="download" class="noprint">
         <a href="#menu">Up</a>
         <h2>License &amp; Download</h2>
        
         <p>
            Mosaiqy is an opensource project released under the <a href="http://creativecommons.org/licenses/by-nd/3.0/" target="new">Creative
            Commons Non-Derivative</a> (CC BY-ND 3.0) license. This means you are free to copy, distribute and transmit the work,
            to make also commercial use of the work under some restrictions (see carefully the link above). 
         </p>
        
         <?php $hitcount = @file_get_contents('count.txt') ?>
         <p id="dwlink">
            <a href="mosaiqy1.0.0.zip">Download CSS, JS and Demos <small>(approx. 1.26 Mb)</small>
            <ins>Checksum: 60b20b47d260071f27db85600bef3d292bfa5f24 &mdash; Downloaded <?php echo $hitcount ?> times</ins></a>
            <a href="lib/mosaiqy-1.0.0.min.js">Download only minified JS <small>(8.3 kb)</small>
            <ins>Checksum: b1d7b37f87fba0ace8ca108eda0bf2347c688667</ins></a>
         </p>
        
        <p>
            <strong>Note</strong>: the <a href="lib/mosaiqy-1.0.0.js" target="new">original source code</a> is meant for <strong>development
            purposes only</strong>  since it's 45.7Kb and it contains debug statements, thus it's not suitable for production
            environment. Use it anyway for check the overall quality of the code and/or when you have to debug your
            application (look at log messages into the Firefox console or
            Chrome Toolbar or Opera Dragonfly).
         </p>
         <p>            
            Source code of Mosaiqy and all the code of this site are <a href="https://github.com/fcalderan/mosaiqy"
            target="new">hosted on github</a>.
        </p>
    </section>
    
    
    <section id="donate" class="noprint">
        <a href="#menu">Up</a>
        <h2>Donate</h2>
        
        <p>
            This plugin is free for <strong>any</strong> purposes but if you like it and you use
            it on your projects please really consider to donate a fair amount (especially if you include it on
            commercial sites) since you saved a lot of time in development (I spent
            more than 200 hours of nightly/weekend job, between feasibility study, coding, testing and writing documentation).
            Of course feel free to choose a different amount.
        </p>
        <p>
            I will really appreciate your support &mdash; thank you! =)<br /> <small><b>Note:</b> PayPal takes a 3.4%
            + 0.50 &euro; commission on all donations. Please mind this when donating.</small>
        </p>
    
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            
            <div>
                <fieldset id="chooseamount">
                    <label for="amount">Enter an amount</label>
                    <span><b id="currency_sign">&euro;</b><input type="text" name="amount" id="amount" value="4"
                        placeholder="4.00" maxlength="7"></span> 
                </fieldset>
                <fieldset  id="choosecurr">
                    <label>Choose a currency</label>
                    <ul>
                        <li class="current"><span data-currency="EUR"  title="EUR">&euro;</span></li>
                        <li><span data-currency="USD" title="USD (4&euro; is approx. 5.80$)">$</span></li>
                        <li><span data-currency="GBP" title="GBP (4&euro; is approx. 3.65£)">£</span></li>
                        <li><span data-currency="JPY" title="JPY (4&euro; is approx. 470&yen;)">&yen;</span></li>
                    </ul>
                </fieldset>
            </div>
            
            <div>
                <fieldset id="mecenate">
                    <label for="donate_name">Your name</label>
                    <span><input type="text" name="donate_name" id="donate_name" maxlength="30" placeholder="anonymous" value="anonymous"></span>
                    <button type="submit" name="submit">Donate via Paypal</button>
                </fieldset>
                
                <input type="hidden" name="cmd" value="_xclick">  
                <input type="hidden" name="business" value="paypal@fabriziocalderan.it">  
                <input type="hidden" name="item_name" value="Mosaiqy plugin for jQuery">  
                <input type="hidden" name="item_number" value="1">  
                <input type="hidden" name="no_shipping" value="0">  
                <input type="hidden" name="no_note" value="1">  
                <input type="hidden" name="lc" value="EN">
                <input type="hidden" name="return" value="http://www.fabriziocalderan.it/mosaiqy/thankyou.php">

                
                <input type="hidden" id="paypal_currency" name="currency_code" value="EUR">
                
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </div>
        </form>
    </section>
    
    <section id="about">
        <a href="#menu">Up</a>
        <h2>About the author</h2>
        <p>
            Mosaiqy was developed by <strong>Fabrizio Calderan</strong>, a frontend developer who lives in Italy and works
            for a digital media company located in the middle of bucolic venetian countryside, only one mile far from
            the beautiful <a href="http://goo.gl/u97TM" target="new">lagoon of Venice</a>.
        </p>
        <p>
            For bug report you can contact me at <strong style="direction: rtl;unicode-bidi: bidi-override;">
            ti.naredlacoizirbaf[ta]<!--thispage@need.moreunicorns.com-->yqiasom</strong>. Other contacts:
            <a href="http://twitter.com/#!/fcalderan" target="new">twitter</a> and <a
            href="http://www.linkedin.com/in/fabriziocalderan" target="new">linkedin</a>
        </p>
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
            Then <strong>Paul irish</strong>, <strong>Robert Casanova</strong>, <strong>Silvio Cioni</strong>, <strong>Silvia Nucci</strong>, <strong>Giulia Alfonsi</strong> for suggestions,
            testing and brainstorming, <strong>Roberto Butti</strong> for sharing the idea and for integration suggestions
            and finally thanks to my wife <strong>Laura</strong> for the patience.
            
        </p>
    </section>
    
    
    
    <!--
            A great thank goes to the melon's cream at 17% I found in a local fair, who gave me the opportunity
            to easily reach the well-known Ballmer peak (http://xkcd.com/323/) helping me in some circustances
            on writing code. Sometimes I think if I had not documented the plugin, maybe today I couldn't tell
            how the hell my code works =)
    -->
    
    
    <?php require "includes/socialshare.php" ?>
    
    
    
    
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
            animationDelay  : 1000,
            animationSpeed  : 1200,
            loop            : true,
            loadTimeout     : 5000,
<?php
                require "includes/json.php";
?>
            
            
        });
        
    });
    </script> 

        
        
        
        
    
    
    
    
    
    <!-- this is not needed for plugin but if you need a simple page scroller... -->
    <script>
    $(document).ready(function() {
        var page        =  ($.browser.opera)? $("html") : $("html,body"),
            pagescroll  =  function(evt) {
            var elementID       = $(this).attr('href'),
                elementOffset   = $(elementID).offset().top;
                pageOffset      = (document.body.scrollTop !== 0)
                                    ? document.body.scrollTop
                                    : document.documentElement.scrollTop;
                                    
            var pageScroll      = Math.abs(pageOffset - elementOffset),
                timeScroll      = (pageScroll < 2000)
                                    ? pageScroll * 1.25
                                    : 2500;
            
            if (pageScroll) {   
                page.animate({ scrollTop: elementOffset }, timeScroll, function() {
                    location.href = elementID;
                });
            }
            
            evt.preventDefault();
        };
        
        
        
        $('nav a').bind('click', pagescroll);
        $('section > a').bind('click', pagescroll);
        
        $('#choosecurr li').bind('click', function() {
            var $this = $(this);
            
            $('li.current').removeClass('current');
            $this.addClass('current');
            $('#paypal_currency').val($this.find('span').data('currency'));
            $('#currency_sign').html($this.find('span').html());
        })
               
        $('#chooseamount input')
        .bind('blur', function() {
            var $this   = $(this),
                val     = parseFloat($this.val());
            $this.val((isNaN(val) || (val < 1))? '1.00' : val.toFixed(2));
        })
        .bind('keydown', function(e) {
            var $this   = $(this),
                val     = $this.val(),
            
            editingKeys = {
                '8'   : 'delete',
                '9'   : 'tab',
                '46'  : 'canc',
                '37'  : 'leftarrow',
                '39'  : 'rightarrow',
                '190' : 'dot1'
            },
                
            key = e.which || e.keycode,
            keynum = (key > 47) && (key < 58),
            keypad = (key > 95) && (key < 106);
            
            if (key == 190) {
                return (0 > val.indexOf('.'))
            }
            
            if (!keynum && !keypad) {
                return (key in editingKeys);
            }
        });
        
   })
   
   </script>
    
     
</body>
</html>