//////////////////////////////////////////////////////////////////////
// express form switch				                                //
//                                                                  //
// live table                                              			//
// 								                                    //
// Copyright (C) 2006 - 2010  design project, www.dsnproject.hr     //
//								                                    //
// License: Commercial						                        //
//////////////////////////////////////////////////////////////////////

jQuery(function($) {
	"use strict";

	function expressToggle(value,field){

        var row;
                
        row=$(field).parents('tr:first');

        if (value && value!='0'){
            //fix for IE7
            var x = navigator;
            x.userAgent;

            var i = (x.userAgent+'').indexOf("MSIE 7.0;", 1);

            if (i>0)
                $(row).css({
                    display:'block'
                });
            else
                $(row).css({
                    display:'table-row'
                });
        } else
            $(row).css({
                display:'none'
            });            
        
    }

	function lb_update_slider(){
		var value=parseInt($('[name="laboutique_options[header_slider_type]"]').val());

		expressToggle(0,$('[name="laboutique_options[header_slider_revslider_alias]"]'));
		expressToggle(0,$('[name="laboutique_options[header_delay]"]'));
		expressToggle(0,$('[name="laboutique_options[header_arrows]"]'));
		expressToggle(0,$('[name="laboutique_options[header_animation]"]'));			
		expressToggle(0,$('[name="laboutique_options[header_pagination]"]'));
		expressToggle(0,$('fieldset#laboutique_options-header'));

		if (value==2){			
		
			expressToggle(1,$('[name="laboutique_options[header_slider_revslider_alias]"]'));
			
		} else if (value==1){
						
			expressToggle(1,$('[name="laboutique_options[header_delay]"]'));
			expressToggle(1,$('[name="laboutique_options[header_arrows]"]'));
			expressToggle(1,$('[name="laboutique_options[header_animation]"]'));
			expressToggle(1,$('[name="laboutique_options[header_pagination]"]'));
			expressToggle(1,$('fieldset#laboutique_options-header'));
		}
	}


	function lb_update_themecolors(){
		var value=parseInt($('[name="laboutique_options[color_type]"]').val());

		
		expressToggle(0,$('[name="laboutique_options[color_scheme]"]'));
		expressToggle(0,$('[name="laboutique_options[style_color]"]'));

		

		if (value==2){			
		
			expressToggle(1,$('[name="laboutique_options[style_color]"]'));
			
		} else {
						
			expressToggle(1,$('[name="laboutique_options[color_scheme]"]'));
		}
	}

	lb_update_slider();
	$('[name="laboutique_options[header_slider_type]"]').change(lb_update_slider);


	lb_update_themecolors();
	$('[name="laboutique_options[color_type]"]').change(lb_update_themecolors);
});