app.component('styletable', {
	props: {
		garbtype:	{ type: String },
		garbstyles:	{ type: Object },
		styles:		{ type: Object },
		fits:			{ type: Object }
	},
	template: /*html*/ `
	<!--<div v-for="(mystyle,style_key) in garbstyles" :key="style_key">{{mystyle}}</div>-->
	<!--<div :id="accRef('accordion'+garbtype,style_key)" v-if="garbtype[style_key+'count'] || style_key=='0'">
	<div class="card"><div class="card-header" style="background-color:lightgrey">
		<a class="btn" data-bs-toggle="collapse" :href="'#'+accRef('collapse'+garbtype,style_key)" style="color:black; white-space:nowrap"><b>{{garbtype+'.'+style_key+' x '+garb.count}}</b></a>
	</div>
	<div :id="accRef('collapse'+garbtype,style_key)" class="collapse show" :data-bs-parent="'#'+accRef('accordion'+garbtype,style_key)"><div class="card-body px-2 py-0">-->
	
		<div :id="accRef('accordionstyle'+garbtype,'')">
			
			<!-- fit -->
			<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" :href="'#'+accRef('collapsefit'+garbtype,'')" style="color:black"><b>Fits</b></a></div>
			<div :id="accRef('collapsefit'+garbtype,'')" class="collapse" :data-bs-parent="'#'+accRef('accordionstyle','')">
			<div class="card-body px-2 py-0">
			<table class="table table-borderless table-sm">
			<thead><tr><th></th></tr></thead>
			<tbody style="display:flex; flex-wrap:nowrap">
				<span v-for="(fit,fit_key) in fits" style="border-right:1px solid lightgrey; padding-left:10px">
				<tr></tr>
				<tr v-for="(x,kx) in fit"><template v-if="kx!='sr' && kx!='garbtype'" >
					<td>{{kx}}</td>
					<td style="padding:1px 8px">
						<p v-if="kx=='save_date'" style="margin:0px; font-size:13px">{{ myDate(fits[fit_key][kx]) }}</p>
						<p v-else-if="kx=='fit'" style="margin:0px"><b>{{ fits[fit_key][kx] }}</b></p>
						<div v-else class="btn-group">
							<input  tabindex="120" type="text"  class="myInput"  :ref="kx+'x'+'in'" :id="kx+'x'+'in'"  @change="inp(fit_key, kx, 'in')" :value="inchtotextround(x)"		style="width:60px; background-color:hsl(230, 0%, 98%)" />
							<input  tabindex="141" type="text"  class="myInput"  :ref="kx+'x'+'cm'" :id="kx+'x'+'cm'"  @change="inp(fit_key, kx, 'cm')" :value="pfx(x)"  :name="kx+'x'"	style="width:50px" />
						</div>
					</td>
				</template></tr>
				</span>
			</tbody>
			</table>
			</div></div></div>
			
			<!-- details
			<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" :href="'#'+accRef('collapseinfo'+garbtype,'')" style="color:black"><b>Details</b></a></div>
			<div :id="accRef('collapseinfo'+garbtype,'')" class="collapse" :data-bs-parent="'#'+accRef('accordionstyle','')">
			<div class="card-body px-2 py-0">
				<table class="table table-borderless table-sm">
				<thead><tr><th></th></tr></thead>
				<tbody>
					<tr><td>description	</td><td v-for="ct in garbstyles" style="padding:2px"><input type="text" class="myInput" name="'+myStyle.stylename+x+c+'" value=""/></td></tr>
					<tr><td>pairing		</td><td v-for="ct in garbstyles" style="padding:2px"><input type="text" class="myInput" name="'+myStyle.stylename+x+c+'" value="String.fromCharCode(pairing)"/></td></tr>
					<tr><td>submit_date	</td><td v-for="ct in garbstyles" style="padding:2px"><input type="text" class="myInput" name="'+myStyle.stylename+x+c+'" value="" placeholder="yyyy-mm-dd"/></td></tr>
				</tbody>
				</table>
			</div></div></div>-->
			
			<!-- style -->
			<div class="card"><div class="card-header" style="white-space: nowrap">
				<a class="btn" data-bs-toggle="collapse" :href="'#'+accRef('collapsestyle'+garbtype,'')" style="color:black"><b>Style</b></a>
			</div>
			<div :id="accRef('collapsestyle'+garbtype,'')" class="collapse" :data-bs-parent="'#'+accRef('accordionstyle'+garbtype,'')">
			<div class="card-body px-2 py-0">
				<table class="table table-borderless table-sm">
				<thead><tr><th></th></tr></thead>
				<tbody style="display:flex; flex-wrap:nowrap">
					<span v-for="(style_key,ix) in garbstyles">
					<tr v-for="(x,kx) in styles[style_key.ogstyle]" ><template v-if="kx!='sr' && kx!='garbtype'">
						<td v-if="ix==0">{{kx}}</td>
						<td style="padding:2px">
							<p v-if="kx=='save_date'" style="margin:0px; font-size:13px">{{myDate(styles[style_key.style][kx])}}<br/>
							<!--<a class="btn" @click="saveStyle(style_key, ix)" style="border: 1px solid lightgrey"><b>save</b></a>--></p>
							<!--<input v-else class="myInput" type="text" @click="lmkChange(kx,ix)" @change="inp(garbstyles[ix][kx])" v-model="garbstyles[ix][kx]" :placeholder="styles[style_key.style][kx]">-->
							<input v-else class="myInput" type="text" :ref="ix+kx" @click="lmkChange(kx,ix)" @change="styleInput(ix, kx)" :value="garbstyles[ix][kx]" :placeholder="styles[style_key.ogstyle][kx]">
							<ul id="myUL" v-if="kx!='save_date'" v-show="lmk[kx][ix]"><li>
								<a v-for="x in sel_styles[kx]" @click="selectType(x, style_key.ogstyle, kx, ix)">{{x}}</a>
							</li></ul>
						</td>
					</template></tr></span>
				</tbody>
				</table>
			</div></div></div>
			
			<!--<div :id="'tb_garbsp'+style_key"></div>-->
		</div>
		
	<!--</div></div></div></div>-->
	`,
	data() {
		return {
			// entries:	[],
			lmk:		{
				style: [],	fit: [],	collar_type: [],	cuff_ln: [],	cuff_type: [],		pocket_type: [],	shoulder_type: [],	taweez_type: [],
				belt_type: [],	chainfly: [],	pocket: [],	backpocket: [],	watchpocket: [],	bottom_type: [],	crease: [],	
				note1: [],	note2: [],	note3: []
			},
			lmk_fits: 1,
			// sel_fits: (Object.keys(this.fits)) ? Object.keys(this.fits) : [],
			sel_styles: {
				style:			(Object.keys(this.styles)) ? Object.keys(this.styles) : [],
				fit:				(Object.keys(this.fits)) ? Object.keys(this.fits) : [],
				bottom_type:	['', 'oshirt', 'bshirt', 'bshirt_sc', 'straight', 'round'],
				collar_type:	['', 'rmpc', 'lspc', 'bc', 'no collar'],
				cuff_type:		['', 'cut', 'round', 'no cuff'],
				pocket_type:	['', 'v', 'square', 'round'],
				shoulder_type:	['', 'regular', 'v', 'double v'],
				taweez_type:	['', 'v', 'square'],
				belt_type:		['', 'lbelt', 'cbelt'],
				chainfly:		['', 'no', 'yes'],
				crease:			['', 'fc', 'sc'],
			}
		}
	},
	computed: {
		pfx() { return (x) => parseFloat(x).toFixed(1) },
		accRef() { return (type,style_key) => type+style_key//.replace(".", "_") 
		},
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
	methods: {
		styleInput(ix, kx) {
			if (kx=='style' || kx=='fit') { alert('pls use default for now');
			} else {
				this.lmk[kx][ix]=0;
				this.styles[this.$refs[ix+kx][0].value] = {};
				this.garbstyles[ix][kx] = this.$refs[ix+kx][0].value;
			}
		},
		inp(key, kx, u) {
			if (u=='in') {
				let x = this.$refs[kx+'x'+u][0].value;
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
				this.fits[key][kx] = c;
			} else {
				this.fits[key][kx] = this.$refs[kx+'x'+u][0].value;
			}
		},
		myDate (date) {
			return new Date(date).toDateString();
		},
		lmkChange(kx,ix) { this.lmk[kx][ix]=1 },
		selectType(x, style_key, kx, ix) {
			if (kx=='style') {
				this.garbstyles[ix]['ogstyle']=x;
				this.garbstyles[ix]['style']=x;
			} else {
				this.garbstyles[ix][kx] = x;
				// this.styles[style_key][kx] = x;
			}
			// this.styles[style_key][kx] = x
			this.lmk[kx][ix]=0;
		}
	}
})