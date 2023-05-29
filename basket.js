function basket(addwork_id, additionalworks) {
	GetRequest(`getHallInfo.php?id=${addwork_id}`, function(data) {
		uModal("Добавить дополнительную улугу", true, false, true, false);
		var rows = [
			{"title": "Наименование услуги", "value": data['Work_Name']},
			{"title": "Стоимость работы", "value": normalizeCost(data['Work_Price']) + ' ₽'},
			{"title": "Тип используемого материала", "value": data['Material_Name']},
			{"title": "Стоимость единицы используемого материала", "value": normalizeCost(data['Price_Of_One']) + ' ₽'},
			];
 
		var body = umodal.ubody;
 
		for (var r in rows) {
			var row = rows[r];
			var personalData = Create("div", "personal-data", body);
			Create("div", "personal-data-key", personalData, row['title']);
			Create("div", "personal-data-value", personalData, row['value']);
		}
 
		var inputs = 
		[{'title': 'Количество', 'attributes': { 'name': 'Type_Of_Work_Amount', 'type': 'number', 'step': 1}}];
 
		for (var i in inputs) {
			var inputInfo = Create("div", "input-info", body, inputs[i]['title']);
			var input = Create("input", null, inputInfo);
 
			var attributes = inputs[i]['attributes'];
 
			for (var a in attributes) {
				input.setAttribute(a, attributes[a]);
			}
		}
 
		var buttons = Create('div', 'buttons', body);
		var add = Create('supp_button', null, buttons, 'Добавить услугу');
		add.onclick = function() {
			var new_type = document.getElementsByName('Type_Of_Work_Amount')[0].value;
			var amount = parseInt(new_type);
			if (new_type !== "") {
				var total_additionalworks_price = (data['Work_Price']*amount) + (data['Price_Of_One']*amount);
				var new_addwork = {
			 		Work_Id: parseInt(addwork_id),
			  		Type_Of_Work_Amount: amount,
			  		Material_Name: data['Material_Name'],
			 		Total_Addworks: total_additionalworks_price,
			  		Work_Name: data['Work_Name']
				};
				var found = false;
				for (var i = 0; i < additionalworks.length; i++) {
				if (additionalworks[i]['Work_Id'] == new_addwork['Work_Id']) {
					additionalworks[i]['Type_Of_Work_Amount'] = new_addwork['Type_Of_Work_Amount'];
					additionalworks[i]['Total_Addworks'] = new_addwork['Total_Addworks']
					found = true;
					break;
				}
				}
				if (!found) {
					additionalworks.push(new_addwork);
				}
				closeUmodal();
			}
			else {
				alert('Пожалуйста, заполните поле "Количество"');
			}
		};
	});
}