window.addEventListener('load', function(e){

	let allInputs = document.querySelectorAll('input');
	//console.log(allInputs);
	let form = document.querySelectorAll('form');
	let select = document.querySelector(".select_role");
	console.log(select);
	console.log(form);
	let patterns = {
		'first_name': /^[A-Za-z]+$/,
		'last_name': /^[A-Za-z]+$/,
		'email': /^.+@.+\..+/,
		'password': /^[a-zA-Z0-9!@#$%^&*]{6,16}$/
	}


	form[0].addEventListener('submit', function(event){
		let isError = false;
		console.log(select.value);
		allInputs.forEach(inputsValidation);

		function inputsValidation(item, index){
				console.log(item, index);
			let value = item.value.trim();
			let validation = item.getAttribute("data-validation");
			let pattern = patterns[validation];
			if(pattern.test(value) != ''){
				item.classList.remove('err');
			}else{
				item.classList.add('err');
				isError = true;
			}
		}

		if(isError && select.value === "Select role"){
			select.classList.add('err');
			event.preventDefault();
		}else if(select.value === "Select role"){
			select.classList.add('err');
			event.preventDefault();
		}
	});
});
