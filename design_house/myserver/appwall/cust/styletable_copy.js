app.component('styletable', {
	props: {
		// style:	{ type: Object },
		// fit:		{ type: Object },
		garbtype:	{ type: Object },
		typename:	{ type: String }
	},
	template: /*html*/ `
	<div v-for="(style,style_key) in styles" :key="style_key">
	<div :id="'accordion'+style_key" v-if="garbtype[style_key+'count'] || style_key==typename+'.0'">
	<div class="card"><div class="card-header" style="background-color:lightgrey">
		<a class="btn" data-bs-toggle="collapse" :href="'#'+collapse(style_key,'')" style="color:black; white-space:nowrap"><b>{{style_key+' x '+garbtype.count}}</b></a>
	</div>
	<div :id="collapse(style_key,'')" class="collapse show" :data-bs-parent="'#accordion'+style_key"><div class="card-body px-2 py-0">
		
		<!--<div :id="'tb_garb_info'+style_key"></div>-->
		<table class="table table-borderless table-sm">
		<thead><tr><th></th></tr></thead>
		<tbody>
			<tr><td>description	</td><td v-for="ct in garbtype.count"><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="" style="width:120px" /></td></tr>
			<tr><td>pairing		</td><td v-for="ct in garbtype.count"><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="'+String.fromCharCode(pairing)+'" style="width:120px" /></td></tr>
			<tr><td>submit_date	</td><td v-for="ct in garbtype.count"><input type="text" class="form-control p-2" name="'+myStyle.stylename+x+c+'" value="" placeholder="yyyy-mm-dd" style="width:120px" /></td></tr>
		</tbody>
		</table>
		
		<div :id="'accordionstyle'+style_key">
			
			<!--<div :id="'tb_stylefit'+style_key"></div>-->
			<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" :href="'#'+collapse(style_key,'fit')" style="color:black"><b>Fit</b></a></div>
			<div :id="collapse(style_key,'fit')" class="collapse" :data-bs-parent="'#accordionstyle'+style_key">
			<div class="card-body px-2 py-0">
			<table class="table table-borderless table-sm">
			<thead><tr><th></th></tr></thead>
			<tbody>
				<tr v-for="(x,kx) in fits[style_key]">
					<td>{{kx}}</td>
					<td><div class="btn-group">
						<input  tabindex="120" type="text"  class="form-control p-1"  :id="style_key+'x'+'in'"  :value="inchtotextround(x)"										style="width:60px" />
						<input  tabindex="141" type="text"  class="form-control p-1"  :id="style_key+'x'+'cm'"  :value="pfx(x)"  :name="style_key+'x'"	style="width:50px" />
					</div></td>
				</tr>
			</tbody>
			
			</table>
			</div></div></div>
			
			<!--<div :id="'tb_garbstyle'+style_key"></div>-->
			<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" :href="'#'+collapse(style_key,'style')" style="color:black"><b>Style</b></a></div>
				<div :id="collapse(style_key,'style')" class="collapse" :data-bs-parent="'#accordionstyle'+style_key">
				<div class="card-body px-2 py-0">
				<table class="table table-borderless table-sm">
				<thead><tr><th></th></tr></thead>
				<tbody>
					<tr v-for="(x,kx) in style" ><template v-if="kx!='sr' && kx!='stylename' && kx!='garbtype'">
						<td>{{kx}}</td>
						<td v-for="(ct,ix) in garbtype.count+1">
							<p v-if="kx=='save_date'" style="margin:0px">{{myDate(x)}}<br/>
							<a class="btn" @click="myDate" style="border: 1px solid lightgrey"><b>save</b></a></p>
							<input v-else class="myInput" type="text" @click="lmkChange(kx,ix)">
							<ul id="myUL" v-if="kx=='collar_type'" v-show="lmk[kx][ix]"><li>
								<a href="#" v-for="x in sel_styles[kx]" @click="selectType(x)">{{x}}</a>
							</li></ul>
							<!--<select class="form-select p-0" tabindex="" name="'style_key+x+ct+'" style="width:120px">
							<option value="default">default</option>
							<option value="'+y+'" >'+dp+'</option>
							</select>-->
						</td>
					</template></tr>
				</tbody>
				</table>
			</div></div></div>
			
			<!--<div :id="'tb_garbsp'+style_key"></div>-->
		</div>
		
	</div></div></div>
	</div>
	</div>{{styles}}
	`,
	data() {
		return {
			styles:	{},
			fits:		{},
			lmk:		{
				style: [],
				collar_type: [0,0],
				cuff_ln: [],
				cuff_type: [],
				pocket_type: [],
				shoulder_type: [],
				taweez_type: [],
				belt_type: [],
				chainfly: [],
				pocket: [],
				backpocket: [],
				watchpocket: [],
				bottom_type: [],
				crease: [],
				note1: [],
				note2: [],
				note3: []
			},
			sel_styles: {
				collar_type:	['rmpc', 'lspc', 'bc'],
				cuff_type:		['cut', 'round', 'no_cuff']
			}
		}
	},
	computed: {
		pfx() { return (x) => parseFloat(x).toFixed(1) },
		collapse() { return (style_key,type) => 'collapse'+type+style_key.replace(".", "_") },
		inchtotextround() { return (x) => {
			x *= 0.39370;
			let y = Math.floor(x);
			if (y==0) var a = 0;
			else      var a = x - y;
			
			if	  	  (a < 0.0625)					   z = y;
			else if (a >= 0.0625 && a < 0.1875) z = y+'+';
			else if (a >= 0.1875 && a < 0.3125) z = y+'¼';
			else if (a >= 0.3125 && a < 0.4375) z = y+'¼+';
			else if (a >= 0.4375 && a < 0.5625) z = y+'½';
			else if (a >= 0.5625 && a < 0.6875) z = y+'½+';
			else if (a >= 0.6875 && a < 0.8125) z = y+'¾';
			else if (a >= 0.8125 && a < 0.9375) z = (y+1)+'=';
			else if (a >= 0.9375)				   z = y+1;
			
			return z
		}}
	},
	methods: {
		myDate (date) {
			return new Date(date).toDateString();
		},
		lmkChange(kx,ix)	{ this.lmk[kx][ix]=1 },
		selectType(x)		{ this.lmk=0 }
	},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM style WHERE sr='+sr+' AND garbtype="'+this.typename+'"'
		}).then(response => { //this.styles = response.data
			for (let style of response.data) {
				this.styles[style['stylename']] = {};
				if (response.data) this.styles[this.typename+'.0'] = {};
				for (let x in style) {
					this.styles[style['stylename']][x] = style[x];
				}
			}
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM fit WHERE sr='+sr+' AND garbtype="'+this.typename+'"'
		}).then(response => { //this.fits = response.data
			for (let fit of response.data) {
				this.fits[fit['stylename']] = {};
				for (let x in fit) {
					this.fits[fit['stylename']][x] = fit[x];
				}
			}
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
	}
})