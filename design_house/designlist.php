<!DOCTYPE html>
<html lang="en">
<head><title>Design List</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode']; ?>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="<?php echo $searchfilter_css ?>">
</head>
<body>

<?php
	// $navtitle='New';  $navlink=$foodinfo_php."?svr_mode=$svr_mode&food_id=0&sv=0";  include $navbar_php;
?>
<div id="app" class="container-fluid">
	<h1 class="mt-4 mb-5"> &nbsp </h1>
	<input type="text" class="myInput" name="" v-model="category" placeholder="Category" >
	<listtable :myobjs="tops" :linkfile="linkfile" ></listtable>
</div>

<script>
	let fdir='../';
	let url_string = window.location.href;
	let url = new URL(url_string);
	let svr_mode = url.searchParams.get("svr_mode");
</script>

<script>
const app = Vue.createApp({
	data() {
		return {
			tops:			{},
			category:	'',
			linkfile:	'design_save',
			loading1:	true,
			errored1:	false
		}
	},
	methods: {
		
	},
	mounted() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM top'
		}).then(response => {
			for (let top of response.data) {
				this.tops[top['name']] = {};
				for (let x in top) {
					if (x!='link' && x!='summary') this.tops[top['name']][x] = top[x];
				}
			}
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
	}
})
</script>
<script src="<?php echo $listtable_js; ?>"></script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>