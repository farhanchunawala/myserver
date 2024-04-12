app.component('listrow', {
	props: {
		foods:	{ type: Object },
		dish:		{ type: Object },
		dish2:	{ type: Object },
		dishname_change: { type: String }
	},
	template: /*html*/ `
	<table>
	<thead><tr>
		<th></th><th>protein</th><th>calories</th>
	</tr></thead>
	<tbody><tr v-for="(x,kx) in dish" :key="kx" >
		
		<td v-if="/ingr/.test(kx) && !/qty/.test(kx) && !/lmk/.test(kx) && x!=''" >
			<div class="btn-group">
			<input id="input" type="text" class="myInput" :name="kx" v-model="dish[kx]" @click="listToggleOn(kx)" @keyup="searchFilter" placeholder="Ingr Name" >
			<input type="text" class="myInput" :name="kxQty(kx)" v-model="dish[kx+'_qty']" placeholder="Qty" >
			</div>
			<ul id="myUL" v-show="lmk(kx)"><li>
				<a href="#" v-for="food in foodfilter" @click="rowIncriment(kx, food['name'])" >{{ food['name'] }}</a>
			</li></ul>
		</td>
		<td v-if="foods[x]">{{proteins(foods[x]['protein'], dish[kx+'_qty'], foods[x]['ml_to_g'])}}</td>
		<td v-if="foods[x]">{{calories(foods[x]['protein'], foods[x]['carb'], foods[x]['fat'], dish[kx+'_qty'], foods[x]['ml_to_g'])}}</td>
		
	</tr></tbody>
	<tfoot><tr>
		<td></td>
		<td><b>{{sumProteins()}}</b></td>
		<td><b>{{sumCalories()}}</b></td>
	</tr></tfoot>
	</table>
	<a class="btn" @click="save" style="border: 1px solid lightgrey"><b>Save</b></a>
	`,
	data() {
		return {}
	},
	computed: {
		foodfilter() {
			return this.foods;
			// alert(this.foods.keys);
			// input = document.getElementById('input');
			// return this.foods.filter(food => {
			// 	return food.includes(input)
			// })
		},
		kxQty()	{ return kx => `${kx}_qty` },
		lmk()		{ return (kx) => this.dish2[`${kx}lmk`] },
		qnt()		{ return (qnty, mltg) => {
			qty = String(qnty).split(" ")[0];
			let srv = parseInt(qty.match(/\d+/g));
			
			let qty_mult=1;
			if	(/ml/.test(qty)) qty_mult = mltg;
			
			return qty_mult*srv;
		}},
		proteins()	{ return (protein, qnty, mltg) => {
			let qty = this.qnt(qnty, mltg);
			return (qty) ? Math.round(protein*qty) : ''
		}},
		sumProteins() { return () => {
			let sum=0;
			for (let x in this.dish) {
				if(/ingr/.test(x) && !/qty/.test(x) && this.dish[x+'_qty']) {
					sum += this.proteins(this.foods[this.dish[x]]['protein'], this.dish[x+'_qty'], this.foods[this.dish[x]]['ml_to_g']) }
			}
			return sum;
		}},
		calories()	{ return (protein, carb, fat,  qnty, mltg) => {
			let qty = this.qnt(qnty, mltg);
			cal = Math.round(carb*qty*4+fat*qty*9+protein*qty*4);
			tc = cal//+' ('+Math.round(carb*qty*4*100/cal)+'%, '+Math.round(fat*qty*9*100/cal)+'%, '+Math.round(protein*qty*4*100/cal)+'%)';
			return (qty) ?  tc : '' ;
		}},
		sumCalories() { return () => {
			let sum_carb=0, sum_fat=0, sum_protein=0;
			for (let x in this.dish) {
				if(/ingr/.test(x) && !/qty/.test(x) && this.dish[x+'_qty']) {
					sum_carb		+= this.foods[this.dish[x]]['carb']*	this.qnt(this.dish[x+'_qty'], this.foods[this.dish[x]]['ml_to_g'])*4;
					sum_fat		+= this.foods[this.dish[x]]['fat']*		this.qnt(this.dish[x+'_qty'], this.foods[this.dish[x]]['ml_to_g'])*9;
					sum_protein	+= this.foods[this.dish[x]]['protein']*this.qnt(this.dish[x+'_qty'], this.foods[this.dish[x]]['ml_to_g'])*4;
				}
			}
			let sum_cal = Math.round(sum_carb + sum_fat + sum_protein);
			let pct_carb = Math.round(sum_carb*100/sum_cal);
			let pct_fat = Math.round(sum_fat*100/sum_cal);
			let pct_protein = Math.round(sum_protein*100/sum_cal);
			return sum_cal+' ('+pct_carb+'%, '+pct_fat+'%, '+pct_protein+'%)'
		}}
	},
	methods: {
		listToggleOn(dishingr) {
			for (i=0; i<=20; i++) this.dish2['ingr'+i+'lmk'] = 0;
			this.dish2[dishingr+'lmk'] = 1
		},
		listToggleOff() {
			for (i=0; i<=20; i++) this.dish2['ingr'+i+'lmk'] = 0
		},
		rowIncriment(dishingr, ingr) {
			let ingrp1 = parseInt(dishingr.match(/\d+/g))+1;
			if (this.dish['ingr'+ingrp1]=='') this.dish['ingr'+ingrp1] = null;
			this.dish[dishingr] = ingr,
			this.listToggleOff()
		},
		searchFilter() {
			// var input, filter, ul, li, a, i, txtValue;
			// input = document.getElementById('input');
			// filter = input.value.toUpperCase();
			// ul = document.getElementById("myUL");
			// li = ul.getElementsByTagName("li");
			// for (i = 0; i < li.length; i++) {
			// 	a = li[i].getElementsByTagName("a")[0];
			// 	txtValue = a.textContent || a.innerText;
			// 	if (txtValue.toUpperCase().indexOf(filter) > -1) {
			// 		li[i].style.display = "";
			// 	} else {
			// 		li[i].style.display = "none";
			// 	}
			// }
			// console.log(a);
		},
		save() {
			if (this.dish.dish_id!=1) {
				
				if (this.dishname_change) this.dish.dish_name = this.dishname_change;
				
				axios.post(fdir+'qry/pdo_update.php?svr_mode='+svr_mode, {
				myArr:this.dish,  tbl:'dish',  whr:'WHERE dish_name="'+dish_name+'"'
				}).then(response => {
					if(response.data) alert(response.data);
					else alert ('saved');
				}).catch(error => { console.log(error.response.data); this.errored1 = true
				}).finally(() => this.loading1 = false)
				
			} else {
				
				this.dish.dish_id = null;
				this.dish.dish_name = this.dishname_change;
				
				axios.post(fdir+'qry/pdo_insert.php?svr_mode='+svr_mode, {
				myArr:this.dish,  tbl:'dish'
				}).then(response => {
					if(response.data) alert(response.data);
					else alert ('saved');
				}).catch(error => { console.log(error.response.data); this.errored1 = true
				}).finally(() => this.loading1 = false)
				
			}
		}
	}
})