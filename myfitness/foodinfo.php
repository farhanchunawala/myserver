<!DOCTYPE html>
<html lang="en">
<head><title>Design Save</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode']; ?>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="<?php echo $searchfilter_css ?>">
	<style>
		textarea {
			resize: none;
			overflow: hidden;
			min-height: 100px;
			max-height: 400px;
			width: 100%
		}
	</style>
</head>
<body>
<?php //$navtitle='';  $navlink=$dishinfo_php."?svr_mode=$svr_mode&dish_id=0&fsv=0";  include $navbar_php; ?>
<div id="app" class="container-fluid mt-3">
	
	<a class="btn float-end p-1" @click="save" style="border: 1px solid lightgrey"><b>Save</b></a>
	<textarea oninput="auto_grow(this)" v-model="ingr.summary"></textarea>
	<span v-for="(x,kx) in ingr" :key="kx">
	<label v-if="kx!='summary'" style="margin:10px">{{kx}}<br/>
		<input class="input" type="text" v-model="ingr[kx]">
	</label>
	</span>{{ingr}}
</div>

<script>
	let fdir='../';
	let url_string = window.location.href;
	let url = new URL(url_string);
	let svr_mode = url.searchParams.get("svr_mode");
	let sr = url.searchParams.get("sr");
	let acc_inner = '<listrow :foods="foods" :dish="dishes[dish3_key]" :dish2="dishes2[dish3_key]"></listrow>';
	
	function auto_grow(element) {
		element.style.height = "5px";
		element.style.height = (element.scrollHeight)+"px";
	}
</script>

<script>
const app = Vue.createApp({
	data() {
		return {
			uploadfiles: '',
			ingr: {},
			errored: false,
			loading: true
		}
	},
	methods: {
		prodParts() {
			if (this.ingr.summary) {
				myArr = this.ingr.summary.split("\n");
				for (x of myArr) { if (!x) myArr.shift() }
				if (!this.ingr.name) this.ingr.name = myArr[0].split(",")[0];
				for (x of myArr) {
					if(/total carbohydrate/i.test(x)) { if (!this.ingr.carb) this.ingr.carb = (x.split(' ')[2]/100).toFixed(3); }
					else if(/total fat/i.test(x)) { if (!this.ingr.fat) this.ingr.fat = (x.split(' ')[2]/100).toFixed(3); }
					else if(/protein/i.test(x)) { if (!this.ingr.protein) this.ingr.protein = (x.split(' ')[1]/100).toFixed(3); }
				}
			}
		},
		save() {
			this.prodParts();
			if (sr==1) {
				this.ingr.sr=0;
				axios.post(fdir+'qry/pdo_insert.php?svr_mode='+svr_mode, {
				myArr:this.ingr,  tbl:'food'
				}).then(response => { if (response.data) alert(response.data)
				}).catch(error => { console.log(error.response.data); this.errored1 = true
				}).finally(() => this.loading1 = false)
			} else {
				axios.post(fdir+'qry/pdo_update.php?svr_mode='+svr_mode, {
				myArr:this.ingr,  tbl:'food', whr:'Where sr='+sr
				}).then(response => { if (response.data) alert(response.data)
				}).catch(error => { console.log(error.response.data); this.errored1 = true
				}).finally(() => this.loading1 = false)
			}
		}
	},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM food WHERE sr='+sr
		}).then(response => { this.ingr = response.data[0]; console.log(response.data);
		}).catch(error => { console.log(error.response.data); this.errored = true
		}).finally(() => this.loading = false)
	}
})
</script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>