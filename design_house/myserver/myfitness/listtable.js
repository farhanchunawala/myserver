app.component('listtable', {
	props: {
		myobjs:		{ type: Object },
		linkfile:	{ type: String }
	},
	template: /*html*/ `
	<table class="table table-striped">
		<thead><tr>
			<th v-for="(x,kx) in myobjs['']" >{{kx}}</th>
		</tr></thead>
		<tbody><tr v-for="(food,food_key) in myobjs" :key="food_key" >
			<td v-for="(x,kx) in food" :key="kx" >
				<span v-if="kx=='food_id' || kx=='sr'" ><a :href="hrefId(x,kx)" >{{x}}</a></span>
				<span v-else >{{x}}</span>
			</td>
		</tr></tbody>
	</table>
	`,
	data() {
		return {
			svr_mode: ''
		}
	},
	computed: {
		hrefId()		{ return (x,kx) => this.linkfile+'.php?svr_mode='+svr_mode+'&'+kx+'='+x+'&sv=0' }
	},
	methods: {
		
	}
})