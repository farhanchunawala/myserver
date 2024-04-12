<!DOCTYPE html>
<html lang="en">
<head><title>Nutrient Calc</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode']; ?>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="<?php echo $searchfilter_css ?>">
</head>
<body>
<?php //$navtitle='';  $navlink=$dishinfo_php."?svr_mode=$svr_mode&dish_id=0&fsv=0";  include $navbar_php;
	if ($_GET['sv']==1) {}
?>
<div id="app">
<div class="container-fluid">
	<h1 class="mt-4 mb-5"></h1>
	<form method="post" action="<?php echo $nutrient_calc_php."?svr_mode=$svr_mode&sv=1";?>" >
	<div class="form-group">
		<accordion :foods="foods" :dishes="dishes" :dishes2="dishes2" :dishes3="dishes3"></accordion>
	</div>
	</form>
</div>
</div>
<script>
	let fdir='../';
	let url_string = window.location.href;
	let url = new URL(url_string);
	let svr_mode = url.searchParams.get("svr_mode");
	let acc_inner = '<listrow :foods="foods" :dish="dishes[dish3_key]" :dish2="dishes2[dish3_key]"></listrow>';
</script>
<script>
const app = Vue.createApp({
	data() {
		return {
			foods:	{},
			dishes:	{},
			dishes2:	{},
			dishes3:	{},
			loading1: true,
			errored1: false,
			loading2: true,
			errored2: false
		}
	},
	mounted() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM food'
		}).then(response => {
			for (let food of response.data) {
				this.foods[food['name']] = {};
				for (let x in food) {
					this.foods[food['name']][x] = food[x];
				}
			}
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)
		
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM dish'
		}).then(response => {
			for (let dish of response.data) {
				this.dishes[dish['dish_name']] = {};
				this.dishes2[dish['dish_name']] = {};
				this.dishes3[''] = {};
				for (let x in dish) {
					this.dishes[dish['dish_name']][x] = dish[x];
				}
			}
		}).catch(error => { console.log(error); this.errored2 = true
		}).finally(() => this.loading2 = false)
	}
})
</script>
<script src="<?php echo $accordion2_js; ?>"></script>
<script src="<?php echo $listrow_js; ?>"></script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>