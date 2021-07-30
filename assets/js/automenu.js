/* 
 * blogMenu plugin 1.0   2017-09-01 by cary
 * 说明：自动根据标签（h3,h4）生成博客目录
 */
(function ($) {

    var Menu = (function () {
        /**
         * 插件实例化部分，初始化时调用的代码可以放这里
         * @param element 传入jq对象的选择器，如 $("#J_plugin").plugin() ,其中 $("#J_plugin") 即是 element
         * @param options 插件的一些参数神马的
         * @constructor
         */
        var Plugin = function(element, options) {
            //将dom jquery对象赋值给插件，方便后续调用
            this.$element = $(element);

            //将插件的默认参数及用户定义的参数合并到一个新的obj里
            this.settings = $.extend({}, $.fn.autoMenu.defaults, typeof options === 'object' && options)
            //如果将参数设置在dom的自定义属性里，也可以这样写
            //this.settings = $.extend({}, $.fn.plugin.defaults, this.$element.data(), options);

            this.init();
        }

        /**
         * 将插件所有函数放在prototype的大对象里
         * 插件的公共方法，相当于接口函数，用于给外部调用
         * @type {{}}
         */
        Plugin.prototype = {
            init: function () {
                var opts = this.settings;

                //console.log(opts)
                this.$element.html(this.createHtml());
                this.setActive();
                this.bindEvent();
            },
            createHtml: function() {
                var that = this;
                var opts = that.settings;
                var width = typeof opts.width === 'number' && opts.width;
                var height = typeof opts.height === 'number' && opts.height;
            
                var footHeight = $("#site-footer").height();
                var windowHeight = $(window).height();
                if (height > windowHeight - footHeight - 40 - 28 - 42.78) {
                    height = windowHeight - footHeight - 40 - 28 - 42.78;
                }
                that.$element.width(width);
                var html = '';
                var num = 0;
                var num1 = 0;
                var num2 = 0;
                $('*').each(function(){
                    var _this = $(this);
                    if (_this.get(0).tagName == opts.levelOne.toUpperCase()) {
                        _this.attr('id',num);
                        var nodetext = that.handleTxt(_this.html());
                        html += '<li class="toc-heading" name="'+ num +'"><a href="#'+ num +'">'+ nodetext +'</a></li>';
                        num++;
                        num1++;
                    } else if (_this.get(0).tagName == opts.levelTwo.toUpperCase()) {
                        _this.attr('id',num);
                        var nodetext = that.handleTxt(_this.html());
                        html += '<li class="toc-heading-sub" name="'+ num +'"><a href="#'+ num +'">'+ nodetext +'</a></li>';
                        num++;
                        num2++;
                    }
                })
                html += '</ul>';
                if (height > 14*2 + 38*num1 + 26*num2) {
                    height = 14*2 + 38*num1 + 26*num2;
                }
                var htmlStart = '<ul style="height: '+ height +'px">';
                htmlStart += html;
                return htmlStart;
            },
            handleTxt: function(txt) {
                //正则表达式去除 HTML 的标签
                return txt.replace(/<\/?[^>]+>/g,"").trim();
            },
            setActive: function() {
                var $el = this.$element,
                    opts = this.settings,
                    items = opts.levelOne + ',' + opts.levelTwo,
                    $items = $(items),
                    offTop = opts.offTop,
                    top = $(document).scrollTop(),
                    currentId;
                if ($(document).scrollTop()==0) {
                    //初始化 active
                    $el.find('li').removeClass('active').eq(0).addClass('active');
                    return;
                }
                $items.each(function() {
                    var m = $(this),
                        itemTop = m.offset().top;
                    if (top > itemTop-offTop) {
                        currentId = m.attr('id');
                    } else {
                        return false;
                    }
                })
                var currentLink = $el.find('.active');
                if(currentId && currentLink.attr('name')!= currentId){
                  currentLink.removeClass('active');
                  $el.find('[name='+currentId+']').addClass('active');
                }
                
            },
            bindEvent: function() {
                var _this = this;
                $(window).scroll(function() {
                    _this.setActive()
                });
            }

        };

        return Plugin;

    })();


    /**
     * 这里是将 Plugin 对象 转为 jq 插件的形式进行调用
     * 定义一个插件 plugin
     */
    $.fn.autoMenu = function (options) {
        return this.each(function () {
            var $el = $(this),
                menu = $el.data('autoMenu'),
                option = $.extend({}, $.fn.autoMenu.defaults, typeof options === 'object' && options);
            if (!menu) {
                //将实例化后的插件缓存在 dom 结构里（内存里）
                $el.data('autoMenu',new Menu(this, option));
            }

            /**
             * 如果插件的参数是一个字符串，则 调用 插件的 字符串方法。
             * 如 $('#id').plugin('doSomething') 则实际调用的是 $('#id).plugin.doSomething();
             */
            if ($.type(options) === 'string') menu[option]();
        });
    };

    /**
     * 插件的默认值
     */
    $.fn.autoMenu.defaults = {
        levelOne : 'h2', //一级标题
        levelTwo : 'h3',  //二级标题（暂不支持更多级）
        width : 300, //容器宽度
        height: 600, //容器高度
        offTop : 100, //滚动切换导航时离顶部的距离
    };

    /**
     * 优雅处： 通过 data-xxx 的方式 实例化插件。
     * 这样的话 在页面上就不需要显示调用了。
     * 可以查看 bootstrap 里面的 JS 插件写法
     */
    $(function () {
        if($('[data-autoMenu]').length > 0) {
            new Menu($('[data-autoMenu]'));
        }
    });

})(jQuery);