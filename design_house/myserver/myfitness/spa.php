<!DOCTYPE html>
<html lang="en">
<head><title>Nutrient Calc</title>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
		* {
			font-family: 'Poppins', sans-serif;
			font-weight: 500;
		}
		#app {
			background-color: #f6f6f6;
			position: relative;
		}
		.tracker_section {
			/* background-color: #ebebeb; */
			border-radius: 8px;
			margin: 16px 8px;
			padding: 8px;
		}
		.tracker_section .tracker_row {
			display: flex;
			flex-wrap: nowrap;
			border-radius: 6px;
			height: 36px;
			margin: 8px 0;
		}
		.tracker_section .tracker_header {
			background-color: #cccccc;
		}
		.tracker_section .food_cell {
			flex: 0 0 40%;
			max-width: 40%;
			line-height: 1.2;
			font-size: 10px;
			display: flex;
			align-items: center;
			padding-right: 2px;
		}
		.tracker_section .qty_cell {
			flex: 0 0 20%;
			max-width: 20%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.tracker_section .protein_cell {
			flex: 0 0 20%;
			max-width: 20%;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 12px;
		}
		.tracker_section .carb_cell {
			flex: 0 0 20%;
			max-width: 20%;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 12px;
		}
		.tracker_section .head_title {
			font-size: 12px;
			justify-content: center;
		}
		.tracker_section input {
			/* background-color: #eaeaea; */
			background-color: #fdfdfd;
			border-radius: 6px;
			border: none;
			width: 90%;
			height: 34px;
			display: block;
			margin: auto;
			text-align: center;
		}
		.tracker_section .add_row {
			background-color: #cccccc;
			cursor: pointer;
			height: 36px;
			width: 36px;
			border-radius: 4px;
			text-align: center;
			line-height: 36px;
			font-size: 20px;
			color: #444444;
		}
		
		.foods_section {
			position: absolute;
			top: 0;
			background-color: #cccccc;
			border-radius: 8px;
			padding: 4px;
			margin: 0 8px;
		}
		.foods_section .close {
			position: absolute;
			top: -12px;
			right: -12px;
			cursor: pointer;
			width: 30px;
			height: 30px;
			border-radius: 30px;
			background-color: #888888;
		}
		.foods_section .close svg {
			display: block;
			margin: auto;
			height: 30px;
		}
		.foods_section .close path {
			fill: #222222;
		}
		.foods_section .food_row {
			background-color: #e8e8e8;
			cursor: pointer;
			border-radius: 6px;
			padding: 8px;
			margin: 8px;
		}
	</style>
</head>
<body>

<div id="app">
	
	<div class="tracker_section">
		<div class="tracker_row tracker_header">
			<div class="food_cell head_title">Foods</div>
			<div class="qty_cell head_title">Quantity</div>
			<div class="protein_cell head_title">Proteins</div>
			<div class="carb_cell head_title">Calories</div>
		</div>
		<div class="tracker_row" v-for="(food, food_key) in tracklist" :key="food_key">
			<div class="food_cell">{{ food.description }}</div>
			<div class="qty_cell"><input type="text" v-model="tracklist[food_key].qty"></div>
			<div class="protein_cell">{{ getNutrientAmount(food.foodNutrients, food.qty, "Protein", 1) }}</div>
			<div class="carb_cell">{{ getNutrientAmount(food.foodNutrients, food.qty, "Energy", 0) }}</div>
		</div>
		<hr>
		<div class="tracker_row tracker_header">
			<div class="food_cell head_title">Total</div>
			<div class="qty_cell head_title"></div>
			<div class="protein_cell head_title">{{ totalProteins }}</div>
			<div class="carb_cell head_title">{{ totalCalories }}</div>
		</div>
		<div class="add_row" @click="toggleFoodList()">+</div>
	</div>
	
	<div class="foods_section" v-if="show_food_list">
		<div class="food_row" v-for="(food, food_key) in foods" :key="food_key" @click="addFood(food)">
			{{ food.description }}
		</div>
		<div class="close" @click="toggleFoodList()">
			<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M10.7127 0.732637C10.5637 0.58368 10.3616 0.5 10.1509 0.5C9.94023 0.5 9.73817 0.58368 9.58917 0.732637L5.94531 4.37649L2.30146 0.732637C2.15246 0.58368 1.95039 0.5 1.7397 0.5C1.52901 0.5 1.32695 0.58368 1.17795 0.732637C1.02899 0.881639 0.945312 1.0837 0.945312 1.29439C0.945312 1.50508 1.02899 1.70714 1.17795 1.85615L4.8218 5.5L1.17795 9.14386C1.02899 9.29286 0.945313 9.49492 0.945312 9.70561C0.945313 9.9163 1.02899 10.1184 1.17795 10.2674C1.32695 10.4163 1.52901 10.5 1.7397 10.5C1.95039 10.5 2.15246 10.4163 2.30146 10.2674L5.94531 6.62351L9.58917 10.2674C9.73817 10.4163 9.94023 10.5 10.1509 10.5C10.3616 10.5 10.5637 10.4163 10.7127 10.2674C10.8616 10.1184 10.9453 9.9163 10.9453 9.70561C10.9453 9.49492 10.8616 9.29286 10.7127 9.14386L7.06882 5.5L10.7127 1.85615C10.8616 1.70714 10.9453 1.50508 10.9453 1.29439C10.9453 1.0837 10.8616 0.881639 10.7127 0.732637Z" fill="#656565"/>
			</svg>
		</div>
	</div>
	
</div>

<script>
// let url_string = window.location.href;
// let url = new URL(url_string);
// let svr_mode = url.searchParams.get("svr_mode");

const app = Vue.createApp({
	data() {
		return {
			apiKey: 'cHdHtGCvWMJNrwqGlBa5EiP7YMlMtrHmjWToxia6',
			url: 'https://api.nal.usda.gov/fdc/v1/food/',
			food_ids: ['173424', '173441'],
			foods: [],
			tracklist: [], //['173424', '173441'],
			show_food_list: false,
		}
	},
	methods: {
		getNutrientAmount(foodNutrients, qty, type, fix) {
			const index = foodNutrients.findIndex(item => item.nutrient.name == type);  // "Protein","Energy","Carbohydrate, by difference","Total lipid (fat)"
			let nut = foodNutrients[index].amount/100
			if (qty) nut = nut * qty;
			if (fix==0) nut = Math.round(nut);
			else if (fix>0) nut = nut.toFixed(fix);
			return nut;
		},
		getFoods() {
			for (let food_id of this.food_ids) {
				const requestUrl = `${this.url}${food_id}?&api_key=${this.apiKey}`;
				axios.get(requestUrl)
				.then(response => {
					this.foods.push(response.data);
				}).catch(error => { console.log(error); this.errored1 = true
				}).finally(() => this.loading1 = false)
			}
		},
		// getFood(id) {
		// 	let index= this.foods.findIndex(obj => obj.fdcId == id);
		// 	return this.foods[index].description;
		// },
		addFood(food) {
			this.tracklist.push(food);
			this.toggleFoodList();
		},
		toggleFoodList() {
			this.show_food_list = !this.show_food_list;
		}
	},
	computed: {
		totalProteins() {
			let totalProteins = 0;
			for (const food of this.tracklist) {
				totalProteins += this.getNutrientAmount(food.foodNutrients, food.qty, "Protein");
			}
			return Math.round(totalProteins);
		},
		totalCalories() {
			let totalCalories = 0;
			for (const food of this.tracklist) {
				totalCalories += this.getNutrientAmount(food.foodNutrients, food.qty, "Energy");
			}
			return Math.round(totalCalories);
		}
	},
	created() {
		this.getFoods();
	}
})
</script>
<script> const mountedApp = app.mount('#app') </script>

</body>
</html>