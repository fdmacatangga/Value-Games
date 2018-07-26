<!DOCTYPE html>
<html>
<head>
	<title>Axios</title>
	<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
<div id="app">
	<h1>@{{full}}</h1>
	<ul>
		<li v-for="skill in skills">@{{skill}}</li>
	</ul>
	
</div>
<script type="text/javascript">
	var app = new Vue({
		el:'#app',
		data :{
			skills : [],
			full: '',
			name:''
		},
		mounted(){
			app = this;
			axios.get('/axiostest').then(response => this.skills = response.data);
			 axios.post('/axiospost', {
			    name: 'Franz and Angel'
			  })
			  .then(function (response) {
			    app.full = response.data;
			  })
			  .catch(function (error) {
			    console.log(error);
			  });
		}
	});
</script>
</body>
</html>