<?php
	
	{	//front
		$x_pf_length = $length - 1.25 + 0.5 + 2.75;
		
		$y_pf_cf = $cuttingfactor/2;
		$y_pf_center_thigh = $cuttingfactor/4;
		$y_pf_center_calf = $calf_loose/4;
		$y_pf_center_bottom = $bottom/4;
		
		$x_pf_fork = $fork - 1.25;
		$y_pf_wtdf = $y_pf_cf - ($waist/4 + 3.25);
		
		$x_pf_calfln = $calfln - 1.25;
		$x_pf_thigh_calf = $calfln - $fork;
		$y_pf_tcdf = $y_pf_center_thigh - $y_pf_center_calf;
		
		$x_pf_calf_bottom = $length + 0.5 - $calfln;
		$y_pf_cbdf = $y_pf_center_calf - $y_pf_center_bottom;
		
		$x_pf_bottomfd = 2.75;
		$y_pf_btm = 0.25;
		$y_pf_bottomfd = $bottom/2 + 0.5;
		
		$y_pf_fly = 1.75;
		$y_pf_flyslope = 0.5;
		
		$y_pf_waist = $waist/4 + 1;
	}
	{	//back
		$y_pb_forkmark = 0.25;
	}
	
?>