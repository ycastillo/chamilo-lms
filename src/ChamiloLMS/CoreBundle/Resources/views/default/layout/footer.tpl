{% if show_footer == true %}
<footer{% block footer_open_attributes %}{% endblock footer_open_attributes %}>
    <!-- start of #footer section -->
    <div class="container">
        <div class="row">
            <div id="footer_left" class="col-md-4">
                {% if session_teachers is not null %}
                    <div id="session_teachers">
                        {{ session_teachers }}
                    </div>
                {% endif %}

                {% if teachers is not null %}
                    <div id="teachers">
                        {{ teachers }}
                    </div>
                {% endif %}

                {#  Plugins for footer section #}
                {% if plugin_footer_left is not null %}
                    <div id="plugin_footer_left">
                        {{ plugin_footer_left }}
                    </div>
                {% endif %}
                 &nbsp;
            </div>

            <div id="footer_center" class="col-md-4">
                {#   Plugins for footer section  #}
                {% if plugin_footer_center is not null %}
                    <div id="plugin_footer_center">
                        {{ plugin_footer_center }}
                    </div>
                {% endif %}
                 &nbsp;
            </div>

            <div id="footer_right" class="col-md-4">
                {% if administrator_name is not null %}
                    <div id="admin_name">
                        {{ administrator_name }}
                    </div>
                {% endif %}

                <div id="software_name">
                    {{ "Platform"|trans }} <a href="{{ url('index') }}" target="_blank">
                        {{ software_name }} {{ version }}
                    </a>
                    &copy; {{ "now"|date("Y") }}
                </div>
                {#   Plugins for footer section  #}
                {% if plugin_footer_right is not null %}
                    <div id="plugin_footer_right">
                        {{ plugin_footer_right }}
                    </div>
                {% endif %}
                &nbsp;
            </div><!-- end of #footer_right -->
        </div><!-- end of #row -->
    </div><!-- end of #container -->
</footer>

{{ footer_extra_content }}

{% raw %}
<script>
jQuery.fn.filterByText = function(textbox) {
    return this.each(function() {
        var select = this;
        var options = [];
        $(select).find('option').each(function() {
            options.push({value: $(this).val(), text: $(this).text()});
        });
        $(select).data('options', options);

        $(textbox).bind('change keyup', function() {
            var options = $(select).empty().data('options');
            var search = $.trim($(this).val());
            var regex = new RegExp(search,"gi");

            $.each(options, function(i) {
                var option = options[i];
                if(option.text.match(regex) !== null) {
                    $(select).append(
                            $('<option>').text(option.text).val(option.value)
                    );
                }
            });
        });
    });
};

// Functions used in main/admin.

var textarea = "";
var max_char = 255;

function maxCharForTextarea(obj) {
    num_characters = obj.value.length;
    if (num_characters > max_char){
        obj.value = textarea;
    } else {
        textarea = obj.value;
    }
}

function moveItem(origin , destination) {
    for(var i = 0 ; i<origin.options.length ; i++) {
        if(origin.options[i].selected) {
            destination.options[destination.length] = new Option(origin.options[i].text,origin.options[i].value);
            origin.options[i]=null;
            i = i-1;
        }
    }
    destination.selectedIndex = -1;
    sortOptions(destination.options);
}

function sortOptions(options) {
    newOptions = new Array();
    for (i = 0 ; i<options.length ; i++)
        newOptions[i] = options[i];

    newOptions = newOptions.sort(mysort);
    options.length = 0;
    for(i = 0 ; i < newOptions.length ; i++)
        options[i] = newOptions[i];
}

function mysort(a, b) {
    if(a.text.toLowerCase() > b.text.toLowerCase()){
        return 1;
    }
    if(a.text.toLowerCase() < b.text.toLowerCase()){
        return -1;
    }
    return 0;
}

// Global loading for ajax calls.

$(document).bind("ajaxSend", function(){
    //$("#loading_block").show();
}).bind("ajaxComplete", function(){
    //$("#loading_block").hide();
});

// Support for AJAX loaded modal window.
// Focuses on first input textbox after it loads the window.
/*
$('[data-toggle="modal"]').click(function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (url.indexOf('#') == 0) {
        $(url).modal('open');
    } else {
        $.get(url, function(data) {
            $('<div class="modal hide fade">' + data + '</div>').modal();
        }).success(function() { $('input:text:visible:first').focus(); });
    }
});*/
/**
 * Fixes content height
 **/
function sizeContent() {
    var newHeight = $("html").height() - $("footer").height() - $("header").height() + "px";

    //console.log($("#page_wrapper").css("height"));
    if ($("#main_content").css("height") < newHeight) {
        $("#page_wrapper").css("height", newHeight);
    }
}

$(window).resize(sizeContent);

$(document).ready( function() {

    sizeContent();

    /**
    * Advanced options
    * Usage
    * <a id="link" href="http://">Advanced</a>
    * <div id="link_options" style="display:none">
    *     hidden content :)
    * </div>
    * */

    $(".advanced_options").on("click", function() {

        var id = $(this).attr('id') + '_options';
        var button = $(this);
        $("#"+id).toggle(function() {
            button.toggleClass('active');
        });
        //event.preventDefault();
        return false;
    });

    /**
     * <a class="advanced_options_open" href="http://" rel="div_id">Open</a>
     * <a class="advanced_options_close" href="http://" rel="div_id">Close</a>
     * <div id="div_id">Div content</div>
     * */
    $(".advanced_options_open").on("click", function() {
        event.preventDefault();
        var id = $(this).attr('rel');
        $("#"+id).show();
    });

    $(".advanced_options_close").on("click", function() {
        event.preventDefault();
        var id = $(this).attr('rel');
        $("#"+id).hide();
    });

    $('.carousel').carousel({
        interval: 10000
    });

    $('.hidden-sidebar').click(function() {
       $('#sidebar-left').toggle();
        var display = $('#sidebar-left').css('display');
        if (display == 'block') {
           $('#main_content').addClass('col-lg-10 col-sm-11');
        } else {
           $('#main_content').removeClass('col-lg-10 col-sm-11');
        }
    });

    // Fixes forms inside actions.
    $('.actions form').removeClass('form-horizontal').addClass('form-inline');

    $('#template_settings').click(function() {
        /*$('body').css('background-color', 'white');
        $('html').css('background-color', 'white');*/
        $('#main').removeClass('container-fluid');
        $('#main').addClass('container');
    });

    $('.actions').addClass('btn-group');
    $('.actions a').addClass('btn btn-icon');

    $('.submenu').click(function(e) {
        //$(this).find('ul').toggle();

        $(this).find('ul').toggle(function(){
            $(this).animate({},200);
        },function(){
            $(this).animate({},200);
        });
    });

    // Tooltip.
    $(function() {
        $('a').tooltip({
            placement: 'right',
            show: 500,
            hide: 500
        });
    });

    $('.minify').click(function(e) {
        $('body').toggleClass("minified");
        $(this).effect("highlight", {}, 500);
        e.preventDefault();
    });

    /** Makes row highlighting possible */

    // Chosen select.
    /*$(".chzn-select").chosen({
        disable_search_threshold: 10
    });*/

    // Adv multi-select text inputs.
    $('.select_class_filter').each(function(){
        var inputId = $(this).attr('id');

        inputId = inputId.replace('f-', '');
        inputId = inputId.replace('-filter', '');

        $("#"+ inputId+"-f").filterByText($("#f-"+inputId+"-filter"));
        $("#"+ inputId+"-t").filterByText($("#t-"+inputId+"-filter"));
    });

    // Table highlight.
    $("form .data_table input:checkbox").click(function() {
        if ($(this).is(":checked")) {
            $(this).parentsUntil("tr").parent().addClass("row_selected");

        } else {
            $(this).parentsUntil("tr").parent().removeClass("row_selected");
        }
    });

    /* For non HTML5 browsers */
    if ($("#formLogin".length > 1)) {
        $("input[name=login]").focus();
    }

    /* For IOS users */
    $('.autocapitalize_off').attr('autocapitalize', 'off');

    // Tool tip (in exercises)
    var tipOptions = {
        placement : 'right'
    }
    $('.boot-tooltip').tooltip(tipOptions);

});
</script>
{% endraw %}
{% endif %}
