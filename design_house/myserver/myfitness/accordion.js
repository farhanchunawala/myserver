app.component('accordion', {
	props: {
		//inneracc: String
	},
	template: /*html*/`
	<div id="accordion">
		<div class="card" style="width:700px">
		<div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b>Dsh</b></a></div>
		<div id="collapse1" class="collapse show" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
		`+acc_inner+ /*html*/`
		</div></div></div>
	</div>
	`,
	data() {
		return {}
	},
	methods: {}
})