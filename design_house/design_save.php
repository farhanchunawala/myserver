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
	
	<input type="file" multiple name="uploadfiles" ref="uploadfiles" style="width:100%"/>
	<input type="text" class="mt-1" name="link" v-model="product.link" placeholder="http://" style="width:84%" />
	<a class="btn float-end p-1" @click="uploadFile" style="border: 1px solid lightgrey"><b>Save</b></a>
	<textarea oninput="auto_grow(this)" v-model="product.summary"></textarea>
	
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
			product: {}
		}
	},
	methods: {
		prodParts() {
			myArray = this.product.link.split("/");
			this.product.brand = (myArray[2].split(".").length<=2) ? myArray[2].split(".")[0] : myArray[2].split(".")[1];
			switch (this.product.brand) {
				case 'zara':		myArr2 = myArray[5].split("-");	break;
				case 'alqamees':	myArr2 = myArray[4].split("-");	break;
			}
			let text='';
			for (x of myArr2) {
				let regex = new RegExp(text+x,"i");
				if (regex.test(this.product.summary)) {
					(text=='') ? this.product.name = x : this.product.name += ' '+x ;
					text += x+' ';
				}
			};//console.log(this.product.name);
			if (/shirt/i.test(this.product.name)) this.product.category = 'shirt';
		},
		uploadFile() {
			if (this.product.summary) {
				this.prodParts();
				
				let formData = new FormData();
				let myfiles = this.$refs.uploadfiles.files;
				let dir = '../_uploads/design_house/clothing/'+this.product.category+'/';
				let filename = [];  let filename2 = [];
				let fc = myfiles.length;
				for (let ix=0; ix<fc; ix++) filename2[ix] = myfiles[ix].name;
				filename2.sort();
				for (let ix=0; ix<fc; ix++) {
					for (let [i, x] of filename2.entries()) {
						if (x==myfiles[ix].name) {
							filename[ix] = this.product.brand+' '+this.product.name+i;
						}
					}
					formData.append("files[]", myfiles[ix]);
					formData.append('filename[]', filename[ix]);
				}
				formData.append('dir', dir);
				
				axios.post(fdir+'qry/upload.php', formData, {
					headers: { 'Content-Type': 'multipart/form-data' }
				}).then(response => { if (response.data) alert(response.data)
				}).catch(function (error) { console.log(error.response.data); });
				
				if (sr==1) {
					this.product.sr=0;
					axios.post(fdir+'qry/pdo_insert.php?svr_mode='+svr_mode, {
					myArr:this.product,  tbl:'top'
					}).then(response => { if (response.data) alert(response.data)
					}).catch(error => { console.log(error.response.data); this.errored1 = true
					}).finally(() => this.loading1 = false)
				} else {
					axios.post(fdir+'qry/pdo_update.php?svr_mode='+svr_mode, {
					myArr:this.product,  tbl:'top', whr:'Where sr='+sr
					}).then(response => { if (response.data) alert(response.data)
					}).catch(error => { console.log(error.response.data); this.errored1 = true
					}).finally(() => this.loading1 = false)
				}
			}
		}
	},
	created() {
		axios.post(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, {
		sql: 'SELECT * FROM top WHERE sr='+sr
		}).then(response => {
			this.product = response.data[0]
		}).catch(error => { console.log(error.response.data); this.errored1 = true
		}).finally(() => this.loading1 = false)
	}
})
</script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>