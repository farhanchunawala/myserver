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
		p::placeholder {
		color: darkgrey;
		}
	</style>
</head>
<body>
<?php
	include $fn_inchtotextround2_php;
	include $fn_cmtoinchtext_php;
?>

<div id="app" class="container-fluid mx-n2">
<form method="post" action="<?php echo "$pattern_save2_php?svr_mode=$svr_mode&sr=$sr"; ?>" >
	<div id="accordion">
		
		<!-- info -->
		<div class="card">
			<div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black">
				<b>{{cust.sr+' '+cust.name+' '+cust.surname}}</b>
				<!-- <a class="btn" @click="saveInfo()" style="border: 1px solid lightgrey"><b>save</b></a> -->
			</a></div>
			<div id="collapse1" class="collapse" data-bs-parent="#accordion"><div class="card-body p-2">
				<span v-for="(x,kx) in cust" :key="kx"><label :for="kx" class="p-2">{{kx}}
					<input tabindex="1" type="text" class="form-control p-1" :name="kx" v-model="cust[kx]" style="width:130px" />
				</label></span>
			</div></div>
		</div>
		
		<!-- meas -->
		<div class="card">
			<div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse2" style="color:black">
				<b>Body Measure</b>
				<!-- <p v-if="kx=='save_date'" style="margin:0px">{{myDate(styles[style_key.style][kx])}}<br/></p> -->
				<!-- <a class="btn" @click="saveMeas()" style="border: 1px solid lightgrey"><b>save</b></a> -->
			</a></div>
			<div id="collapse2" class="collapse" data-bs-parent="#accordion"><div class="card-body p-0">
				<!-- <div class="form-group form-inline d-flex flex-wrap align-content-around">
				<div v-for="(x,kx) in meas" :key="kx" style="padding:5px 5px">
					<label class="form-inline" :for="kx">{{kx}}</label>
					<div><div class="btn-group">
					<input  tabindex="110" type="text"  class="myInput"  id=""  value=""					style="width:60px"  oninput=inchtocm(this.value,"")  onchange=inchtocm(this.value,"") />
					<input  tabindex="130" type="text"  class="myInput"  id=""  value=""  :name="kx"	style="width:50px"  oninput=cmtoinch(this.value,"")  onchange=cmtoinch(this.value,"") />
				</div></div></div></div> -->
				<table class="table table-borderless table-sm">
				<thead><tr><th></th></tr></thead>
				<tbody>
					<template v-for="(x,kx) in meas" :key="kx"><template v-if="kx!='sr' && kx!='measure_date' && kx!='lat' && kx!='half_delt' && kx!='pec' && kx!='lower_thigh_ln' && kx!='lower_thigh'">
					<template v-if="kx=='delt_ln' || kx=='biceps_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln'"><tr></template>
						<td style="padding:5px 2px 5px 10px">{{kx}}</td>
						<td style="padding:1px 10px 1px 2px"><div class="btn-group p-0">
							<input :tabindex="tabx(kx,2)" type="text"  class="myInput"  :ref="kx+'x'+'in'" :id="kx+'x'+'in'"  @change="inp(kx, 'in')"  :value="inchtotextround(meas[kx])"			style="width:60px; background-color:hsl(230, 0%, 98%)" />
							<input :tabindex="tabx(kx,4)" type="text"  class="myInput"  :ref="kx+'x'+'cm'" :id="kx+'x'+'cm'"  @change="inp(kx, 'cm')":value="pfx(meas[kx])"  :name="kx+'x'"	style="width:50px" />
						</div></td>
					<template v-if="kx=='delt_ln' || kx=='biceps_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln'"></tr></template>
					</template></template>
					<!-- <template v-for="(x,kx) in meas" :key="kx"><template v-if="kx!='sr' && kx!='measure_date' && kx!='lat' && kx!='half_delt' && kx!='pec'">
						<template v-if="kx=='biceps_ln' || kx=='delt_ln' || kx=='forearm_ln' || kx=='arm_ln' || kx=='chest_ln' || kx=='stomach_ln' || kx=='seat_ln' || kx=='knee_ln' || kx=='thigh_ln' || kx=='lower_thigh_ln' || kx=='calf_ln' || kx=='ground_ln'"><tr>
							<td style="padding:5px 2px 5px 10px">{{kx}}</td>
							<td style="padding:1px 10px 1px 2px"><div class="btn-group p-0">
								<input  tabindex="120" type="text"  class="myInput"  :id="kx+'x'+'in'"  value=""					style="width:60px; background-color:hsl(230, 0%, 98%)" />
								<input  tabindex="141" type="text"  class="myInput"  :id="kx+'x'+'cm'"  value=""  :name="kx+'x'"	style="width:50px" />
							</div></td>
						</template>
						<template v-else-if="kx=='biceps' || kx=='delt' || kx=='forearm' || kx=='wrist' || kx=='chest' || kx=='stomach' || kx=='seat' || kx=='waist' || kx=='thigh' || kx=='lower_thigh' || kx=='calf' || kx=='ankle'">
							<td style="padding:5px 2px 5px 10px">{{kx}}</td>
							<td style="padding:1px 10px 1px 2px"><div class="btn-group p-0">
								<input  tabindex="120" type="text"  class="myInput"  :id="kx+'x'+'in'"  value=""					style="width:60px; background-color:hsl(230, 0%, 98%)" />
								<input  tabindex="141" type="text"  class="myInput"  :id="kx+'x'+'cm'"  value=""  :name="kx+'x'"	style="width:50px" />
							</div></td>
						</tr></template>
					</template></template> -->
				<tbody>
				</table>
			</div></div>
		</div>
		
	</div>
	
	<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">
	<div v-for="(garb,type_key) in garbstyles">
	<div :id="'accordion'+type_key" v-if="garb[0]">
	<div class="card">
		<div class="card-header" style="white-space:nowrap">
			<a class="btn" data-bs-toggle="collapse" :href="'#collapse'+type_key" style="color:black"><b>{{type_key+' x '+garb.length}}</b></a>
			<button type="button" @click="removeType(garb, type_key)" class="btn btn-outline-secondary btn-sm" style="width:30px" >-</button>
			<button type="button" @click="addType(garb, type_key)" class="btn btn-outline-secondary btn-sm ms-1" style="width:30px" >+</button>
		</div>
		<div :id="'collapse'+type_key" class="collapse show" :data-bs-parent="'#accordion'+type_key"><div class="card-body px-2 py-0">
			<!--<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">-->
				<styletable :garbtype="type_key" :garbstyles="garb" :styles="styles[type_key]" :fits="fits[type_key]"></styletable>
			<!-- </div></div> -->
		</div></div>
	</div>
	</div>
	</div>
	</div></div>
	
	<input class="myInput" type="text" @click="lmkChange()">
	<ul id="myUL" v-show="lmk" >
		<li v-for="(garb,type_key) in garbs" ><a @click="addType(garb, type_key)" >{{type_key}}</a></li>
	</ul>
	<a class="btn" @click="oneSave()" style="border: 1px solid lightgrey" ><b>save</b></a></p>
	
</form>
</div>

<script> "use strict";
	var fdir = '../../';
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let sr		= url.searchParams.get("sr");
	let sv		= url.searchParams.get("sv");
</script>
<script>
const app = Vue.createApp({
	data() {
		return {
			val: 5,
			tx: 1,
			lmk: 0,
			cust:			{},
			meas:			{},
			styles:		{shirt:{}, kurta:{}, thobe:{}, pant:{}, salwar:{}},	//styles.garbtype.style.x => styles.shirt.default.style
			fits:			{shirt:{}, kurta:{}, thobe:{}, pant:{}, salwar:{}},	//styles.garbtype.fit.x => styles.shirt.default.style
         garbstyles: {shirt:[], kurta:[], thobe:[], pant:[], salwar:[]},	//garbstyles.garbtype.style.x => garbstyles.shirt.0.ogstyle
			garbs:		{shirt:{}, kurta:[], thobe:{}, pant:{}, salwar:{}}
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
			else if (a >= 0.1875 && a < 0.3125) z = y+25;
			else if (a >= 0.3125 && a < 0.4375) z = y+25+'+';
			else if (a >= 0.4375 && a < 0.5625) z = y+0.5;
			else if (a >= 0.5625 && a < 0.6875) z = y+0.5+'+';
			else if (a >= 0.6875 && a < 0.8125) z = y+0.75;
			else if (a >= 0.8125 && a < 0.9375) z = (y+1)+'=';
			else if (a >= 0.9375)				   z = y+1;
			
			return z
		}}
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
		addType(garb,type_key)		{ this.garbstyles[type_key].push({"ogstyle": "default", "style": "default"}); (garb.count) ? garb.count+=1 : garb.count=1 ; this.lmk=0;  },
		removeType(garb,type_key)	{ this.garbstyles[type_key].pop(); garb.count-=1 },
		saveInfo() {
			axios.post(fdir+'qry/pdo_'+sv+'.php?svr_mode='+svr_mode, {
			myArr:this.cust,  tbl:'cust',  whr:'WHERE sr='+sr
			}).then(response => { if (response.data) alert(response.data)
			}).catch(error => { console.log(error.response.data); this.errored1 = true
			}).finally(() => this.loading1 = false)
		},
		saveMeas() {
			this.meas.sr=this.cust.sr;
			axios.post(fdir+'qry/pdo_'+sv+'.php?svr_mode='+svr_mode, {
			myArr:this.meas,  tbl:'meas',  whr:'WHERE sr='+sr
			}).then(response => { if (response.data) alert(response.data)
			}).catch(error => { console.log(error.response.data); this.errored1 = true
			}).finally(() => this.loading1 = false)
		},
		saveFit() {
			for (garbtype in this.fits) {
				if (sv=='insert') this.fits[garbtype]['default']={'sr':this.cust.sr, 'garbtype':garbtype, 'fit':'default'}
				for (fit in this.fits[garbtype]) {
					axios.post(fdir+'qry/pdo_'+sv+'.php?svr_mode='+svr_mode, {
					myArr:this.fits[garbtype][fit],  tbl:'fit',  whr:'WHERE sr="'+sr+'" AND garbtype="'+garbtype+'"  AND fit="'+fit+'"'
					}).then(response => { if (response.data) alert(response.data)
					}).catch(error => { console.log(error.response.data); this.errored1 = true
					}).finally(() => this.loading1 = false)
				}
			}
		},
		saveStyle(style_key, ix) {
			for (garbtype in this.garbstyles) {
				for (style of this.garbstyles[garbtype]) {
					if (style['style'] == this.styles[garbtype][style['style']]['style']) {
						for (x in style) {
							if (this.styles[garbtype][style['style']].hasOwnProperty(x)) {
								this.styles[garbtype][style['style']][x] = style[x]
							};
						}
					} else {
						// for (x in style) {
						// 	if (this.styles[garbtype][style['style']].hasOwnProperty(x)) {
						// 		this.styles[garbtype][style['style']][x] = style[x]
						// 	};
						// }
						// sv_style='insert';
						// alert('use only default styles for now');
					}
				}
			}
			for (garbtype in this.styles) {
				if (sv=='insert') this.styles[garbtype]['default']={'sr':this.cust.sr, 'garbtype':garbtype, 'style':'default'}
				for (style in this.styles[garbtype]) {
					axios.post(fdir+'qry/pdo_'+sv+'.php?svr_mode='+svr_mode, {
					myArr:this.styles[garbtype][style],  tbl:'style',  whr:'WHERE sr="'+sr+'" AND garbtype="'+garbtype+'"  AND style="'+style+'"'
					}).then(response => { if (response.data) console.log(response.data);
					}).catch(error => { console.log(error.response.data); this.errored1 = true
					}).finally(() => this.loading1 = false)
				}
			}
		},
		saveEntry(style_key, ix) {
			for (garbtype in this.garbstyles) {
				for (style of this.garbstyles[garbtype]) {
					style['fit'] = this.styles[garbtype][style['style']]['fit'];
				}
			}
		},
		oneSave() {
			this.saveInfo();
			this.saveMeas();
			this.saveFit();
			this.saveStyle();
			// this.saveEntry();
		}
	},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM cust WHERE sr='+sr
		}).then(response => { this.cust = response.data[0]
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM meas WHERE sr='+sr
		}).then(response => { this.meas = response.data[0]
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM fit WHERE sr='+sr
		}).then(response => {
			for (let fit of response.data) {
				this.fits[fit['garbtype']][fit['fit']] = {};
				for (let x in fit) this.fits[fit['garbtype']][fit['fit']][x] = fit[x];
			}
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM style WHERE sr='+sr
		}).then(response => {
			for (let style of response.data) {
				this.styles[style['garbtype']][style['style']] = {};
				for (let x in style) this.styles[style['garbtype']][style['style']][x] = style[x];
			}
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