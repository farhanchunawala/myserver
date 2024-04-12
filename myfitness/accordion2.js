app.component('accordion', {
	props: {
		foods:	{ type: Object },
		dishes:	{ type: Object },
		dishes2:	{ type: Object },
		dishes3:	{ type: Object }
	},
	template: /*html*/`
	<div v-for="(dish3, dish3_key) in dishes3" :key="dish3_key" >
	<div :id="accordionId(dish3_key)" >
		<div class="card" style="width:100%">
			<div class="card-header">
				
				<input type="text" class="myInput" v-model="dishname_change" @click="listToggleOn(dish3_key)" placeholder="Dsh" >
				<ul id="myUL" v-show="dishes3[dish3_key]['lsmk']" >
					<li v-for="(dish,dish_key) in dishes" >
						<a href="#" @click="rowIncriment(dish_key, dish3_key)" >{{dish_key}}</a>
					</li>
				</ul>
				
				<a class="btn" data-bs-toggle="collapse" :href="collapseRef(dish3_key)" style="color:black" @click="firstIngr(dish3_key)"><b>{{dish3_key}}</b></a>
			</div>
			<div :id="collapseId(dish3_key)" class="collapse" :data-bs-parent="accordionRef(dish3_key)"><div class="card-body px-2 py-0">
				<listrow :foods="foods" :dish="dishes[dish3_key]" :dish2="dishes2[dish3_key]" :dishname_change="dishname_change"></listrow>
			</div></div>
		</div>
	</div>
	</div>
	`,
	data() {
		return {
			dishname_change: ''
		}
	},
	computed: {
		accordionId()	{ return dish3_key => `accordion_${dish3_key}` },
		accordionRef()	{ return dish3_key => `#accordion_${dish3_key}` },
		collapseId()	{ return dish3_key => `collapse_${dish3_key}` },
		collapseRef()	{ return dish3_key => `#collapse_${dish3_key}` },
	},
	methods: {
		listToggleOn(dishname) {
			this.listToggleOff(dishname),
			this.dishes3[dishname]['lsmk'] = 1
		},
		listToggleOff() {
			for (dish in this.dishes3) this.dishes3[dish]['lsmk'] = 0
		},
		rowIncriment(dishname, ds) {
			this.listToggleOff()
			if (ds=='') {this.dishes3[dishname] = {} }
			else { delete this.dishes3[ds]; this.dishes3[dishname] = {} }
		},
		firstIngr(dishname) {
			if (this.dishes[dishname]['ingr1']=='') this.dishes[dishname]['ingr1'] = null;
		}
	}
})