<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  echo "<title>$sr Entry</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="<?php echo $searchfilter_css ?>">
	<style>
		th {padding: 5px;
			background-color: white;
			position: -webkit-sticky;
			position: sticky;
			top: 0;
			white-space: nowrap;
		}
		td {white-space: nowrap;
		}
		::placeholder {
			color: darkgrey;
		}
		
		.accordion {
			background-color: #f2f2f2;
			height: 54px;
			display: flex;
			border: 0px solid #d9d9d9;
			border-width: 1px 1px 0px 1px;
			/* border-radius: 5px 5px 0px 0px; */
		}
		.accbtn {
			width:100%;
			text-align: left;
			transition: 0.4s;
			border: 0px solid #d9d9d9;
			padding: 0px 16px;
		}
		.active, .accbtn:hover {
			background-color: #ccc;
		}
		.panel {
			padding: 0 18px;
			background-color: white;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
			border: 0px solid #d9d9d9;
			border-width: 0px 1px 1px 1px;
			/* border-radius: 0px 0px 5px 5px; */
		}
	</style>
</head>
<body>
<?php
	include $fn_inchtotextround2_php;
	include $fn_cmtoinchtext_php;
	
	if ($_GET['cs']==1) include $create_style_php;
?>

<div id="app" class="container-fluid mx-n2">
<form>
	<div class="accordion"><button type="button" class="accbtn" @click="accordion('custinfo')" ><b>{{cust.sr+' '+cust.name+' '+cust.surname}}</b></button></div>
	<div  class="panel" ref="custinfo" >
		<span v-for="(x,kx) in cust" :key="kx"><label :for="kx" class="p-2">{{kx}}
			<input tabindex="1" type="text" class="form-control p-1" :name="kx" :value="x" style="width:130px" />
		</label></span>
	</div>
	
	<div class="accordion"><button type="button" class="accbtn" @click="accordion('bodymeas')" style="width:auto"><b>Body Measure</b></button>
		<!-- <p v-if="kx=='save_date'" style="margin:0px">{{myDate(styles[style_key.style][kx])}}<br/></p> -->
		<a class="btn" @click="saveStyle(style_key, ix)" style="border:1px solid lightgrey; margin:6px" ><b>save</b></a>
	</div>
	<div  class="panel" ref="bodymeas" >
		<table class="table table-borderless table-sm">
		<thead><tr><th></th></tr></thead>
		<tbody>
			<template v-for="(x,kx) in meas" :key="kx"><template v-if="kx!='sr' && kx!='measure_date' && kx!='lat' && kx!='half_delt' && kx!='pec'">
			<template v-if="kx=='delt_ln' || kx=='biceps_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln'"><tr></template>
				<td style="padding:5px 2px 5px 10px">{{kx}}</td>
				<td style="padding:1px 10px 1px 2px"><div class="btn-group p-0">
					<input :tabindex="tabx(kx,2)" type="text"  class="myInput"  :ref="kx+'x'+'in'" :id="kx+'x'+'in'"  @change="inp(kx, 'in')" :value="inchtotextround(x)"		style="width:60px; background-color:hsl(230, 0%, 98%)" />
					<input :tabindex="tabx(kx,4)" type="text"  class="myInput"  :ref="kx+'x'+'cm'" :id="kx+'x'+'cm'"  @change="inp(kx, 'cm')" :value="pfx(x)"  :name="kx+'x'"	style="width:50px" />
				</div></td>
			<template v-if="kx=='delt_ln' || kx=='biceps_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln'"></tr></template>
			</template></template>
		</tbody>
		</table>
	</div>
	
	<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">
	<div v-for="(garb,type_key) in garbstyles" :key="type_key" >
	<!-- <div :id="'accordion'+type_key" v-if="garb[0]">
	<div class="card">
		<div class="card-header" style="white-space:nowrap">
			<a class="btn" data-bs-toggle="collapse" :href="'#collapse'+type_key" style="color:black"><b>{{type_key+' x '+garb.length}}</b></a> -->
				<div class="accordion" v-if="garb[0]" style="padding-right:15px" ><button type="button" class="accbtn" @click="accordion('styletable'+type_key)" ><b>{{type_key+' x '+garb.length}}</b>
					<button type="button" @click="removeType(garb, type_key)" class="btn btn-outline-secondary btn-sm" style="padding:auto; margin:auto; height:30px; width:30px" >-</button>
					<button type="button" @click="addType(garb, type_key)" class="btn btn-outline-secondary btn-sm ms-1" style="padding:auto; margin:auto; height:30px; width:30px" >+</button>
				</button></div>
			<!-- </div>
			<div :id="'collapse'+type_key" class="collapse show" :data-bs-parent="'#accordion'+type_key"><div class="card-body px-2 py-0"> -->
				<!--<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">-->
					<div class="panel" :ref="'styletable'+type_key" >
						<styletable :garb="garb" :garbtype="type_key" :garbstyles="garb" ></styletable>
					</div>
			<!-- </div></div> -->
			<!-- </div></div>
		</div>
	</div> -->
	</div>
	</div></div>
	
	<input class="myInput" type="text" @click="lmkChange()">
	<ul id="myUL" v-show="lmk"><li>
		<a v-for="(garb,type_key) in garbs" @click="addType(garb, type_key)" >{{type_key}}</a>
	</li></ul>
	
</form>
</div>

<script> "use strict";
	var fdir = '../../';
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let sr		= url.searchParams.get("sr");
</script>
<script>
const app = Vue.createApp({
	data() {
		return {
			tx: 1,
			cust:		{},
			meas:		{},
			styles:	[],
			fits:		[],
         garbstyles: {shirt:[], kurta:[], thobe:[], pant:[], salwar:[]},
			garbs: {shirt:{}, kurta:[], thobe:{}, pant:{}, salwar:{}},
			lmk: 0
		}
	},
	methods: {
		inp(kx, u) {
			if (u=='in') {
				let x = this.$refs[kx+'x'+u][0].value;
				console.log(x);
				let a = x.toString();
				
				if (a.includes("+")) {
					a.replace("+", "");
					let b = parseFloat(a);
					c = (b + 0.125)/0.3937008;
				} else if (a.includes("=")) {
					a.replace("=", "");
					let b = parseFloat(a);
					c = (b - 0.125)/0.3937008;
				} else {
					let b = parseFloat(a);
					c = b/0.3937008;
				}
				this.meas[kx] = c;
			} else {
				this.meas[kx] = this.$refs[kx+'x'+u][0].value;
			}
		},
		lmkChange()						{ this.lmk=1 },
		addType(garb,type_key)		{ this.garbstyles[type_key].push({"style": "default"}); (garb.count) ? garb.count+=1 : garb.count=1 ; this.lmk=0;  },
		removeType(garb,type_key)	{ this.garbstyles[type_key].pop(); garb.count-=1 },
		accordion(id) {
			const elm = (this.$refs[id].style) ? this.$refs[id] : this.$refs[id][0];
			if (elm.style.maxHeight) { elm.style.maxHeight = null; }
			else { elm.style.maxHeight = elm.scrollHeight + "px"; }
		}
	},
	computed: {
		tabx() { return (kx,i) => {
			if (kx=='shoulder_ln' || kx=='delt_ln' || kx=='biceps_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln') j=1;
			else j=0;
			return this.tx+i+j;
		}},
		pfx() { return (x) => parseFloat(x).toFixed(1) },
		inchtotextround() { return (x) => {
			x *= 0.39370;
			let y = Math.floor(x);
			if (y==0) var a = 0;
			else      var a = x - y;
			
			if	  	  (a < 0.0625)					   z = y;
			else if (a >= 0.0625 && a < 0.1875) z = y+'+';
			else if (a >= 0.1875 && a < 0.3125) z = y+0.25;
			else if (a >= 0.3125 && a < 0.4375) z = y+0.25+'+';
			else if (a >= 0.4375 && a < 0.5625) z = y+0.5;
			else if (a >= 0.5625 && a < 0.6875) z = y+0.5+'+';
			else if (a >= 0.6875 && a < 0.8125) z = y+0.75;
			else if (a >= 0.8125 && a < 0.9375) z = (y+1)+'=';
			else if (a >= 0.9375)				   z = y+1;
			
			return z
		}}
	},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM style WHERE sr='+sr
		}).then(response => { this.styles = response.data
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM fit WHERE sr='+sr
		}).then(response => { this.fits = response.data
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM meas WHERE sr='+sr
		}).then(response => { this.meas = response.data[0]
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM cust WHERE sr='+sr
		}).then(response => { this.cust = response.data[0]
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
	}
})
</script>
<script src="<?php echo $styletable_js; ?>"></script>
<script> const mountedApp = app.mount('#app') </script>
<?php mysqli_close($dbc); ?>
</body>
</html>