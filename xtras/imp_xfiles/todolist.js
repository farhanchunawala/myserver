app.component('todolist', {
	props: {
		// foods:	{ type: Object },
		// dish:		{ type: Object },
		// dish2:	{ type: Object },
		// dishname_change: { type: String }
	},
	template: /*html*/ `
		<input id="input" type="text" class="myInput" name="sel_user" v-model="sel_user" @click="listToggleOn('ltu')"  placeholder="Select UserID" >
		<ul id="myUL" v-show="ltu"><li>
			<a href="#" v-for="(todo,todo_key) in todos" :key="todo_key" @click="opSelect('ltu', todo.userId)">{{todo.userId}}</a>
		</li></ul>
		<input id="input" type="text" class="myInput" name="sel_status" v-model="sel_status" @click="listToggleOn('lts')"  placeholder="Select Status" >
		<ul id="myUL" v-show="lts"><li>
			<a href="#" v-for="(todo,todo_key) in todos" :key="todo_key" @click="opSelect('lts', todo.completed)">{{todo.completed}}</a>
		</li></ul>
		<a class="btn" @click="clear" style="border: 1px solid lightgrey"><b>Clear</b></a>
			
		<table class="table">
			<thead>
				<th v-for="(x,kx) in todos[0]" :key="kx">{{kx}}</th>
			</thead>
			<tbody>
				<tr v-for="(todo,todo_key) in todos" :key="todo_key" :style="{backgroundColor:bgcol(todo.completed)}">
					<template v-for="(x,kx) in todo" :key="kx">
					<td v-if="filterTable(todo.userId, todo.completed)" >{{x}}</td>
					</template>
				</tr>
			</tbody>
		</table>
	`,
	data() {
		return {
			sel_user: '',
			sel_status: '',
			ltu:0,
			lts:0,
			todos: [
				{
					"userId": 1,
					"id": 1,
					"title": "delectus aut autem",
					"completed": false
				},
				{
					"userId": 1,
					"id": 2,
					"title": "quis ut nam facilis et officia qui",
					"completed": false
				},
				{
					"userId": 2,
					"id": 3,
					"title": "fugiat veniam minus",
					"completed": false
				},
				{
					"userId": 2,
					"id": 4,
					"title": "et porro tempora",
					"completed": true
				},
				{
					"userId": 3,
					"id": 5,
					"title": "laboriosam mollitia et enim quasi adipisci quia provident illum",
					"completed": false
				},
				{
					"userId": 4,
					"id": 6,
					"title": "qui ullam ratione quibusdam voluptatem quia omnis",
					"completed": false
				},
				{
					"userId": 4,
					"id": 7,
					"title": "illo expedita consequatur quia in",
					"completed": false
				},
				{
					"userId": 4,
					"id": 8,
					"title": "quo adipisci enim quam ut ab",
					"completed": true
				},
				{
					"userId": 5,
					"id": 9,
					"title": "molestiae perspiciatis ipsa",
					"completed": false
				},
				{
					"userId": 5,
					"id": 10,
					"title": "illo est ratione doloremque quia maiores aut",
					"completed": true
				},
			]
		}
	},
	methods: {
		listToggleOn(lt) {
			if(lt=='ltu') { this.ltu=1 }
			else if (lt=='lts') { this.lts=1 }
		},
		listToggleOff(lt) {
			if(lt=='ltu') { this.ltu=0 }
			else if (lt=='lts') { this.lts=0 }
		},
		opSelect(lt, td) {
			this.listToggleOff(lt)
			if(lt=='ltu') { this.sel_user=td; }
			else if (lt=='lts') { this.sel_status=td; }
		},
		clear() {
			this.sel_user='';
			this.sel_status=''
		}
	},
	computed: {
		bgcol() { return (status) => {
			return (status===true) ? 'lightgreen' : 'orange'
		}},
		filterTable() { return (id, status) => {
			if (this.sel_user!='' || this.sel_status!='') {
				if (this.sel_user===id && this.sel_status===status) {x=true}
				else if (this.sel_user===id && this.sel_status==='') {x=true}
				else if (this.sel_user==='' && this.sel_status===status) {x=true}
				else {x=false}
			} else {x=true}
			return x
		}}
	}
})