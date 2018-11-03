<!DOCTYPE html>
<html>
<head>
	<title>Test vue</title>
	<style>
		.color {
			color: red;
		}
		.is-loading {
			background: blue;
			color: red;
		}
	</style>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
	<!-- <script src="{{ URL::asset('js/view.js') }}"></script> -->

	<div id="root">
		<div>
			<button @click="toggleClass" :class="{ 'is-loading' : isLoading}" ><h1 >Testing</h1></button>
		</div>

		<hr>

		<div>
			<input type="text" id="input" v-model="message">
			<span>The value of the input is @{{ message }}</span>
		</div>

		<hr>

		<div>
			<li v-for="name in names">@{{ name }}</li>
		</div>

		<hr>
		<div>
			<!-- <li v-text="names">@{{ names }}</li> -->
			<!-- //v-on:keyUp="addName" -->
			<input type="text"  v-model="newName" >
			<button @click="addName" v-bind:title="title" :class="className" >Add Name</button>
		</div>

		<hr>
		<div>
			<h1> Show all task is completed in tasks </h1>
			<ul >
				<li v-for="task in tasks" v-if="task.completed" v-text="task.description"></li>
			</ul>
		</div>
		<hr>

		<div>
		<h1> Show task from task filter</h1>
		<li v-for="task in taskFilter" v-text="task.description"></li>

        <h1 v-show="isVisiable">Show task from component  <button type="button" @click="isVisiable = false">x</button></h1>
   		</div>

	    <ul>
	    	<task>xxx task slot</task>
	    	<task>ooo</task>
	    	<task>ppp</task>
	    	<task>lll</task>
	    </ul>
		</div>
		<hr>

		<div>
			<h1> Show task from task-list component</h1>
	    	<task-list></task-list>
		</div>

	</div>
	
	<script>

		// bulma css


		Vue.component('task', {
			template: '<li><slot></slot></li>'
		});

		Vue.component('task-list', {
			template:
				`<div>
					<task v-for="task in tasks">@{{ task.description }}</task>
				</div>`,

			data() {
				return {
					tasks: [
				    	{description: 'aaa-tasklist-component', completed: true},
				    	{description: 'bbb', completed: false},
				    	{description: 'ccc', completed: true},
				    	{description: 'ddd', completed: false},
				    	{description: 'eee', completed: true}
				    ]
				}
			}

		});

		// $vm0/app
		var app = new Vue({

			el: '#root',

			data: {
				message: 'input value db-bind',
				names: ['aaa-array-push', 'bbb', 'ccc'],
				newName: '',
				title: 'this is the title from javascript',
				className: 'color',
				isLoading: false,
			    tasks: [
			    	{ description: 'aaa-task-data-content', completed: true},
			    	{ description: 'bbb', completed: false},
			    	{ description: 'ccc', completed: true},
			    	{ description: 'ddd', completed: false},
			    	{ description: 'eee', completed: true},
			    ],
			    isVisiable: true,

			},

			methods: {
				addName() {
					this.names.push(this.newName);
					this.newName = '';
				},

				toggleClass() {
					this.isLoading = true;
				}
			},

			computed: {
				taskFilter() {
					return this.tasks.filter(task =>! task.completed);
				}
			}

		});


		
	</script>

</body>
</html>