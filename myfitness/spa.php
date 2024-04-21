<!DOCTYPE html>
<html lang="en">
<head><title>Nutrient Calc</title>
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="spa.css">
</head>
<body>

<div id="app">
	
	<div class="tracker_section">
		<div class="tracker_row" style="justify-content:space-between">
			<div class="targets_cell">
				<div class="targets_label">Weight:&nbsp</div>
				<input class="targets_input" type="text" v-model="weight">
			</div>
			<div class="targets_cell">
				<div class="targets_label">Min Proteins:&nbsp</div>
				<div class="targets_label">{{min_proteins}}</div>
			</div>
			<div class="targets_cell">
				<div class="targets_label">Max Proteins:&nbsp</div>
				<div class="targets_label">{{max_proteins}}</div>
			</div>
		</div>
		<div class="tracker_row">
			<div class="targets_cell">
				<div class="targets_label">Calorie Diff:&nbsp</div>
				<input class="targets_input" type="text" v-model="calorie_diff">
			</div>
			<div class="targets_cell">
				<div class="targets_label">Maintaince Cal:&nbsp</div>
				<div class="targets_label">{{maintainceCalories}}</div>
			</div>
			<div class="targets_cell">
				<div class="targets_label">Target Cal:&nbsp</div>
				<div class="targets_label">{{targetCalories}}</div>
			</div>
		</div>
		<div class="tracker_row tracker_header">
			<div class="food_cell head_title">Foods</div>
			<div class="qty_cell head_title">Quantity</div>
			<div class="protein_cell head_title">Proteins</div>
			<div class="carb_cell head_title">Calories</div>
		</div>
		<div class="tracker_row" v-for="(food, food_key) in tracklist" :key="food_key">
			<div class="food_cell">{{ food.description }}</div>
			<div class="qty_cell"><input type="number" v-model="tracklist[food_key].qty"></div>
			<div class="protein_cell">{{ getNutrientAmount(food.foodNutrients, food.qty, "Protein", 1) }}</div>
			<div class="carb_cell">{{ getNutrientAmount(food.foodNutrients, food.qty, "Energy", 0) }}</div>
		</div>
		<hr>
		<div class="tracker_row tracker_header">
			<div class="food_cell head_title">Total</div>
			<div class="qty_cell head_title"></div>
			<div class="protein_cell head_title">
				<div>{{ totalProteins }} ({{ totalProteinsPercentage }}%)</div>
				<!-- <div>[{{ proteinRatio }}]</div> -->
			</div>
			<div class="carb_cell head_title">
				<div>{{ caloricDifference }} ({{ totalCaloriesPercentage }}%)</div>
				<!-- <div>{{ totalCalories }} ({{ totalCaloriesPercentage }}%)</div> -->
				<!-- <div>{{ caloricDifference }}</div> -->
			</div>
		</div>
		<div class="add_row" @click="toggleFoodList()">+</div>
		<div class="save" @click="save()">Save</div>
		<div class="save" @click="reset()" style="margin-right:8px">Reset</div>
	</div>
	
	<!-- Food List popup -->
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
			food_ids: [
				'171450',	// Chicken, broilers or fryers, meat and skin, cooked, roasted
				'172480',	// Lamb
				'173424',	// Egg, whole, cooked, hard-boiled
				'172421',	// Lentils
				'173441',	// Milk, fluid, 1% fat, without added vitamin A and vitamin D
				'173414',	// Cheese, Cheddar
				'1103276',	// Tomato
				'174924',	// Bread, white, commercially prepared (includes soft bread crumbs)
				'170001',	// Oninon
				'170438',	// Potatoes, boiled, cooked in skin, flesh, without salt
				'169757',	// Rice, white, long-grain, regular, unenriched, cooked without salt
				'169910',	// Mango
				'171726',	// Dates
				'171015',	// Oil, palm
				// '173430',	// Butter
				// '1102880',	// Potato, baked, NFS
				// '170093',	// Potatoes, baked, flesh and skin, without salt
				// '',	// 
			],
			foods: [],
			tracklist: [],
			weight: 58,
			calorie_diff: 500,
			show_food_list: false,
		}
	},
	methods: {
		loadStorageData() {
			const tracklist = localStorage.getItem('tracklist');
			const weight = localStorage.getItem('weight');
			const calorie_diff = localStorage.getItem('calorie_diff');
			if (tracklist) this.tracklist = JSON.parse(tracklist);
			if (weight) this.weight = weight;
			if (calorie_diff) this.calorie_diff = calorie_diff;
		},
		save() {
			localStorage.setItem('tracklist', JSON.stringify(this.tracklist));
			localStorage.setItem('weight', this.weight);
			localStorage.setItem('calorie_diff', this.calorie_diff);
			alert('Save successful');
		},
		reset() {
			this.tracklist = [];
			// localStorage.setItem('tracklist', JSON.stringify(this.tracklist));
			// alert('Reset successful');
		},
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
		},
		caloricDifference() {
			return Math.round(this.totalCalories - this.maintainceCalories);
		},
		proteinRatio() {
			return (this.totalProteins/this.weight).toFixed(1);
		},
		totalProteinsPercentage() {
			return Math.round(this.totalProteins/this.min_proteins*100);
		},
		totalCaloriesPercentage() {
			return Math.round(this.totalCalories/this.targetCalories*100);
		},
		maintainceCalories() {
			return Math.round(this.weight*2.2*14);
		},
		targetCalories() {
			return this.maintainceCalories+parseInt(this.calorie_diff);
			// return Math.round(this.weight/100*2.2*14)*100+parseInt(this.calorie_diff);
		},
		min_proteins() {
			return Math.round(this.weight*1.6);
		},
		avg_proteins() {
			return Math.round(this.weight*1.9);
		},
		max_proteins() {
			return Math.round(this.weight*2.2);
		}
	},
	created() {
		// this.reset();
		this.loadStorageData();
		this.getFoods();
	}
})
</script>
<script> const mountedApp = app.mount('#app') </script>

</body>
</html>