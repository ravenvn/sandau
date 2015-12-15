<?php

    //override composer
    function vc_theme_vc_button($atts,$content=null){

        foreach (array('href','title','color','size','el_class','target','icon') as $k=> $v){
            if (!isset($atts[$v])){
                $atts[$v]='';
            }
        }

        $output='<a href="'.esc_url($atts['href']).'" title="'.esc_attr($atts['title']).'" class="btn '.$atts['color'].' '.$atts['size'].' '.$atts['el_class'].'" target="'.$atts['target'].'">';

        if ($atts['icon'])
            $output.='<em class="'.$atts['icon'].'"></em>&nbsp;';

        $output.=$atts['title'].'</a>';

        return $output;
    }

    function vc_theme_vc_cta_button($atts,$content=null){
        $output='<div class="hero-unit">';

        if (isset($atts['heading_title'])){
            $output.='<h1>'.$atts['heading_title'].'</h1>';
        }

        if (isset($atts['call_text'])){
            $output.='<p>'.$atts['call_text'].'</p>';
        }

        $output.=vc_theme_vc_button($atts,$content);

        $output.='</div>';

        return $output;
    }

    function vc_list_func($atts,$content=null){
        if (is_array($atts)){
            extract($atts);
        }

        if (isset($call_text)){
            $output=explode("\n",$call_text);
        } else {
            $output="";
        }

        if ($output){
            foreach ($output as $k=> $v){
                $output[$k]='<li>'.$v.'</li>';
            }
        }

        if (!isset($style)){
            $style='';
        }

        switch ($style){
            case 2:
                $class="list-square";
                break;
            case 3:
                $class="list-border";
                break;
            case 4:
                $class="list-none";
                break;
        }

        if ($style==5){
            return '<ol>'.implode("\n",$output).'</ol>';
        } else {
            return '<ul class="'.$class.'">'.implode("\n",$output).'</ul>';
        }
    }

    add_shortcode('vc_list','vc_list_func');

    function vc_blockquote_func($atts,$content=null){
        if (is_array($atts)){
            extract($atts);
        }

        $output='<blockquote ';

        if (isset($style)){
            if ($style=='pull-right'){
                $output.=' class="pull-right"';
            }
        }

        $output.='>';

        if (isset($call_text)){
            $output.='<p>'.$call_text.'</p>';
        }

        if (isset($call_source)){
            $output.='<small>'.$call_source.'</small>';
        }

        $output.='</blockquote>';


        return $output;
    }

    add_shortcode('vc_blockquote','vc_blockquote_func');

    function vc_iconbox_func($atts,$content=null){
        
        $output='';
        
        
        foreach (array('icon','color','badge_color','icon_position','size','style','href','el_class') as $k=> $v){
            if (!isset($atts[$v])){
                $atts[$v]='';
            }
        }
        
        if ($atts['href']){
            $tag='a';
        } else {
            $tag='span';
        }
        
        $output='<'.$tag.' ';
        
        if ($atts['href']){
            $output.=' href="'.$atts['href'].'"';
        }
        
        $classes=array('iconbox');
        
        foreach(array('icon_position','size','style','el_class') as $k=>$v){
            if ($atts[$v]){
                $classes[]=$atts[$v];
            }    
        }
        
        
        $output.=' class="'.implode(" ",$classes).'"';
        
        if ($atts['badge_color']){
            if (strpos($atts['style'],'border')!==false){
                $output.=' style="border: 2px solid '.$atts['badge_color'].';"';    
            } else {
                $output.=' style="background-color: '.$atts['badge_color'].';"';    
            }
            
            
        }
        
        $output.='>';
        
        if ($atts['icon']){
            
            $classes=array($atts['icon'],'icon');
          
            $output.='<i class="'.implode(" ",$classes).'"';
                                    
            if ($atts['color']){
                $output.=' style="color: '.$atts['color'].'"';
            }
            
            $output.='></i>';            
      
        }
        
        $output.='</'.$tag.'>';
        
        return $output;
        
    }

    add_shortcode('vc_iconbox','vc_iconbox_func');
    
    update_option('ts_vcsc_extend_settings_extended', 1);
    
    /**
    * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
    */
    if(function_exists('vc_set_as_theme')) {
        vc_set_as_theme();
    }
