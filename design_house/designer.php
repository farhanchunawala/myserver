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
			min-height: 50px;
			max-height: 100px;
			width: 100%
		}
	</style>
</head>
<body>
<?php //$navtitle='';  $navlink=$dishinfo_php."?svr_mode=$svr_mode&dish_id=0&fsv=0";  include $navbar_php; ?>
<div id="app" class="container-fluid">
	
	<!-- <input type="file" name="fileToUpload[]" id="fileToUpload" multiple style="width:500px"><hr/> -->
	<input type="file" name="myfiles" ref="myfiles" multiple />
	<textarea oninput="auto_grow(this)" v-model="tex"></textarea>
	<a class="btn" @click="uploadFile" style="border: 1px solid lightgrey"><b>Save</b></a>
	
</div>

<script>
	let fdir='../';
	let url_string = window.location.href;
	let url = new URL(url_string);
	let svr_mode = url.searchParams.get("svr_mode");
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
			tex: '',
			myfiles:'',
			filenames: ''
		}
	},
	methods: {
		uploadFile() {
			let formData = new FormData();
			let files = this.$refs.myfiles.files;
			let totalfiles = this.$refs.myfiles.files.length;
			for (let ix = 0; ix < totalfiles; ix++) {
				formData.append("files[]", files[ix]);
			}
			
			axios.post(fdir+'qry/upload.php', formData, {
				headers: { 'Content-Type': 'multipart/form-data' }
			}).then(response => {
				if(response.data) alert(response.data);
			}).catch(function (error) { console.log(error); });
			
			alert(this.tex.search(/\n/));
		}
	},
	mounted() {}
})
</script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>