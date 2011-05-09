"use strict";
/**
 * @fileOverview Mosaiqy for jQuery
 * @version 0.1
 * @author Fabrizio Calderan, http://www.fabriziocalderan.it/, twitter : fcalderan
 */

(function($) {

    var
    /**
     * This function enable logging where available on dev version.
     * If console object is undefined then log messages fail silently
     * @function
     * @returns { Undefined }
     */
    appDebug = function() {
        var args = Array.prototype.slice.call(arguments),
            func = args[0];
        if (typeof console !== 'undefined') {
            if (typeof console[func] === 'function') {
                console[func].apply(console, args.slice(1));
            } 
        }
    },
    
    /**
     * @function
     * @param { String } ua     Current user agent specific string
     * @param { String } prop   The property we want to check
     * 
     * @returns { Object }
     * <pre>
     *      isEnabled       : True if acceleration is available, false otherwise;
     *      transitionEnd   : Event available on current browser;
     *      duration        : Vendor specific CSS property.
     * </pre>
     * @description
     * Detect if GPU acceleration is enabled for transitions.
     * code gist mantained at https://gist.github.com/892739
     */
    GPUAcceleration = (function(ua, prop) {
    
        var div     = document.createElement('div'),
            cssProp = function(p) {
                return p.replace(/([A-Z])/g, function(match, upper) {
                    return "-" + upper.toLowerCase();
                })
            },
            vendorProp,
            uaList  = {
                msie    : 'MsTransition',
                opera   : 'OTransition',
                mozilla : 'MozTransition',
                webkit  : 'WebkitTransition'
            };
            
        for (var b in uaList) {
            if (uaList.hasOwnProperty(b)) {
                if (ua[b]) { vendorProp = uaList[b]; }
            }
        }
                
        return {
            isEnabled       : (function(s) {
                return !!(s[prop] || vendorProp in s  || (ua.opera && parseFloat(ua.version) > 10.49));
            }(div.style)),
            transitionEnd   : (function() {
                return (ua.opera)
                    ? 'oTransitionEnd'
                    : (ua.webkit)? 'webkitTransitionEnd' : 'transitionend';
            }()),
            duration        : cssProp(vendorProp) + '-duration'
        }
   }($.browser, 'transition')),
    
    
     /**
     * @class
     * @final
     * @name Mosaiqy
     * @returns public methods of Mosaiqy object for its instances.
     */
    Mosaiqy = function($) {

        /**
         * @private
         * @name MyClass-_s
         * @type { Object }
         * @description
         * Settings for current instance
         */
        var _s = {
            animationDelay      : 3000,
            animationSpeed      : 800,
            cols                : 4,
            dataIndex           : 0,
            loop                : true,
            rows                : 3,
            startFade           : 750,
            template            : null
        },
        
        _cnt, _ul, _li, _img,

        _points             = [],
        _tplCache           = {},
        _animationPaused    = false,
        _animationRunning   = false,
        _dataIndex          = _s.dataIndex || 0,
        _thumbSize          = {},
        _page               = ($.browser.opera)? $("html") : $("html,body"),
        _intvAnimation,
        
        /**
         * @private
         * @name Mosaiqy#_setInitialImageCoords
         * @description
         * 
         * Sets initial position (offset X|Y) of each list items and the width
         * and min-height of the container. It doesn't set the height property
         * so the wrapper can easily expand when a zoom image has been
         * requested.
         */
        _setInitialImageCoords  = function() {
            var li          = _li.eq(0);
            
            _thumbSize   = { w : li.outerWidth(true), h : li.outerHeight(true) };
            /**
             * defining li X,Y offset
             * [~~] is the bitwise op quickest equivalent to Math.floor()
             * http://jsperf.com/bitwise-not-not-vs-math-floor
             */
            _li.each(function(i, el) {
                $(el).css({
                    top     : _thumbSize.h * (~~(i/_s.cols)),
                    left    : _thumbSize.w * (i%_s.cols)
                });
            });
            
            /* defining container size */
            _ul.css({
                minHeight   : _thumbSize.h * _s.rows,
                width       : _thumbSize.w * _s.cols
            });
            _cnt.css({
                minHeight   : _thumbSize.h * _s.rows,
                width       : _thumbSize.w * _s.cols
            });
        },
    
        /**
         * @private
         * @name Mosaiqy#_getPoints
         * @description
         * 
         * _getPoints object stores 4 information
         * <ol>
         *   <li>The direction of movement (css property)</li>
         *   <li>The selection of nodes to move (i.e in a 3x4 grid, point 4 and 5 have
         *      to move images 2,6,10)</li>
         *   <li>The position in which we want to inject-before the new element (except
         *      for the last element which needs to be injected after)</li>
         *   <li>The position (top and left properties) of entry tile</li>
         * </ol>
         * 
         * <code><pre>
         *    [0,8,1,9,2,10,3,11, 0,4,4,8,8,12*]    * = append after
         *    
         *        0   2   4   6
         *    8 |_0_|_1_|_2_|_3_| 9
         *   10 |_4_|_5_|_6_|_7_| 11
         *   12 |_8_|_9_|_10|_11| 13    
         *        1   3   5   7
         * </pre></code>
         * 
         * <p>
         * In earlier versions of this algorithm, the order of nodes was counterclockwise
         * (tlbr) and then alternating (tblr). Now this enumeration pattern (alternating
         * tb and lr) performs a couple of improvements on code logic and on readability:
         * </p>
         *
         * <ol>
         *   <li>Given an even-indexed node, the next adjacent index has the same selector:<br />
         *      e.g. points[8] = li:nth-child(n+1):nth-child(-n+4) [0123]<br />
         *           points[9] = li:nth-child(n+1):nth-child(-n+4) [0123]<br />
         *      (it's easier to retrieve this information)</li>
         *   <li>If a random point is even (i & 1 === 0) then the 'direction' property of node
         *      selection is going to be increased during slide animation. Otherwise is going
         *      to be decreased and then we remove first or last element (if random number is 9,
         *      then the collection has to be [3210] and not [0123], since we always remove the
         *      disappeared node when the animation has completed.)</li>
         * </ol>
         *
         * @example
         *    Another Example (4x2)
         *    [0,6,1,7, 0,2,2,4,4,6,6,8*]   * = append after
         *
         *        0   2
         *    4 |_0_|_1_| 5
         *    6 |_2_|_3_| 7
         *    8 |_4_|_5_| 9
         *   10 |_6_|_7_| 11
         *        1   3
         */
        _getPoints = function() {
            
            var c, n, s, /* internal counters */
                selectors = {
                    col : "li:nth-child($0n+$1)",
                    row : "li:nth-child(n+$0):nth-child(-n+$1)"
                };
            
            /* cols information */
            for (n = 0; n < _s.cols; n = n + 1) {
                
                s = selectors.col.replace(/\$(\d)/g, function(selector, i) {
                    return [_s.cols, n + 1][i]; });
                    
                _points.push({ prop: 'top', selector : s, node : n,
                    position : {
                        top     : -(_thumbSize.h),
                        left    : _thumbSize.w * n
                    }
                });
                _points.push({ prop: 'top', selector : s, node : _s.cols * (_s.rows - 1) + n,
                    position : {
                        top     : _thumbSize.h * _s.rows,
                        left    : _thumbSize.w * n
                    }
                });
            }
            
            /* rows information */
            for (c = 0, n = 0; n < _s.rows; n = n + 1) {
                
                s = selectors.row.replace(/\$(\d)/g, function(selector, i) {
                    return [c + 1, c + _s.cols][i]; });
                    
                _points.push({ prop: 'left', selector : s, node : c,
                    position : {
                        top     : _thumbSize.h * n,
                        left    : -(_thumbSize.w)
                    }
                });
                _points.push({ prop: 'left', selector : s, node : c += _s.cols,
                    position : {
                        top     : _thumbSize.h * n,
                        left    : _thumbSize.w * _s.cols
                    }
                });
            }
            
            _points[_points.length - 1].node -= 1;
            appDebug("groupCollapsed", 'points information');
            appDebug(($.browser.mozilla)?"table":"dir", _points);
            appDebug("groupEnd");
        },
        
        
        _setNodeZoomEvent   = function(node) {
                
            var $nodezoom, $this, $current, i, zoomRunning,
                pagePos, targetPos, diffPos;
            
            node.live('click', function(evt) {

                $this = $(this);
                
                if (!_animationRunning && !zoomRunning) {
                    /**
                     * find the index of «li» selected, then retrieve the element placeholder
                     * to append the zoom node.
                     */ 
                    i = _s.cols * (Math.ceil((_li.index($this) + 1) / _s.cols));
                    
                    if (!_cnt.hasClass('zoom')) {
                        /* no zoom has already opened */
                        openZoom();
                    }
                    else {
                        /* a zoom is currently opened */
                        if (!$this.hasClass('zoom')) {
                            openZoom(closeZoom())
                        }
                    }
                }
                evt.preventDefault();
            });
            
            
            function closeZoom() {
                var dfd = $.Deferred();
                $current.removeClass('zoom');
                $.when($nodezoom._animate({ height : '0' }, 750))
                    .done(function() {
                        $nodezoom.remove();
                        _cnt.removeClass('zoom');
                        dfd.resolve();
                    });
                return dfd.promise();
            };
            
            
            function openZoom(previousClose) {
                
                zoomRunning = true;
                
                $.when(previousClose)
                    .done(function() {
                        
                        _cnt.addClass('zoom');
                        $current = $this;
                        $current.addClass('zoom');
                        
                        /**
                         * webkit bug: http://code.google.com/p/chromium/issues/detail?id=2891 
                         */                    
                        targetPos   = $this.offset().top;
                        pagePos = (document.body.scrollTop != 0)
                            ? document.body.scrollTop
                            : document.documentElement.scrollTop;
                    
                        diffPos = Math.abs(pagePos - targetPos);
                    
                        
                        /**
                         * need to create the zoom node then append it and then open it
                         */
                        $nodezoom = $('<li id="mosaiqy-zoom"></li>');
                        if (i < _li.length) {
                            $nodezoom.insertBefore(_li.eq(i));
                        }
                        else {
                            $nodezoom.appendTo(_ul);
                        }
                        
                        $.when(_page.stop()._animate({ scrollTop: targetPos }, ((diffPos > 0) ? ((diffPos * 1.5) + 400) : 0)))
                            .done(function() {
                                viewZoom();
                            });
                    })
            }
            
            function viewZoom() {
                
                var zoomImage;
                
                $nodezoom._animate({ height : '200px' }, 750);
                
                $('<img />').attr({
                        id      : "mosaiqy-zoom-image",
                        src     : $this.find('a').attr('href')
                    }).appendTo($nodezoom);
                zoomImage = $('#mosaiqy-zoom-image');
                
                $.when(zoomImage.mosaiqyImagesLoad())
                    .done(function() {
                        $.when($nodezoom._animate({ height : zoomImage.height() + 'px' }, 750))
                            .done(function() {
                                zoomRunning = false;
                            })
                    })
                    .fail(function() {
                        closeZoom();
                        zoomRunning = false;
                    })
            }
        },
       
        
        _continueAnimation = function() {
            if (!_animationPaused) {
                _animationRunning = true;
                $.when(_animateSelection())
                    .done(function() {
                        _li = _ul.find('li');
                        _dataIndex = _dataIndex + 1;
                    })
                    .always(function () {
                        if (_dataIndex === _s.data.length) {
                            if (!_s.loop) {
                                return _pauseAnimation();
                            }
                            else {
                                _dataIndex = 0;
                            }
                        }
                        _animationRunning = false;
                        _intvAnimation = setTimeout(function() {
                            _continueAnimation();
                        }, _s.animationDelay)
                    });
            }
            else {
                _intvAnimation = setTimeout(function() {
                    _continueAnimation();
                }, _s.animationDelay)
            }
        },
        
        _pauseAnimation = function() {
            if (!!_intvAnimation) {
                clearInterval(_intvAnimation);
            }
        },
        
        _startAnimation = function() {
            _continueAnimation();
        },
        
        
        /**
         * @private
         * @name Mosaiqy#_animateSelection
         * @return a deferred promise
         * @description
         *
         * This method runs the animation cycle.
         */
        _animateSelection = function() {
            
            var rnd, tpl, referral, node, animatedSelection, isEven,
                dfd = $.Deferred();
           
            appDebug("groupCollapsed", 'call animate()');
            appDebug("info", 'Dataindex is', _dataIndex);
            
            //_li = _cnt.find('li');
            
            /**
             * Generate template to append with user data
             */
            if (typeof _tplCache[_dataIndex] === 'undefined') {
                _tplCache[_dataIndex] = _s.template.replace(/\$\{([^\}]+)\}/gm, function(data, key) {
                    if (typeof _s.data[_dataIndex][key] === 'undefined') {
                        return key;
                    }
                    return _s.data[_dataIndex][key];
                });
            }
            tpl = _tplCache[_dataIndex];
            
            /**
             * @ignore
             * rnd is in the range [0 .. _points.length - 1]
             * [~~] is the bitwise op quickest equivalent to Math.floor()
             * http://jsperf.com/bitwise-not-not-vs-math-floor
             */
            rnd = ~~(Math.random() * _points.length);
            
            
            isEven = ((rnd & 1) === 0);
            
            animatedSelection = _cnt.find(_points[rnd].selector);
            /**
             * @ignore
             * append new «li» element
             * if the random entry point is the last one then we append the
             * new node after the last «li», otherwise we place it before.
             */
            referral    = _li.eq(_points[rnd].node);
            node        = (rnd < _points.length - 1)?
                  $('<li />').insertBefore(referral)
                : $('<li />').insertAfter(referral);
                
            $(tpl).appendTo(node.css(_points[rnd].position));
            appDebug("info", "Random position is %d and its referral is node", rnd, referral);
            
            /**
             * Looking for images inside template fragment, wait the deferred
             * execution and checking a promise status.
             */
            $.when(node.find('img').mosaiqyImagesLoad())
            /**
             * No image/s can be loaded, remove the node inserted, then call
             * again the _animate method
             */
            .fail(function() {
                appDebug("warn", 'Skip dataindex %d, call _animate()', _dataIndex);
                appDebug("groupEnd");
                node.remove();
                dfd.reject();
            })
            /**
             * Image/s inside template fragment have been successfully loaded so
             * we can apply the slide transition on the selected nodes and the
             * added node
             */ 
            .done(function() {
                var prop            = _points[rnd].prop,
                    amount          = (prop === 'left')? _thumbSize.w : _thumbSize.h,
                    /**
                     * @ignore
                     * add new node into animatedNodes collection and change
                     * previous collection
                     */
                    animatedNodes   = animatedSelection.add(node),
                    animatedQueue   = animatedNodes.length,
                    move = {};
                
                move[prop] = '+=' + (isEven? amount : -amount) + 'px';
                appDebug("log", 'Animated Nodes:', animatedNodes);
                
                /**
                 * $.animate() function has been extended to support css transition
                 * on modern browser. For this reason I cannot use deferred animation,
                 * because if GPUacceleration is enabled the code will not use native
                 * animation. I could return a promise() in my custom animate() method
                 * but in this case is not worth the effort.
                 *
                 * See code below
                 */
                animatedNodes.animate(move , _s.animationSpeed,
                    function() {
                        var len;
                        
                        if (--animatedQueue) return;
                        
                        /**
                         * Opposite node removal. "Opposite" is related on sliding direction
                         * e.g. on 2->[159] (down) opposite has index 9
                         *      on 3->[159] (up) opposite has index 1
                         */
                        if (isEven) {
                            animatedSelection.last().remove();
                        }
                        else {
                            animatedSelection.first().remove();
                        }
                        
                        appDebug("log", 'Animated Selection:', animatedSelection);
                        animatedSelection = (isEven) 
                            ? animatedSelection.slice(0, animatedSelection.length - 1)
                            : animatedSelection.slice(1, animatedSelection.length);
                        
                        appDebug("log", 'Animated Selection:', animatedSelection);
                        
                        /**
                         * <p>Node rearrangement when animation affects a column. In this case
                         * a shift must change order inside «li» collection, otherwise the 
                         * subsequent node selection won't be properly calculated.
                         * Algorithm is quite simple:</p>
                         *
                         * <ol>
                         *   <li>The offset displacement of shifted nodes is always
                         *       determined by the number of columns except when shift direction is
                         *       bottom-up: in fact the last node of animatedSelection collection
                         *       represents an exception because its position is affected by the
                         *       presence of the new node (placed just before it);</li>
                         *   <li>offset is negative on odd entry point (down and right) and
                         *       positive otherwise (top and left);</li>
                         *   <li>at each iteration we retrieve the current «li» nodes in the
                         *       grid so we can work with actual node position.</li>
                         * </ol>
                         * 
                         * <p>If the animation affected a row, rearrangement of nodes is not needed
                         * at all, because insertion is sequential, thus the new node and shifted
                         * nodes already have the right index.</p>
                         */
                        if (prop === 'top') {
                            len = animatedSelection.length;
                            
                            animatedSelection.each(function(i) {
                                var node, curpos, offset, newpos;
                                
                                /**
                                 * @ignore
                                 * Retrieve node after each new insertion and rearrangement
                                 * of selected animating nodes 
                                 */ 
                                _li     = _cnt.find("li");
                                
                                node    = $(this);
                                curpos  = _li.index(node);
                                offset  = (isEven) ? _s.cols : -(_s.cols - ((1 === len - i)? 0 : 1));
                                        
                                if (!!offset) { 
                                    newpos  = curpos + offset;
                                    if (newpos < _li.length) {
                                        node.insertBefore(_li.eq(newpos));
                                    }
                                    else {
                                        node.appendTo(_ul);
                                    }
                                }
                            
                            });
                        };
                        appDebug("groupEnd");
                        dfd.resolve();
                    }
                )
            });
            
            return dfd.promise();
        };
        
        
        
        /**
         * @scope Mosaiqy
         */
        return {
            
            init    : function(cnt, options) {
                
                _s = $.extend(_s, options);
                
                /* Data must not be empty */
                if (!((_s.data || []).length)) {
                    appDebug("error", 'data object is empty');
                    return false;
                }
                /* Template must not be empty and provided as a script element */
                if (!!_s.template && $(_s.template).is('script')) {
                    _s.template = $(_s.template).text() || $(_s.template).html();
                }
                else {
                    appDebug("error", 'user template is not defined');
                    return false;
                }
                
                
                _cnt    = cnt;
                _ul     = cnt.find('ul');
                _li     = cnt.find('li');
                _img    = cnt.find('img');
                   
                               
                /* define image position and retrieve entry points */
                _setInitialImageCoords();
                _getPoints();
                
                /* set mouseenter event on container */
                _cnt.delegate("ul", "mouseenter.mosaiqy", function() {
                    _animationPaused = true;
                }).delegate("ul", "mouseleave.mosaiqy", function() {
                    if (!_cnt.hasClass('zoom')) {
                        _animationPaused = false;
                    }
                });
                
                
                
                $.when(_img.mosaiqyImagesLoad(function(img) { img.fadeIn(_s.startFade); }))
                /**
                 * All images have been successfully loaded
                 */
                .done(function() {
                    appDebug("info", 'All images have been successfully loaded');
                    _cnt.removeClass('loading');
                    _setNodeZoomEvent(_li);
                    _intvAnimation = setTimeout(function() {
                        _startAnimation();
                    }, _s.animationDelay + 2000)
                })
                /**
                 * One or more image have not been loaded
                 */
                .fail(function() {
                    appDebug("warn", 'One or more image have not been loaded');
                    return false;
                });
                
                return this;
            }
        };
    },
    
    
    /**
     * @name _$.fn
     * @description
     * 
     * Some chained methods are needed internally but it's better avoid jQuery.fn
     * unnecessary pollution. Only mosaiqy plugin/function is exposed as jQuery
     * prototype.
     */
    _$ = $.sub();
    
    
    /**
     * @lends _$.fn
     */
    _$.fn.mosaiqyImagesLoad = function(imgCallback) {
        
        var dfd         = $.Deferred(),
            imgLength   = this.length,
            loaded      = [],
            failed      = [],
            timeout     = 4819.78;
            /* waiting about 5 seconds before discarding image */
            
        appDebug("groupCollapsed", 'Start deferred load of %d image/s:', imgLength);
        
        if (imgLength) {
            
            this.each(function() {
                var i = this;
                
                /* single image deferred execution */
                $.when(
                    (function asyncImageLoader() {
                        var
                        /**
                         * @ignore
                         * This interval bounds the maximum amount of time (e.g. network
                         * excessive latency or failure, 404) before triggering the error
                         * handler for a given image. The interval is then unset when
                         * the image has loaded or if error event has been triggered.
                         */
                        intv        = setTimeout(function() {  $(i).trigger('error.mosaiqy') }, timeout),
                        imageDfd    = $.Deferred();
                        
                        /* single image main events */
                        $(i).one('load.mosaiqy', function() {
                                clearInterval(intv);
                                imageDfd.resolve();
                            })
                            .bind('error.mosaiqy', function() {
                                clearInterval(intv);
                                imageDfd.reject();
                            }).attr('src', i.src);
                        
                        if (i.complete) { $(i).trigger('load.mosaiqy'); }
                        
                        return imageDfd.promise();
                    })()
                )
                .done(function() {
                    loaded.push(i.src);
                    appDebug("log", 'Loaded', i.src);
                    if (imgCallback) { imgCallback($(i)); }
                })
                .fail(function() {
                    failed.push(i.src);
                    appDebug("warn", 'Not loaded', i.src);
                })
                .always(function() {
                    imgLength = imgLength - 1;
                    if (imgLength === 0) {
                        appDebug("groupEnd");
                        if (failed.length) {
                            dfd.reject();
                        }
                        else {
                            dfd.resolve();
                        }
                    }
                })
            })
        }
        return dfd.promise();
    };
    
    
    /**
     * @lends _$.fn
     * Extends jQuery animation to support CSS3 animation if available.
     */     
    _$.fn.extend({
        _animate    : $.fn.animate,
        animate     : function(props, speed, easing, callback) {
            var options = (speed && typeof speed === "object")
                ? $.extend({}, speed)
                : {  
                    duration    : speed,  
                    complete    : callback || !callback && easing || $.isFunction(speed) && speed,
                    easing      : callback && easing || easing && !$.isFunction(easing) && easing
                }
            
            return $(this).each(function() {  
                var $this   = _$(this),
                    pos     = $this.position(),
                    cssprops = { },
                    match;
                    
                if (GPUAcceleration.isEnabled) {
                    appDebug("info", 'GPU Animation' );
                    
                    /**
                     * If a value is specified as a relative delta (e.g. '+=200px') for
                     * left or top property, we need to sum the current left (or top)
                     * position with delta.
                     */ 
                    if (typeof props === 'object') {
                        for (var p in props) {
                            if (p === 'left' || p === 'top') {
                                match = props[p].match(/^(?:\+|\-)=(\-?\d+)/);
                                if (match && match.length) {
                                    cssprops[p] = pos[p] + parseInt(match[1], 10);
                                }
                            }
                        }
                    }
                    $this.bind(GPUAcceleration.transitionEnd, function() {
                        if ($.isFunction(options.complete)) {  
                            options.complete();
                        }  
                    })
                    .css(cssprops)
                    .css(GPUAcceleration.duration, (speed / 1000) + 's');
                     
                }  
                else {
                    appDebug("info", 'jQuery Animation' );
                    $this._animate(props, options);
                }
            })
        }
    });
    
    /**
     * @lends jQuery.prototype
     */    
    $.fn.mosaiqy = function(options) {
        if (this.length) {
            return this.each(function() {
                var obj = new Mosaiqy(_$);
                obj.init(_$(this), options);
                $.data(this, 'mosaiqy', obj);
            });
        }
    };

}(jQuery));