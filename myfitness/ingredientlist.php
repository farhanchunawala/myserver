<!DOCTYPE html>
<html lang="en">
<head><title>Ingredient List</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode'];  $srh=$_GET['srh']; ?>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

<?php $srh=$_GET['srh'];
	$navtitle='New';  $navlink=$foodinfo_php."?svr_mode=$svr_mode&food_id=0&sv=0";  include $navbar_php;
?>
<div id="app" class="container-fluid">
	<h1 class="mt-4 mb-5"> &nbsp </h1>
	<listtable :myobjs="foods" :linkfile="linkfile" ></listtable>
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
			foods:		{},
			linkfile:	'foodinfo',
			loading1:	true,
			errored1:	false
		}
	},
	methods: {},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM food'
		}).then(response => {
			for (let food of response.data) {
				this.foods[food['name']] = {};
				for (let x in food) {
					if (x!='summary') {
						this.foods[food['name']][x] = (x=='protein' || x=='carb' || x=='fat') ? food[x]*1000/10 : food[x];
					}
				}
			}
		}).catch(error => { console.log(error.response.data); this.errored1 = true
		}).finally(() => this.loading1 = false)
	}
})
</script>
<script src="<?php echo $listtable_js; ?>"></script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>