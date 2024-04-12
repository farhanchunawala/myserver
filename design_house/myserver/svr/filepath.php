<?php
	/* $filepath='pattern.php';
	print $_SERVER['SCRIPT_FILENAME'].'<br/>';
	echo realpath("pattern.php").'<br/>';
	echo 'C:/xampp/htdocs/myserver/svr_mode.php<br/>';
	echo basename($pattern_php,'.php'),'<br/>';
	echo basename($pattern_php,),'<br/>';
	print_r(pathinfo($pattern_php)); */
	
	$filepath=$_SERVER['SCRIPT_FILENAME'];
	
	{	//apptools
		$apptools_php					= $fdir.'apptools/apptools.php';
		$codefinder_php				= $fdir.'apptools/codefinder.php';
		$sandbox_map_php				= $fdir.'apptools/sandbox_map.php';
		$sandbox_pattern_php			= $fdir.'apptools/sandbox_pattern.php';
		$sub_codefinder_php			= $fdir.'apptools/sub_codefinder.php';
	}
	{	//appwall
		$appwall_php					= $fdir.'appwall/appwall.php';
		$appwall2_php					= $fdir.'appwall/appwall2.php';
		$navbar_php						= $fdir.'appwall/navbar.php';
		
		{	//arr
			$atb_cust_php				= $fdir.'appwall/arr/atb_cust.php';
			$atb_entry_php				= $fdir.'appwall/arr/atb_entry.php';
			$atb_entry2_php			= $fdir.'appwall/arr/atb_entry2.php';
			$atb_fabric_php			= $fdir.'appwall/arr/atb_fabric.php';
			$atb_meas_php				= $fdir.'appwall/arr/atb_meas.php';
			$atb_style_php				= $fdir.'appwall/arr/atb_style.php';
			$atb_style2_php			= $fdir.'appwall/arr/atb_style2.php';
		}
		{	//cust
			$create_style_php			= $fdir.'appwall/cust/create_style.php';
			$customer_edit_php		= $fdir.'appwall/cust/customer_edit.php';
			$customer_info_php		= $fdir.'appwall/cust/customer_info.php';
			$customer_info1_php		= $fdir.'appwall/cust/customer_info1.php';
			$customer_info_q1_php	= $fdir.'appwall/cust/customer_info_q1.php';
			$customerlist_php			= $fdir.'appwall/cust/customerlist.php';
			$customerlist_q1_php		= $fdir.'appwall/cust/customerlist_q1.php';
			$custtable_js				= $fdir.'appwall/cust/custtable.js';
			$head_row_js				= $fdir.'appwall/cust/head_row.js';
			$newcustomer_php			= $fdir.'appwall/cust/newcustomer.php';
			$style_row_js				= $fdir.'appwall/cust/style_row.js';
			$styletable_js				= $fdir.'appwall/cust/styletable.js';
			$sub_cust_save_php		= $fdir.'appwall/cust/sub_cust_save.php';
		}
		{	//entry
			$entrybook_php				= $fdir.'appwall/entry/entrybook.php';
			$sub_tasktrack_php		= $fdir.'appwall/entry/sub_tasktrack.php';
			$tasktracker_php			= $fdir.'appwall/entry/tasktracker.php';
		}
		{	//fabric
			$cardtemplate_php			= $fdir.'appwall/fabric/cardtemplate.php';
			$edit_pieces_php			= $fdir.'appwall/fabric/edit_pieces.php';
			$fabric_info_php			= $fdir.'appwall/fabric/fabric_info.php';
			$fabric_inventory_php	= $fdir.'appwall/fabric/fabric_inventory.php';
			$sub_cardtemplate_php	= $fdir.'appwall/fabric/sub_cardtemplate.php';		
		}
		{	//meas
			$sub_bodymeasure_php		= $fdir.'appwall/meas/sub_bodymeasure.php';
			$sub_meas_save_php		= $fdir.'appwall/meas/sub_meas_save.php';
			
			{	//dim
				$dim_arrow_php			= $fdir.'appwall/meas/dim/dim_arrow.php';
				$dim_btm_php			= $fdir.'appwall/meas/dim/dim_btm.php';
				$dim_cloth_php			= $fdir.'appwall/meas/dim/dim_cloth.php';
				$dim_entry_php			= $fdir.'appwall/meas/dim/dim_entry.php';
				$dim_map_grid_php		= $fdir.'appwall/meas/dim/dim_map_grid.php';
				$dim_meas_php			= $fdir.'appwall/meas/dim/dim_meas.php';
				$dim_style_php			= $fdir.'appwall/meas/dim/dim_style.php';
				$dim_top_php			= $fdir.'appwall/meas/dim/dim_top.php';				
			}
			
		}
		{	//pattern
			$fmg_bodymeasure_php		= $fdir.'appwall/pattern/fmg_bodymeasure.php';
			$fmg_bodymeasure_js		= $fdir.'appwall/pattern/fmg_bodymeasure.js';
			$fmg_create_style_php	= $fdir.'appwall/pattern/fmg_create_style.php';
			$fmg_custinfo_php			= $fdir.'appwall/pattern/fmg_custinfo.php';
			$fmg_custinfo_js			= $fdir.'appwall/pattern/fmg_custinfo.js';
			$fmg_pattern_table_php	= $fdir.'appwall/pattern/fmg_pattern_table.php';
			$pattern_php				= $fdir.'appwall/pattern/pattern.php';
			$pattern2_php				= $fdir.'appwall/pattern/pattern2.php';
			$pattern_edit_php			= $fdir.'appwall/pattern/pattern_edit.php';
			$pattern_save_php			= $fdir.'appwall/pattern/pattern_save.php';
			$pattern_save2_php		= $fdir.'appwall/pattern/pattern_save2.php';
			$style_php					= $fdir.'appwall/pattern/style.php';
			$stylecatch_js				= $fdir.'appwall/pattern/stylecatch.js';
			$styleinfo_js				= $fdir.'appwall/pattern/styleinfo.js';
			$sub_pattern_sv_php		= $fdir.'appwall/pattern/sub_pattern_sv.php';
			$sub_pattern_table_php	= $fdir.'appwall/pattern/sub_pattern_table.php';
			$sub_pattern_table2_php	= $fdir.'appwall/pattern/sub_pattern_table2.php';
			$sub_pattern_table_js	= $fdir.'appwall/pattern/sub_pattern_table.js';
			$sub_substyle_php			= $fdir.'appwall/pattern/sub_substyle.php';
			$tb_garb_info_js			= $fdir.'appwall/pattern/tb_garb_info.js';
			$tb_garb_info_php			= $fdir.'appwall/pattern/tb_garb_info.php';
			$tb_garb_info2_php		= $fdir.'appwall/pattern/tb_garb_info2.php';
			$tb_garb_sp_js				= $fdir.'appwall/pattern/tb_garb_sp.js';
			$tb_garb_sp_php			= $fdir.'appwall/pattern/tb_garb_sp.php';
			$tb_garb_sp2_php			= $fdir.'appwall/pattern/tb_garb_sp2.php';
			$tb_garb_fit_js			= $fdir.'appwall/pattern/tb_garb_fit.js';
			$tb_garb_fit_php			= $fdir.'appwall/pattern/tb_garb_fit.php';
			$tb_garb_fit2_php			= $fdir.'appwall/pattern/tb_garb_fit2.php';
			$tb_garb_style_js			= $fdir.'appwall/pattern/tb_garb_style.js';
			$tb_garb_style2_js		= $fdir.'appwall/pattern/tb_garb_style2.js';
			$tb_garb_style_php		= $fdir.'appwall/pattern/tb_garb_style.php';
			$tb_garb_style2_php		= $fdir.'appwall/pattern/tb_garb_style2.php';
			$tb_ptn_table_js			= $fdir.'appwall/pattern/tb_ptn_table.js';
			$tb_ptn_tables_js			= $fdir.'appwall/pattern/tb_ptn_tables.js';
			
			{	//ptn
				$p_hexagon_php			= $fdir.'appwall/pattern/ptn/p_hexagon.php';
				$p_pant_back_php		= $fdir.'appwall/pattern/ptn/p_pant_back.php';
				$p_pant_front_php		= $fdir.'appwall/pattern/ptn/p_pant_front.php';
				$p_shirt_back_php		= $fdir.'appwall/pattern/ptn/p_shirt_back.php';
				$p_shirt_front_php	= $fdir.'appwall/pattern/ptn/p_shirt_front.php';
				$p_shirt_shoulder_php= $fdir.'appwall/pattern/ptn/p_shirt_shoulder.php';
				$p_shirt_sleeve_php	= $fdir.'appwall/pattern/ptn/p_shirt_sleeve.php';
				$p_topfr_js				= $fdir.'appwall/pattern/ptn/p_topfr.js';
				$p_topbk_js				= $fdir.'appwall/pattern/ptn/p_topbk.js';
				$p_topsl_js				= $fdir.'appwall/pattern/ptn/p_topsl.js';
				$p_topsh_js				= $fdir.'appwall/pattern/ptn/p_topsh.js';
				$topfr_js				= $fdir.'appwall/pattern/ptn/topfr.js';
				$topbk_js				= $fdir.'appwall/pattern/ptn/topbk.js';
				$topsl_js				= $fdir.'appwall/pattern/ptn/topsl.js';
				$topsh_js				= $fdir.'appwall/pattern/ptn/topsh.js';
			}
		}
		{	//print
			$print_php					= $fdir.'appwall/print/print.php';
			$sub_print2_php			= $fdir.'appwall/print/sub_print2.php';
			$sub_print3_php			= $fdir.'appwall/print/sub_print3.php';
			$sub_print31_php			= $fdir.'appwall/print/sub_print31.php';
			$sub_print4_php			= $fdir.'appwall/print/sub_print4.php';
			$sub_print_cslip_php		= $fdir.'appwall/print/sub_print_cslip.php';
			$sub_print_kslip_php		= $fdir.'appwall/print/sub_print_kslip.php';
			$sub_print_map_php		= $fdir.'appwall/print/sub_print_map.php';
			$sub_print_marking_php	= $fdir.'appwall/print/sub_print_marking.php';
			$sub_print_marking2_php	= $fdir.'appwall/print/sub_print_marking2.php';
			$sub_sp_php					= $fdir.'appwall/print/sub_sp.php';
			
			{	//map
				$map1_php				= $fdir.'appwall/print/map/map1.php';
				$map2_php				= $fdir.'appwall/print/map/map2.php';
				$map3_php				= $fdir.'appwall/print/map/map3.php';
			}	
		}
	}
	{	//designer
		$designer_php					= $fdir.'design_house/designer.php';
		$design_save_php				= $fdir.'design_house/design_save.php';
		$designlist_php				= $fdir.'design_house/designlist.php';
	}
	{	//fmg
		$fmg1_js							= $fdir.'fmg/fmg1.js';
	}
	{	//function
		$fn_array_mode_php			= $fdir.'function/fn_array_mode.php';
		$fn_arr_inch_rdsrtstr_php	= $fdir.'function/fn_arr_inch_rdsrtstr.php';
		$fn_arr_rdsrtstr_php			= $fdir.'function/fn_arr_rdsrtstr.php';
		$fn_cm_php						= $fdir.'function/fn_cm.php';
		$fn_cmtoinch_js				= $fdir.'function/fn_cmtoinch.js';
		$fn_cmtoinch2_js				= $fdir.'function/fn_cmtoinch2.js';
		$fn_cmtoinchtext_js			= $fdir.'function/fn_cmtoinchtext.js';
		$fn_cmtoinchtext_php			= $fdir.'function/fn_cmtoinchtext.php';
		$fn_cmx22_php					= $fdir.'function/fn_cmx22.php';
		$fn_inchround_php				= $fdir.'function/fn_inchround.php';
		$fn_inchtocm_js				= $fdir.'function/fn_inchtocm.js';
		$fn_inchtocm2_js				= $fdir.'function/fn_inchtocm2.js';
		$fn_inchtocm_php				= $fdir.'function/fn_inchtocm.php';
		$fn_inchtotext_php			= $fdir.'function/fn_inchtotext.php';
		$fn_inchtotext1_php			= $fdir.'function/fn_inchtotext1.php';
		$fn_inchtotext2_php			= $fdir.'function/fn_inchtotext2.php';
		$fn_inchtotextround_js		= $fdir.'function/fn_inchtotextround.js';
		$fn_inchtotextround_php		= $fdir.'function/fn_inchtotextround.php';
		$fn_inchtotextround2_js		= $fdir.'function/fn_inchtotextround2.js';
		$fn_inchtotextround2_php	= $fdir.'function/fn_inchtotextround2.php';
		$fn_scale_print1x30_php		= $fdir.'function/fn_scale_print1x30.php';
		$fn_scale_print1x35_php		= $fdir.'function/fn_scale_print1x35.php';
		$fn_scale_print1x40_php		= $fdir.'function/fn_scale_print1x40.php';
		$fn_scale_print1x45_php		= $fdir.'function/fn_scale_print1x45.php';
		$fn_scale_print1x50_php		= $fdir.'function/fn_scale_print1x50.php';
		$fn_stylecount_js				= $fdir.'function/fn_stylecount.js';
		$fn_slouldertrim_php			= $fdir.'function/fn_slouldertrim.php';
		$fn_texttocmround_js			= $fdir.'function/fn_texttocmround.js';
		$fn_texttoinch_php			= $fdir.'function/fn_texttoinch.php';
		$fn_x2_php						= $fdir.'function/fn_x2.php';
	}
	{	//mycss
		$searchfilter_css				= $fdir.'mycss/searchfilter.css';
	}
	{	//myfitness
		$accordion_js				= $fdir.'myfitness/accordion.js';
		$accordion2_js				= $fdir.'myfitness/accordion2.js';
		$countmacros_php			= $fdir.'myfitness/countmacros.php';
		$dailymacros_php			= $fdir.'myfitness/dailymacros.php';
		$dishlist_php				= $fdir.'myfitness/dishlist.php';
		$dishinfo_php				= $fdir.'myfitness/dishinfo.php';
		$listtable_js				= $fdir.'myfitness/listtable.js';
		$listtable2_js				= $fdir.'myfitness/listtable2.js';
		$listmaker_js				= $fdir.'myfitness/listmaker.js';
		$listrow_js					= $fdir.'myfitness/listrow.js';
		$listrow2_js				= $fdir.'myfitness/listrow2.js';
		$foodinfo_php				= $fdir.'myfitness/foodinfo.php';
		$ingredientlist_php		= $fdir.'myfitness/ingredientlist.php';
		$ingredientlist_q1_php	= $fdir.'myfitness/ingredientlist_q1.php';
		$myfitness_php				= $fdir.'myfitness/myfitness.php';
		$myfitness2_php			= $fdir.'myfitness/myfitness2.php';
		$newingredient_php		= $fdir.'myfitness/newingredient.php';
		$searchfilter_js			= $fdir.'myfitness/searchfilter.js';
		$nutrient_calc_php		= $fdir.'myfitness/nutrient_calc.php';
	}
	{	//plugs_n_libs
		$bootstrapcdn_php			= $fdir.'plugs_n_libs/bootstrapcdn.php';
	}
	{	//qry
		$pdo_insert_php					= $fdir.'qry/pdo_insert.php';
		$pdo_select_php					= $fdir.'qry/pdo_select.php';
		$pdo_update_php					= $fdir.'qry/pdo_update.php';
		$query_insert_php					= $fdir.'qry/query_insert.php';
		$query_select_php					= $fdir.'qry/query_select.php';
		$query_select2_php				= $fdir.'qry/query_select2.php';
		$query_update_php					= $fdir.'qry/query_update.php';
		$upload_php							= $fdir.'qry/upload.php';
	}
	{	//svr
		$loaddoc_js							= $fdir.'svr/loaddoc.js';
		$fme_select_php					= $fdir.'svr/fme_select.php';
		$fme_select_option_change_js	= $fdir.'svr/fme_select_option_change.js';
		$svr_mode_php						= $fdir.'svr/svr_mode.php';
	}
?>