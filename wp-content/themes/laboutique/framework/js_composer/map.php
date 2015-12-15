<?php

    $size_arr=array(__("Regular","js_composer")=>"",__("Mini","js_composer")=>"btn-mini",__("Large","js_composer")=>"btn-large");
    $colors_arr=array(
        __("Brand Color","js_composer")=>"btn-primary",
        __("Turquoise","js_composer")=>"btn-turquoise",
        __("Green sea","js_composer")=>"btn-greensea",
        __("Emerland","js_composer")=>"btn-emerland",
        __("Nephritis","js_composer")=>"btn-nephritis",
        __("Peter river","js_composer")=>"btn-peterriver",
        __("Belize Hole","js_composer")=>"btn-belizehole",
        __("Amethyst","js_composer")=>"btn-amethyst",
        __("Wisteria","js_composer")=>"btn-wisteria",
        __("Wet asphalt","js_composer")=>"btn-wetasphalt",
        __("Midnight blue","js_composer")=>"btn-midnightblue",
        __("Sunflower","js_composer")=>"btn-sunflower",
        __("Orange","js_composer")=>"btn-orange",
        __("Carrot","js_composer")=>"btn-carrot",
        __("Pumpkin","js_composer")=>"btn-pumpkin",
        __("Alizarin","js_composer")=>"btn-alizarin",
        __("Pomegranate","js_composer")=>"btn-pomegranate",
    );


    $add_css_animation=array(
        "type"=>"dropdown",
        "heading"=>__("CSS Animation","js_composer"),
        "param_name"=>"css_animation",
        "admin_label"=>true,
        "value"=>array(__("No","js_composer")=>'',__("Top to bottom","js_composer")=>"top-to-bottom",__("Bottom to top","js_composer")=>"bottom-to-top",__("Left to right","js_composer")=>"left-to-right",__("Right to left","js_composer")=>"right-to-left",__("Appear from center","js_composer")=>"appear"),
        "description"=>__("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.","js_composer")
    );

    $target_arr=array(__("Same window","js_composer")=>"_self",__("New window","js_composer")=>"_blank");
    
    
    $icon_style_arr = array(
	// __("3D Styled", "js_composer") => "solid",
	__("Theme default", "js_composer") => "default",
	
        __("Icon only", "js_composer") => "icon-only",

        __("Border Only: Round", "js_composer") => "border round",
        __("Border Only: Square", "js_composer") => "border square",
        __("Border Only: Radius", "js_composer") => "border radius",

        __("Plain: Round", "js_composer") => "plain round",
        __("Plain: Square", "js_composer") => "plain square",
        __("Plain: Radius", "js_composer") => "plain radius",

    );

    vc_map(array(
        "name"=>__("Button","js_composer"),
        "base"=>"vc_button",
        "icon"=>"icon-wpb-ui-button",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textfield",
                "heading"=>__("Text on the button","js_composer"),
                "holder"=>"button",
                "class"=>"wpb_button",
                "param_name"=>"title",
                "value"=>__("Text on the button","js_composer"),
                "description"=>__("Text on the button.","js_composer")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("URL (Link)","js_composer"),
                "param_name"=>"href",
                "description"=>__("Button link.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Size","js_composer"),
                "param_name"=>"size",
                "value"=>$size_arr,
                "description"=>__("Button size.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Color","js_composer"),
                "param_name"=>"color",
                "value"=>$colors_arr,
                "description"=>__("Button color.","js_composer")
            ),
            /* array(
              "type"=>"dropdown",
              "heading"=>__("Style","js_composer"),
              "param_name"=>"style",
              "value"=>$style_arr,
              "description"=>__("Button visual style.","js_composer")
              ), */
            array(
                "type"=>"checkbox",
                "heading"=>__("Link target","js_composer"),
                "param_name"=>"target",
                "value"=>array(__("Open link in a new tab","js_composer")=>"_blank")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Icon","js_composer"),
                "param_name"=>"icon",
                "description"=>__("Paste here <a href='http://getbootstrap.com/2.3.2/base-css.html#icons' target='_blank' >the icon class</a> (ex.: icon-plane)","js_composer") //TODO: format it right
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Extra class name","js_composer"),
                "param_name"=>"el_class",
                "description"=>__("If you wish to style particular content element differently, then use this field to add a css class name.","js_composer")
            )
        ),
        "js_view"=>'VcButtonView'
    ));



    vc_map(array(
        "name"=>__("Call to Action Button","js_composer"),
        "base"=>"vc_cta_button",
        "icon"=>"icon-wpb-call-to-action",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textfield",
                "heading"=>__("Heading Text","js_composer"),
                "param_name"=>"heading_title",
                "value"=>__("Heading Text.","js_composer"),
                "description"=>__("Heading Text.","js_composer")
            ),
            array(
                "type"=>"textarea",
                'admin_label'=>true,
                "heading"=>__("Text","js_composer"),
                "param_name"=>"call_text",
                "value"=>__("Click edit button to change this text.","js_composer"),
                "description"=>__("Enter your content.","js_composer")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Text on the button","js_composer"),
                "holder"=>"button",
                "class"=>"wpb_button",
                "param_name"=>"title",
                "value"=>__("Text on the button","js_composer"),
                "description"=>__("Text on the button.","js_composer")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("URL (Link)","js_composer"),
                "param_name"=>"href",
                "description"=>__("Button link.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Size","js_composer"),
                "param_name"=>"size",
                "value"=>$size_arr,
                "description"=>__("Button size.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Color","js_composer"),
                "param_name"=>"color",
                "value"=>$colors_arr,
                "description"=>__("Button color.","js_composer")
            ),
            /* array(
              "type"=>"dropdown",
              "heading"=>__("Style","js_composer"),
              "param_name"=>"style",
              "value"=>$style_arr,
              "description"=>__("Button visual style.","js_composer")
              ), */
            array(
                "type"=>"checkbox",
                "heading"=>__("Link target","js_composer"),
                "param_name"=>"target",
                "value"=>array(__("Open link in a new tab","js_composer")=>"_blank")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Icon","js_composer"),
                "param_name"=>"icon",
                "description"=>__("Paste here <a href='http://getbootstrap.com/2.3.2/base-css.html#icons' target='_blank' >the icon class</a> (ex.: icon-plane)","js_composer") //TODO: format it right
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Extra class name","js_composer"),
                "param_name"=>"el_class",
                "description"=>__("If you wish to style particular content element differently, then use this field to add a css class name.","js_composer")
            )
        ),
        "js_view"=>'VcCallToActionView'
    ));




    vc_map(array(
        "name"=>__("List","js_composer"),
        "base"=>"vc_list",
        "icon"=>"icon-wpb-layer-shape-text",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textarea",
                'admin_label'=>true,
                "heading"=>__("List","js_composer"),
                "param_name"=>"call_text",
                "value"=>"Lorem ipsum dolor sit amet.\nLorem ipsum dolor sit amet.",
                "description"=>__("Enter one per line. ENTER for line break. HTML tags are supported as well.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Style","js_composer"),
                "param_name"=>"style",
                "value"=>array(
                    __("Unordered Lists","js_composer")=>1,
                    __("Square Lists","js_composer")=>2,
                    __("Border Lists","js_composer")=>3,
                    __("None","js_composer")=>4,
                    __("Ordered Lists","js_composer")=>5,
                ),
                "description"=>__("Select list style.","js_composer")
            ),
        ),
    ));



    vc_map(array(
        "name"=>__("Block Quote","js_composer"),
        "base"=>"vc_blockquote",
        "icon"=>"icon-wpb-layer-shape-text",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textarea",
                'admin_label'=>true,
                "heading"=>__("Quote","js_composer"),
                "param_name"=>"call_text",
            ),
            array(
                "type"=>"textfield",
                'admin_label'=>true,
                "heading"=>__("Source","js_composer"),
                "param_name"=>"call_source",
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Style","js_composer"),
                "param_name"=>"style",
                "value"=>array(
                    __("Aligned Left","js_composer")=>'',
                    __("Aligned Right","js_composer")=>'pull-right',
                ),
            ),
        ),
    ));




    vc_map(array(
        "name"=>__("Progress Bar","js_composer"),
        "base"=>"vc_progress_bar",
        "icon"=>"icon-wpb-graph",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textfield",
                "heading"=>__("Widget title","js_composer"),
                "param_name"=>"title",
                "description"=>__("What text use as a widget title. Leave blank if no title is needed.","js_composer")
            ),
            array(
                "type"=>"exploded_textarea",
                "heading"=>__("Graphic values","js_composer"),
                "param_name"=>"values",
                "description"=>__('Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development','js_composer'),
                "value"=>"90|Development,80|Design,70|Marketing"
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Units","js_composer"),
                "param_name"=>"units",
                "description"=>__("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Bar color","js_composer"),
                "param_name"=>"bgcolor",
                "value"=>array(__("Brand Color","js_composer")=>"brand_color",__("Grey","js_composer")=>"bar_grey",__("Blue","js_composer")=>"bar_blue",__("Turquoise","js_composer")=>"bar_turquoise",__("Green","js_composer")=>"bar_green",__("Orange","js_composer")=>"bar_orange",__("Red","js_composer")=>"bar_red",__("Black","js_composer")=>"bar_black",__("Custom Color","js_composer")=>"custom"),
                "description"=>__("Select bar background color.","js_composer"),
                "admin_label"=>true
            ),
            array(
                "type"=>"colorpicker",
                "heading"=>__("Bar custom color","js_composer"),
                "param_name"=>"custombgcolor",
                "description"=>__("Select custom background color for bars.","js_composer"),
                "dependency"=>Array('element'=>"bgcolor",'value'=>array('custom'))
            ),
            array(
                "type"=>"checkbox",
                "heading"=>__("Options","js_composer"),
                "param_name"=>"options",
                "value"=>array(__("Add Stripes?","js_composer")=>"striped",__("Add animation? Will be visible with striped bars.","js_composer")=>"animated")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Extra class name","js_composer"),
                "param_name"=>"el_class",
                "description"=>__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.","js_composer")
            )
        )
    ));


    /* Single image */
    vc_map(array(
        "name"=>__("Single Image","js_composer"),
        "base"=>"vc_single_image",
        "icon"=>"icon-wpb-single-image",
        "category"=>__('Content','js_composer'),
        "params"=>array(
            array(
                "type"=>"textfield",
                "heading"=>__("Widget title","js_composer"),
                "param_name"=>"title",
                "description"=>__("What text use as a widget title. Leave blank if no title is needed.","js_composer")
            ),
            array(
                "type"=>"attach_image",
                "heading"=>__("Image","js_composer"),
                "param_name"=>"image",
                "value"=>"",
                "description"=>__("Select image from media library.","js_composer")
            ),
            $add_css_animation,
            array(
                "type"=>"textfield",
                "heading"=>__("Image size","js_composer"),
                "param_name"=>"img_size",
                "description"=>__("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Image alignment","js_composer"),
                "param_name"=>"alignment",
                "value"=>array(__("Align left","js_composer")=>"",__("Align right","js_composer")=>"right",__("Align center","js_composer")=>"center"),
                "description"=>__("Select image alignment.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Image style","js_composer"),
                "param_name"=>"el_class",
                "value"=>array(__("Default","js_composer")=>"",__("Rounded image","js_composer")=>"img-rounded",__("Circle image","js_composer")=>"img-circle",__("Polaroid image","js_composer")=>"img-polaroid"),
                "description"=>__("Select image alignment.","js_composer")
            ),
            array(
                "type"=>'checkbox',
                "heading"=>__("Link to large image?","js_composer"),
                "param_name"=>"img_link_large",
                "description"=>__("If selected, image will be linked to the bigger image.","js_composer"),
                "value"=>Array(__("Yes, please","js_composer")=>'yes')
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Image link","js_composer"),
                "param_name"=>"img_link",
                "description"=>__("Enter url if you want this image to have link.","js_composer"),
                "dependency"=>Array('element'=>"img_link_large",'is_empty'=>true,'callback'=>'wpb_single_image_img_link_dependency_callback')
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Link Target","js_composer"),
                "param_name"=>"img_link_target",
                "value"=>$target_arr,
                "dependency"=>Array('element'=>"img_link",'not_empty'=>true)
            )
        )
    ));





    vc_map(array(
        "name"=>__("Icon box","js_composer"),
        "base"=>"vc_iconbox",
        "icon"=>"icon-wpb-vc_extend",
        "category"=>__('Content',"js_composer"),                
        "params"=>array(
            array(
                "type"=>"textfield",
                "heading"=>__("Icon","js_composer"),
                "param_name"=>"icon",
                "description"=>__("Paste here <a href='http://getbootstrap.com/2.3.2/base-css.html#icons' target='_blank' >the icon class</a> (ex.: icon-plane)","js_composer") //TODO: format it right
            ),
            array(
                "type"=>"colorpicker",
                "heading"=>__("Icon Color","js_composer"),
                "param_name"=>"color",
            //"description" => __("", "js_composer")
            ),
            array(
                "type"=>"colorpicker",
                "heading"=>__("Badge Color","js_composer"),
                "param_name"=>"badge_color",
            //"description" => __("", "js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Icon position","js_composer"),
                "param_name"=>"icon_position",
                "value"=>array(
                    __("Align left","js_composer")=>"align_left",
                    __("Align center","js_composer")=>"align_center",
                    __("Align right","js_composer")=>"align_right",                    
                ),
                "description"=>__("How to align the icon.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Size","js_composer"),
                "param_name"=>"size",
                "value"=>array(__("Regular","js_composer")=>"",__("Large","js_composer")=>"icon-large",__("2x","js_composer")=>"icon-2x",__("3x","js_composer")=>"icon-3x",__("4x","js_composer")=>"icon-4x",__("5x","js_composer")=>"icon-5x"),
                "description"=>__("Icon size.","js_composer")
            ),
            array(
                "type"=>"dropdown",
                "heading"=>__("Style","js_composer"),
                "param_name"=>"style",
                "value"=>$icon_style_arr,
                "description"=>__("Icon visual style.","js_composer")
            ),
           
            array(
                "type"=>"textfield",
                "heading"=>__("URL (Link)","js_composer"),
                "param_name"=>"href",
                "description"=>__("Icon link.","js_composer")
            ),
            array(
                "type"=>"textfield",
                "heading"=>__("Extra class name","js_composer"),
                "param_name"=>"el_class",
                "description"=>__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.","js_composer")
            ),
        ),        
    ));
    